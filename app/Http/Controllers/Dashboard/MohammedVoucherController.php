<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\MohammedVoucher;
use App\Models\Project;
use App\Models\Client;
use App\Models\Investor;
use App\Models\BankAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class MohammedVoucherController extends Controller
{
    /**
     * عرض كل السندات
     */
    public function index(Request $request)
    {
        $query = MohammedVoucher::with('user');

        // حساب الإجماليات بالشيكل
        $totalReceipts = MohammedVoucher::where('type', 'receipt')->sum('amount_ils');
        $totalPayments = MohammedVoucher::where('type', 'payment')->sum('amount_ils');
        $netBalance = $totalReceipts - $totalPayments;

        $vouchers = $query->latest()->paginate(15);
        return view('dashboard.mohammed.index', compact('vouchers', 'totalReceipts', 'totalPayments', 'netBalance'));
    }

    /**
     * عرض صفحة إنشاء سند جديد
     */
    public function create()
    {
        $projects = Project::all();
        $clients = Client::all();
        $investors = Investor::all();
        $bankAccounts = BankAccount::with('bank')->where('is_active', true)->get();
        $exchangeRates = ['USD' => 3.7, 'JOD' => 5.2];

        return view('dashboard.mohammed.create', compact('projects', 'clients', 'investors', 'bankAccounts', 'exchangeRates'));
    }

    /**
     * تخزين سند جديد في قاعدة البيانات
     */
    public function store(Request $request)
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
            'cash_source_name' => ['required_if:payment_method,cash', 'nullable', 'string', 'max:255'],
            'from_bank_account_id' => ['required_if:payment_method,bank_transfer', 'nullable', 'exists:bank_accounts,id'],
            'to_bank_account_id' => ['required_if:payment_method,bank_transfer', 'nullable', 'exists:bank_accounts,id'],
            'check_number' => ['required_if:payment_method,check', 'nullable', 'string', 'max:255'],
            'check_owner_name' => ['required_if:payment_method,check', 'nullable', 'string', 'max:255'],
            'check_bank_name' => ['required_if:payment_method,check', 'nullable', 'string', 'max:255'],
            'check_due_date' => ['required_if:payment_method,check', 'nullable', 'date'],
        ]);

        DB::beginTransaction();
        try {
            $detailsData = $request->only(['cash_source_name', 'handler_name', 'handler_role', 'from_bank_account_id', 'to_bank_account_id', 'check_number', 'check_owner_name', 'check_bank_name', 'check_due_date', 'check_id']);
            $voucherData = array_diff_key($validated, array_flip(array_keys($detailsData)));
            $voucherData['amount_ils'] = ($voucherData['currency'] === 'ILS') ? $voucherData['amount'] : ($voucherData['amount'] * $voucherData['exchange_rate']);

            $voucher = MohammedVoucher::create($voucherData + ['user_id' => Auth::id()]);
            $voucher->details()->create($detailsData);

            // ✅ إضافة: تحديث رصيد المشروع
            if ($voucher->project_id) {
                $delta = ($voucher->type === 'receipt') ? $voucher->amount_ils : (-1 * $voucher->amount_ils);
                $voucher->project->applyBalanceDelta((float) $delta);
            }

            DB::commit();
            return redirect()->route('dashboard.mohammed.index')->with('success', 'تم إنشاء سند محمد بنجاح.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'حدث خطأ غير متوقع: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * عرض تفاصيل سند محدد
     */
    public function show(MohammedVoucher $mohammed)
    {
        $mohammed->load(['details', 'project', 'client', 'investor', 'user']);
        return view('dashboard.mohammed.show', ['voucher' => $mohammed, 'mohammed' => $mohammed]);
    }

    /**
     * عرض صفحة تعديل سند
     */
    public function edit(MohammedVoucher $mohammed)
    {
        $mohammed->load('details');
        $projects = Project::all();
        $clients = Client::all();
        $investors = Investor::all();
        $bankAccounts = BankAccount::with('bank')->where('is_active', true)->get();
        $exchangeRates = ['USD' => 3.7, 'JOD' => 5.2];

        return view('dashboard.mohammed.edit', [
            'voucher' => $mohammed,
            'projects' => $projects,
            'clients' => $clients,
            'investors' => $investors,
            'bankAccounts' => $bankAccounts,
            'exchangeRates' => $exchangeRates
        ]);
    }

    /**
     * تحديث سند موجود في قاعدة البيانات
     */
    public function update(Request $request, MohammedVoucher $mohammed)
    {
        $validated = $request->validate([
            'voucher_date' => 'required|date',
            'type' => 'required|in:receipt,payment',
            'payment_method' => 'required|in:cash,bank_transfer,check',
            'description' => 'required|string|max:1000',
            'amount' => 'required|numeric|min:0.01',
            'currency' => 'required|string|size:3',
            'exchange_rate' => 'required|numeric|min:0',
            'contract_id' => 'nullable|exists:contracts,id',
            'cash_source_name' => ['required_if:payment_method,cash', 'nullable', 'string', 'max:255'],
        ]);

        DB::beginTransaction();
        try {
            $detailsData = $request->only(['cash_source_name', 'handler_name', 'handler_role', 'from_bank_account_id', 'to_bank_account_id', 'check_number', 'check_owner_name', 'check_bank_name', 'check_due_date', 'check_id']);
            $voucherData = array_diff_key($validated, array_flip(array_keys($detailsData)));
            $voucherData['amount_ils'] = ($voucherData['currency'] === 'ILS') ? $voucherData['amount'] : ($voucherData['amount'] * $voucherData['exchange_rate']);

            // ✅ إضافة: عكس أثر المشروع القديم قبل التحديث
            if ($mohammed->project_id) {
                $oldDelta = ($mohammed->type === 'receipt') ? (-1 * $mohammed->amount_ils) : $mohammed->amount_ils;
                $mohammed->project->applyBalanceDelta((float) $oldDelta);
            }

            $mohammed->update($voucherData);

            if ($mohammed->details) {
                $mohammed->details->fill(array_fill_keys(array_keys($detailsData), null))->save();
                $mohammed->details->update(array_filter($detailsData));
            } else {
                $mohammed->details()->create($detailsData);
            }

            // ✅ إضافة: تحديث رصيد المشروع بالقيم الجديدة
            $mohammed = $mohammed->fresh();
            if ($mohammed->project_id) {
                $delta = ($mohammed->type === 'receipt') ? $mohammed->amount_ils : (-1 * $mohammed->amount_ils);
                $mohammed->project->applyBalanceDelta((float) $delta);
            }

            DB::commit();
            return redirect()->route('dashboard.mohammed.index')->with('success', 'تم تحديث سند محمد بنجاح.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'حدث خطأ غير متوقع: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * نقل سند إلى سلة المحذوفات
     */
    public function destroy(MohammedVoucher $mohammed)
    {
        // ✅ إضافة: عكس الأثر المالي على المشروع عند الحذف
        if ($mohammed->project_id) {
            $delta = ($mohammed->type === 'receipt') ? (-1 * $mohammed->amount_ils) : $mohammed->amount_ils;
            $mohammed->project->applyBalanceDelta((float) $delta);
        }

        $mohammed->delete();
        return redirect()->route('dashboard.mohammed.index')->with('success', 'تم نقل السند إلى سلة المحذوفات.');
    }

    /**
     * عرض السندات المحذوفة
     */
    public function trash()
    {
        $trashed = MohammedVoucher::onlyTrashed()->latest()->paginate(15);
        return view('dashboard.mohammed.trash', compact('trashed'));
    }

    /**
     * استعادة سند من سلة المحذوفات
     */
    public function restore($id)
    {
        $voucher = MohammedVoucher::onlyTrashed()->findOrFail($id);
        
        // ✅ إضافة: إعادة تطبيق الأثر المالي عند الاستعادة
        if ($voucher->project_id) {
            $delta = ($voucher->type === 'receipt') ? $voucher->amount_ils : (-1 * $voucher->amount_ils);
            $voucher->project->applyBalanceDelta((float) $delta);
        }

        $voucher->restore();
        return redirect()->route('dashboard.mohammed.trash')->with('success', 'تم استعادة السند بنجاح.');
    }

    /**
     * حذف سند بشكل نهائي
     */
    public function forceDelete($id)
    {
        $voucher = MohammedVoucher::onlyTrashed()->findOrFail($id);
        $voucher->forceDelete();
        return redirect()->route('dashboard.mohammed.trash')->with('success', 'تم حذف السند نهائياً.');
    }
}
