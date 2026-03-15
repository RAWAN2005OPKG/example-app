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
use Illuminate\Validation\Rule;

class VoucherController extends Controller
{
    public function index(Request $request)
    {
        $query = Voucher::with(['cashSafe', 'fromBankAccount.bank', 'toBankAccount.bank', 'project'])->latest();

        if ($request->filled('search')) {
            $query->where(fn($q) => $q->where('description', 'like', "%{$request->search}%")->orWhere('serial_number', 'like', "%{$request->search}%"));
        }
        if ($request->filled('from_date')) $query->where('voucher_date', '>=', $request->from_date);
        if ($request->filled('to_date')) $query->where('voucher_date', '<=', $request->to_date);
        if ($request->filled('type')) $query->where('type', $request->type);

        // حساب الإجماليات بناءً على الفلترة
        $totalReceipts = (clone $query)->where('type', 'receipt')->sum('amount_ils');
        $totalPayments = (clone $query)->where('type', 'payment')->sum('amount_ils');
        $netBalance = $totalReceipts - $totalPayments;

        $perPage = $request->input('per_page', 10);
        $vouchers = $query->paginate($perPage == 'all' ? 9999 : $perPage)->appends($request->query());

        return view('dashboard.vouchers.index', compact('vouchers', 'totalReceipts', 'totalPayments', 'netBalance'));
    }

    public function create()
    {
        $cashSafes = CashSafe::where('is_active', true)->get();
        $bankAccounts = BankAccount::with('bank')->where('is_active', true)->get();
        $projects = Project::select('id', 'name')->get();
        $clients = Client::select('id', 'name')->get();
        $investors = Investor::select('id', 'name')->get();
        return view('dashboard.vouchers.create', compact('cashSafes', 'bankAccounts', 'projects', 'clients', 'investors'));
    }

