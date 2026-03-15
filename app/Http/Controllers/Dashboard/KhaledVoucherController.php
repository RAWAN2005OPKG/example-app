<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\KhaledVoucher;
use App\Models\KhaledVoucherDetail;
use App\Models\Project;
use App\Models\Client;
use App\Models\Investor;
use App\Models\CashTransaction;
use App\Models\BankAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class KhaledVoucherController extends Controller
{
    /**
     * عرض كل السندات
     */
    public function index(Request $request)
    {
        $query = KhaledVoucher::with('user');
        
        // حساب الإجماليات بالشيكل
        $totalReceipts = KhaledVoucher::where('type', 'receipt')->sum('amount_ils');
        $totalPayments = KhaledVoucher::where('type', 'payment')->sum('amount_ils');
        $netBalance = $totalReceipts - $totalPayments;

        $vouchers = $query->latest()->paginate(15);
        return view('dashboard.khaled.index', compact('vouchers', 'totalReceipts', 'totalPayments', 'netBalance'));
    }

    /**
     * عرض صفحة إنشاء سند جديد
     */
    public function create()
    {
        $projects = Project::all();
        $clients = Client::all();
        $investors = Investor::all();
        
        $cashes = CashTransaction::all(); 
        
        $bankAccounts = BankAccount::with('bank')->where('is_active', true)->get();
        $exchangeRates = ['USD' => 3.7, 'JOD' => 5.2]; // أسعار صرف مبدئية
        
        return view('dashboard.khaled.create', compact('projects', 'clients', 'investors', 'cashes', 'bankAccounts', 'exchangeRates'));
    }

    /**
     * تخزين سند جديد في قاعدة البيانات
     */
    public function store(Request $request)
    {
        // ✅ إضافة: قواعد تحقق شاملة لضمان جودة البيانات
        $validated = $request->validate([
            'voucher_date' => 'required|date',
            'type' => 'required|in:receipt,payment',
            'payment_method' => 'required|in:cash,bank_transfer,check',
            'description' => 'required|string|max:1000',
            'amount' => 'required|numeric|min:0.01',
            'currency' => 'required|string|size:3',
            'exchange_rate' => 'required|numeric|min:0',
            'project_id' => 'nullable|exists:projects,id',
            'client_id' => 'nullable|exists:clients,id',
            'investor_id' => 'nullable|exists:investors,id',
            'contract_id' => 'nullable|exists:contracts,id',
            'notes' => 'nullable|string|max:2000',
            'cash_id' => ['required_if:payment_method,cash', 'nullable', 'exists:cash_transactions,id'],
            'from_bank_account_id' => ['required_if:payment_method,bank_transfer', 'nullable', 'exists:bank_accounts,id'],
            'to_bank_account_id' => ['required_if:payment_method,bank_transfer', 'nullable', 'exists:bank_accounts,id'],
            'check_number' => ['required_if:payment_method,check', 'nullable', 'string', 'max:255'],
            'check_owner_name' => ['required_if:payment_method,check', 'nullable', 'string', 'max:255'],
            'check_bank_name' => ['required_if:payment_method,check', 'nullable', 'string', 'max:255'],
            'check_due_date' => ['required_if:payment_method,check', 'nullable', 'date'],
        ]);

        DB::beginTransaction();
    try {
   
        $detailsData = $request->only([
            'cash_id', 'handler_name', 'handler_role', 
            'from_bank_account_id', 'to_bank_account_id', 
            'check_number', 'check_owner_name', 'check_bank_name', 'check_due_date', 'check_id'
        ]);

        $validated['amount_ils'] = ($validated['currency'] === 'ILS') ? $validated['amount'] : ($validated['amount'] * $validated['exchange_rate']);

        $voucher = KhaledVoucher::create(
            array_diff_key($validated, array_flip(array_keys($detailsData))) 
            + ['user_id' => Auth::id()]
        );
                $voucher->details()->create($detailsData);

        // ✅ إضافة: تحديث رصيد المشروع
        if ($voucher->project_id) {
            $delta = ($voucher->type === 'receipt') ? $voucher->amount_ils : (-1 * $voucher->amount_ils);
            $voucher->project->applyBalanceDelta((float) $delta);
        }

        DB::commit();
        return redirect()->route('dashboard.khaled.index')->with('success', 'تم إنشاء السند بنجاح.');

    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'حدث خطأ غير متوقع: ' . $e->getMessage())->withInput();
    }
    }

    /**
     * عرض تفاصيل سند محدد
     */
    public function show(KhaledVoucher $khaled)
    {
        // تحميل كل العلاقات لعرضها في الواجهة
        $khaled->load(['details.cash', 'details.fromBankAccount.bank', 'details.toBankAccount.bank', 'details.check', 'project', 'client', 'investor', 'user']);
        return view('dashboard.khaled.show', ['khaled' => $khaled]);
    }

    /**
     * عرض صفحة تعديل سند
     */
    public function edit(KhaledVoucher $khaled)
    {
        $khaled->load('details');
        $projects = Project::all();
        $clients = Client::all();
        $investors = Investor::all();
        
        // ✅ التصحيح: جلب كل حركات الكاش بدون فلترة
        $cashes = CashTransaction::all();
        
        $bankAccounts = BankAccount::with('bank')->where('is_active', true)->get();
        $exchangeRates = ['USD' => 3.7, 'JOD' => 5.2];
        
        return view('dashboard.khaled.edit', [
            'voucher' => $khaled, 
            'projects' => $projects, 
            'clients' => $clients, 
            'investors' => $investors, 
            'cashes' => $cashes, 
            'bankAccounts' => $bankAccounts, 
            'exchangeRates' => $exchangeRates
        ]);
    }

    /**
     * تحديث سند موجود في قاعدة البيانات
     */
    public function update(Request $request, KhaledVoucher $khaled)
    {
        $validated = $request->validate([
            'voucher_date' => 'required|date',
            'type' => 'required|in:receipt,payment',
            'payment_method' => 'required|in:cash,bank_transfer,check',
            'description' => 'required|string|max:1000',
            'amount' => 'required|numeric|min:0.01',
            'currency' => 'required|string|size:3',
            'exchange_rate' => 'required|numeric|min:0',
            'project_id' => 'nullable|exists:projects,id',
            'client_id' => 'nullable|exists:clients,id',
            'investor_id' => 'nullable|exists:investors,id',
            'contract_id' => 'nullable|exists:contracts,id',
            'notes' => 'nullable|string|max:2000',
            'cash_id' => ['required_if:payment_method,cash', 'nullable', 'exists:cash_transactions,id'],
        ]);

        DB::beginTransaction();
        try {
            // حساب المبلغ بالشيكل قبل التحديث
            $validated['amount_ils'] = ($validated['currency'] === 'ILS') ? $validated['amount'] : ($validated['amount'] * $validated['exchange_rate']);

            // ✅ إضافة: عكس أثر المشروع القديم قبل التحديث
            if ($khaled->project_id) {
                $oldDelta = ($khaled->type === 'receipt') ? (-1 * $khaled->amount_ils) : $khaled->amount_ils;
                $khaled->project->applyBalanceDelta((float) $oldDelta);
            }

            $khaled->update($validated);
            
            $details_data = $request->only(['cash_id', 'handler_name', 'handler_role', 'from_bank_account_id', 'to_bank_account_id', 'check_number', 'check_owner_name', 'check_bank_name', 'check_due_date', 'check_id']);
            // أولاً، مسح كل القيم القديمة لتجنب تضارب البيانات عند تغيير طريقة الدفع
            if ($khaled->details) {
                $khaled->details->update(array_fill_keys(array_keys($details_data), null));
                // ثانياً، تحديث القيم الجديدة فقط
                $khaled->details->update(array_filter($details_data));
            } else {
                $khaled->details()->create($details_data);
            }

            // ✅ إضافة: تحديث رصيد المشروع بالقيم الجديدة
            $khaled = $khaled->fresh();
            if ($khaled->project_id) {
                $delta = ($khaled->type === 'receipt') ? $khaled->amount_ils : (-1 * $khaled->amount_ils);
                $khaled->project->applyBalanceDelta((float) $delta);
            }

            DB::commit();
            return redirect()->route('dashboard.khaled.index')->with('success', 'تم تحديث السند بنجاح.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'حدث خطأ غير متوقع: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * نقل سند إلى سلة المحذوفات (حذف ناعم)
     */
    public function destroy(KhaledVoucher $khaled)
    {
        // ✅ إضافة: عكس الأثر المالي على المشروع عند الحذف
        if ($khaled->project_id) {
            $delta = ($khaled->type === 'receipt') ? (-1 * $khaled->amount_ils) : $khaled->amount_ils;
            $khaled->project->applyBalanceDelta((float) $delta);
        }

        $khaled->delete();
        return redirect()->route('dashboard.khaled.index')->with('success', 'تم نقل السند إلى سلة المحذوفات.');
    }

    /**
     * عرض السندات المحذوفة
     */
    public function trash()
    {
        $trashed = KhaledVoucher::onlyTrashed()->latest()->paginate(15);
        return view('dashboard.khaled.trash', compact('trashed'));
    }

    /**
     * استعادة سند من سلة المحذوفات
     */
    public function restore($id)
    {
        $voucher = KhaledVoucher::onlyTrashed()->findOrFail($id);
        
        // ✅ إضافة: إعادة تطبيق الأثر المالي عند الاستعادة
        if ($voucher->project_id) {
            $delta = ($voucher->type === 'receipt') ? $voucher->amount_ils : (-1 * $voucher->amount_ils);
            $voucher->project->applyBalanceDelta((float) $delta);
        }

        $voucher->restore();
        return redirect()->route('dashboard.khaled.trash')->with('success', 'تم استعادة السند بنجاح.');
    }

    /**
     * حذف سند بشكل نهائي من قاعدة البيانات
     */
    public function forceDelete($id)
    {
        $voucher = KhaledVoucher::onlyTrashed()->findOrFail($id);
        // لا حاجة للتراجع عن العملية هنا لأنها محذوفة بالفعل
        $voucher->forceDelete(); // سيتم حذف التفاصيل تلقائياً بسبب onDelete('cascade')
        return redirect()->route('dashboard.khaled.trash')->with('success', 'تم حذف السند نهائياً.');
    }
}
