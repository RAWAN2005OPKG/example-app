<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use App\Models\CashSafe;
use App\Models\Client;
use App\Models\Investor;
use App\Models\Project;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// يرث من المتحكم الأصلي لإعادة استخدام دوال تحديث الأرصدة
class WaleedLedgerController extends VoucherController
{
    private $ledgerName = 'waleed';
    private $routeName = 'dashboard.waleed-ledger';
    private $pageTitle = 'دفتر أستاذ: وليد';

    // دالة عرض القائمة الرئيسية
    public function index(Request $request)
    {
        $query = Voucher::where('ledger_for', $this->ledgerName)
                        ->with(['cashSafe', 'fromBankAccount.bank', 'toBankAccount.bank', 'project'])
                        ->latest();

        // تطبيق الفلاتر
        if ($request->filled('search')) {
            $query->where(fn($q) => $q->where('description', 'like', "%{$request->search}%")->orWhere('serial_number', 'like', "%{$request->search}%"));
        }
        if ($request->filled('from_date')) $query->where('voucher_date', '>=', $request->from_date);
        if ($request->filled('to_date')) $query->where('voucher_date', '<=', $request->to_date);
        if ($request->filled('type')) $query->where('type', $request->type);

        $perPage = $request->input('per_page', 10);
        $vouchers = $query->paginate($perPage == 'all' ? 9999 : $perPage)->appends($request->query());

        return view('dashboard.ledgers.index', [
            'vouchers' => $vouchers,
            'pageTitle' => $this->pageTitle,
            'routeName' => $this->routeName,
        ]);
    }

    // دالة عرض صفحة الإنشاء
    public function create()
    {
        $cashSafes = CashSafe::where('is_active', true)->get();
        $bankAccounts = BankAccount::with('bank')->where('is_active', true)->get();
        $projects = Project::select('id', 'name')->get();

        return view('dashboard.ledgers.create', [
            'cashSafes' => $cashSafes,
            'bankAccounts' => $bankAccounts,
            'projects' => $projects,
            'pageTitle' => 'إنشاء سند جديد لحساب: وليد',
            'routeName' => $this->routeName,
        ]);
    }

    // دالة حفظ السند الجديد
    public function store(Request $request)
    {
        // إضافة اسم الحساب إلى الطلب قبل التحقق
        $request->merge(['ledger_for' => $this->ledgerName]);

        $validatedData = $this->validateVoucher($request); // استخدام دالة التحقق من المتحكم الأب
        $validatedData['amount_ils'] = $validatedData['amount'] * $validatedData['exchange_rate'];
        $validatedData['serial_number'] = 'WLD-' . time(); // رقم تسلسلي خاص بوليد

        try {
            DB::transaction(function () use ($validatedData) {
                $voucher = Voucher::create($validatedData);
                $this->updateBalances($voucher); // استخدام دالة تحديث الأرصدة من المتحكم الأب
            });
            return redirect()->route($this->routeName . '.index')->with('success', 'تم حفظ السند بنجاح.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'فشل حفظ السند. خطأ تقني: ' . $e->getMessage());
        }
    }

    // دالة عرض تفاصيل سند واحد
    public function show($id)
    {
        $voucher = Voucher::where('ledger_for', $this->ledgerName)->with(['cashSafe', 'fromBankAccount.bank', 'toBankAccount.bank', 'project', 'client', 'investor'])->findOrFail($id);

        return view('dashboard.ledgers.show', [
            'voucher' => $voucher,
            'pageTitle' => 'تفاصيل السند: ' . $voucher->serial_number,
            'routeName' => $this->routeName,
        ]);
    }

    // دالة عرض صفحة التعديل
    public function edit($id)
    {
        $voucher = Voucher::where('ledger_for', $this->ledgerName)->findOrFail($id);
        $cashSafes = CashSafe::all();
        $bankAccounts = BankAccount::with('bank')->get();
        $projects = Project::all();

        return view('dashboard.ledgers.edit', [
            'voucher' => $voucher,
            'cashSafes' => $cashSafes,
            'bankAccounts' => $bankAccounts,
            'projects' => $projects,
            'pageTitle' => 'تعديل سند لحساب: وليد',
            'routeName' => $this->routeName,
        ]);
    }

    // دالة تحديث السند
    public function update(Request $request, $id)
    {
        $voucher = Voucher::where('ledger_for', $this->ledgerName)->findOrFail($id);
        $request->merge(['ledger_for' => $this->ledgerName]);

        $validatedData = $this->validateVoucher($request, $voucher->id);
        $validatedData['amount_ils'] = $validatedData['amount'] * $validatedData['exchange_rate'];

        try {
            DB::transaction(function () use ($validatedData, $voucher) {
                $this->revertBalances($voucher); // التراجع عن الرصيد القديم
                $voucher->update($validatedData);
                $this->updateBalances($voucher->fresh()); // تطبيق الرصيد الجديد
            });
            return redirect()->route($this->routeName . '.index')->with('success', 'تم تحديث السند بنجاح.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'فشل تحديث السند. خطأ تقني: ' . $e->getMessage());
        }
    }

    // دالة الحذف (نقل إلى سلة المهملات)
    public function destroy($id)
    {
        $voucher = Voucher::where('ledger_for', $this->ledgerName)->findOrFail($id);
        $voucher->delete();
        return redirect()->route($this->routeName . '.index')->with('success', 'تم نقل السند إلى سلة المهملات.');
    }
}