    public function store(Request $request)
    {
        $validatedData = $this->validateVoucher($request);
        $validatedData['amount_ils'] = $validatedData['amount'] * $validatedData['exchange_rate'];
        $validatedData['serial_number'] = 'VOU-' . time() . rand(100, 999);

        try {
            DB::transaction(function () use ($validatedData) {
                $voucher = Voucher::create($validatedData);
                $this->updateBalances($voucher);
            });
            return redirect()->route('dashboard.vouchers.index')->with('success', 'تم حفظ السند بنجاح.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'فشل حفظ السند. خطأ تقني: ' . $e->getMessage());
        }
    }

    public function edit(Voucher $voucher)
    {
        $cashSafes = CashSafe::all();
        $bankAccounts = BankAccount::with('bank')->get();
        $projects = Project::all();
        $clients = Client::all();
        $investors = Investor::all();
        return view('dashboard.vouchers.edit', compact('voucher', 'cashSafes', 'bankAccounts', 'projects', 'clients', 'investors'));
    }

    public function update(Request $request, Voucher $voucher)
    {
        $validatedData = $this->validateVoucher($request, $voucher->id);
        $validatedData['amount_ils'] = $validatedData['amount'] * $validatedData['exchange_rate'];

        try {
            DB::transaction(function () use ($validatedData, $voucher) {
                $this->revertBalances($voucher);
                $voucher->update($validatedData);
                $this->updateBalances($voucher->fresh());
            });
            return redirect()->route('dashboard.vouchers.index')->with('success', 'تم تحديث السند بنجاح.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'فشل تحديث السند. خطأ تقني: ' . $e->getMessage());
        }
    }

    public function destroy(Voucher $voucher)
    {
        $voucher->delete();
        return back()->with('success', 'تم نقل السند إلى سلة المهملات.');
    }

    public function trash()
    {
        $trashedVouchers = Voucher::onlyTrashed()->latest()->paginate(10);
        return view('dashboard.vouchers.trash', compact('trashedVouchers'));
    }

    public function restore($id)
    {
        $voucher = Voucher::onlyTrashed()->findOrFail($id);
        $voucher->restore();
        return back()->with('success', 'تم استعادة السند بنجاح.');
    }

    public function forceDelete($id)
    {
        $voucher = Voucher::onlyTrashed()->findOrFail($id);
        try {
            DB::transaction(function () use ($voucher) {
                $this->revertBalances($voucher);
                $voucher->forceDelete();
            });
            return back()->with('success', 'تم حذف السند نهائياً.');
        } catch (\Exception $e) {
            return back()->with('error', 'فشل الحذف النهائي. خطأ تقني: ' . $e->getMessage());
        }
    }

    // --- الدوال المساعدة ---

    private function validateVoucher(Request $request, $voucherId = null)
    {
        return $request->validate([
            'voucher_date' => 'required|date',
            'type' => 'required|in:receipt,payment',
            'payment_method' => 'required|in:cash,bank_transfer,check',
            'description' => 'required|string|max:1000',
            'amount' => 'required|numeric|min:0.01',
            'currency' => 'required|string|size:3',
            'exchange_rate' => 'required|numeric|min:0',
            'cash_safe_id' => 'required_if:payment_method,cash|exists:cash_safes,id',
            'handler_name' => 'nullable|string|max:255',
            'from_bank_account_id' => 'required_if:payment_method,bank_transfer|nullable|exists:bank_accounts,id',
            'to_bank_account_id' => 'required_if:payment_method,bank_transfer|nullable|exists:bank_accounts,id|different:from_bank_account_id',
            'check_number' => 'required_if:payment_method,check|string|max:255',
            'check_owner_name' => 'required_if:payment_method,check|string|max:255',
            'check_bank_name' => 'required_if:payment_method,check|string|max:255',
            'check_due_date' => 'required_if:payment_method,check|date',
            'project_id' => 'nullable|exists:projects,id',
            'client_id' => 'nullable|exists:clients,id',
            'investor_id' => 'nullable|exists:investors,id',
            'notes' => 'nullable|string|max:2000',
        ]);
    }

    protected function updateBalances(Voucher $voucher)
    {
        $amount = $this->getAmountInTargetCurrency($voucher);

        if ($voucher->payment_method == 'cash') {
            $safe = CashSafe::findOrFail($voucher->cash_safe_id);
            $voucher->type == 'receipt' ? $safe->balance += $amount : $safe->balance -= $amount;
            $safe->save();
        } elseif ($voucher->payment_method == 'bank_transfer') {
            if ($voucher->from_bank_account_id) {
                $fromAccount = BankAccount::findOrFail($voucher->from_bank_account_id);
                $fromAccount->applyBalanceDelta(-1 * (float) $this->getAmountInTargetCurrency($voucher, $fromAccount->currency));
            }
            if ($voucher->to_bank_account_id) {
                $toAccount = BankAccount::findOrFail($voucher->to_bank_account_id);
                $toAccount->applyBalanceDelta((float) $this->getAmountInTargetCurrency($voucher, $toAccount->currency));
            }
        }

        // تحديث رصيد المشروع إذا كان السند مرتبطاً بمشروع
        if ($voucher->project_id) {
            $project = Project::find($voucher->project_id);
            if ($project) {
                // سند القبض يزيد رصيد المشروع، سند الصرف ينقصه
                $delta = ($voucher->type == 'receipt') ? $voucher->amount_ils : -$voucher->amount_ils;
                $project->increment('balance', $delta);
            }
        }
    }

    protected function revertBalances(Voucher $voucher)
    {
        $amount = $this->getAmountInTargetCurrency($voucher);

        if ($voucher->payment_method == 'cash') {
            $safe = CashSafe::findOrFail($voucher->cash_safe_id);
            $voucher->type == 'receipt' ? $safe->balance -= $amount : $safe->balance += $amount;
            $safe->save();
        } elseif ($voucher->payment_method == 'bank_transfer') {
            if ($voucher->from_bank_account_id) {
                $fromAccount = BankAccount::findOrFail($voucher->from_bank_account_id);
                $fromAccount->applyBalanceDelta((float) $this->getAmountInTargetCurrency($voucher, $fromAccount->currency));
            }
            if ($voucher->to_bank_account_id) {
                $toAccount = BankAccount::findOrFail($voucher->to_bank_account_id);
                $toAccount->applyBalanceDelta(-1 * (float) $this->getAmountInTargetCurrency($voucher, $toAccount->currency));
            }
        }

        // عكس أثر رصيد المشروع if applicable
        if ($voucher->project_id) {
            $project = Project::find($voucher->project_id);
            if ($project) {
                $delta = ($voucher->type == 'receipt') ? -$voucher->amount_ils : $voucher->amount_ils;
                $project->increment('balance', $delta);
            }
        }
    }

    private function getAmountInTargetCurrency(Voucher $voucher, $targetCurrency = null)
    {
        // إذا لم يتم تحديد عملة الهدف، افترض أنها نفس عملة السند
        if (!$targetCurrency) {
            return $voucher->amount;
        }
        // إذا كانت العملات متطابقة، أرجع المبلغ الأصلي
        if ($voucher->currency == $targetCurrency) {
            return $voucher->amount;
        }
        // إذا كانت عملة السند ليست شيكل، والهدف هو الشيكل
        if ($voucher->currency != 'ILS' && $targetCurrency == 'ILS') {
            return $voucher->amount_ils;
        }
        // إذا كانت عملة السند هي الشيكل، والهدف عملة أخرى (حالة نادرة، تتطلب سعر صرف عكسي)
        if ($voucher->currency == 'ILS' && $targetCurrency != 'ILS') {
            // ملاحظة: هذا يتطلب وجود سعر صرف للعملة الهدف في مكان ما
            // للتبسيط، سنقسم على سعر الصرف المسجل (قد لا يكون دقيقاً)
            return $voucher->amount / $voucher->exchange_rate;
        }
        // تحويل من عملة أجنبية إلى عملة أجنبية أخرى (عبر الشيكل كوسيط)
        $amountInILS = $voucher->amount_ils;
        // هنا تحتاج إلى آلية لجلب سعر صرف العملة الهدف
        // للتبسيط، سنفترض أن التحويل غير مطلوب لهذه الحالة الآن
        return $voucher->amount; // fallback
    }
}
