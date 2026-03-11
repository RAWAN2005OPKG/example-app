<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\WaliVoucher;
use App\Models\Project;
use App\Models\Client;
use App\Models\Investor;
use App\Models\BankAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WaliVoucherController extends Controller
{
    public function index(Request $request) {
        $query = WaliVoucher::with('user');

        // حساب الإجماليات بالشيكل
        $totalReceipts = WaliVoucher::where('type', 'receipt')->sum('amount_ils');
        $totalPayments = WaliVoucher::where('type', 'payment')->sum('amount_ils');
        $netBalance = $totalReceipts - $totalPayments;

        $vouchers = $query->latest()->paginate(15);
        return view('dashboard.wali.index', compact('vouchers', 'totalReceipts', 'totalPayments', 'netBalance'));
    }

    public function create() {
        $projects = Project::all();
        $clients = Client::all();
        $investors = Investor::all();
        $bankAccounts = BankAccount::with('bank')->where('is_active', true)->get();
        $exchangeRates = ['USD' => 3.7, 'JOD' => 5.2];
        return view('dashboard.wali.create', compact('projects', 'clients', 'investors', 'bankAccounts', 'exchangeRates'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'voucher_date' => 'required|date',
            'type' => 'required|in:receipt,payment',
            'payment_method' => 'required|in:cash,bank_transfer,check',
            'description' => 'required|string|max:1000',
            'amount' => 'required|numeric|min:0.01',
            'currency' => 'required|string|size:3',
            'exchange_rate' => 'required|numeric|min:0',
            'cash_source_name' => ['required_if:payment_method,cash', 'nullable', 'string', 'max:255'],
        ]);

        DB::beginTransaction();
        try {
            $detailsData = $request->only(['cash_source_name', 'handler_name', 'handler_role', 'from_bank_account_id', 'to_bank_account_id', 'check_number', 'check_owner_name', 'check_bank_name', 'check_due_date', 'check_id']);
            $voucherData = array_diff_key($validated, array_flip(array_keys($detailsData)));
            $voucherData['amount_ils'] = ($voucherData['currency'] === 'ILS') ? $voucherData['amount'] : ($voucherData['amount'] * $voucherData['exchange_rate']);
            
            $voucher = WaliVoucher::create($voucherData + ['user_id' => Auth::id()]);
            $voucher->details()->create($detailsData);

            DB::commit();
            return redirect()->route('dashboard.wali.index')->with('success', 'تم إنشاء سند وليد بنجاح.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'حدث خطأ غير متوقع: ' . $e->getMessage())->withInput();
        }
    }

    public function show(WaliVoucher $wali) {
        $wali->load(['details', 'project', 'client', 'investor', 'user']);
        return view('dashboard.wali.show', ['voucher' => $wali, 'wali' => $wali]);
    }

    public function edit(WaliVoucher $wali) {
        $wali->load('details');
        $projects = Project::all();
        $clients = Client::all();
        $investors = Investor::all();
        $bankAccounts = BankAccount::with('bank')->where('is_active', true)->get();
        $exchangeRates = ['USD' => 3.7, 'JOD' => 5.2];
        
        return view('dashboard.wali.edit', [
            'voucher' => $wali, 
            'projects' => $projects, 
            'clients' => $clients, 
            'investors' => $investors, 
            'bankAccounts' => $bankAccounts, 
            'exchangeRates' => $exchangeRates
        ]);
    }

    public function update(Request $request, WaliVoucher $wali) {
        $validated = $request->validate([
            'voucher_date' => 'required|date',
            'type' => 'required|in:receipt,payment',
            'payment_method' => 'required|in:cash,bank_transfer,check',
            'description' => 'required|string|max:1000',
            'amount' => 'required|numeric|min:0.01',
            'cash_source_name' => ['required_if:payment_method,cash', 'nullable', 'string', 'max:255'],
        ]);

        DB::beginTransaction();
        try {
            $detailsData = $request->only(['cash_source_name', 'handler_name', 'handler_role', 'from_bank_account_id', 'to_bank_account_id', 'check_number', 'check_owner_name', 'check_bank_name', 'check_due_date', 'check_id']);
            $voucherData = array_diff_key($validated, array_flip(array_keys($detailsData)));
            // حساب المبلغ بالشيكل إذا توفرت العملة وسعر الصرف، أو استخدام المبلغ الأصلي
            $amount = $voucherData['amount'] ?? $wali->amount;
            $currency = $request->currency ?? $wali->currency;
            $exchangeRate = $request->exchange_rate ?? $wali->exchange_rate;
            $voucherData['amount_ils'] = ($currency === 'ILS') ? $amount : ($amount * $exchangeRate);

            $wali->update($voucherData);
            
            if ($wali->details) {
                $wali->details->fill(array_fill_keys(array_keys($detailsData), null))->save();
                $wali->details->update(array_filter($detailsData));
            } else {
                $wali->details()->create($detailsData);
            }

            DB::commit();
            return redirect()->route('dashboard.wali.index')->with('success', 'تم تحديث سند وليد بنجاح.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'حدث خطأ غير متوقع: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy(WaliVoucher $wali) {
        $wali->delete();
        return redirect()->route('dashboard.wali.index')->with('success', 'تم نقل السند إلى سلة المحذوفات.');
    }

    public function trash() {
        $trashed = WaliVoucher::onlyTrashed()->latest()->paginate(15);
        return view('dashboard.wali.trash', compact('trashed'));
    }

    public function restore($id) {
        WaliVoucher::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('dashboard.wali.trash')->with('success', 'تم استعادة السند بنجاح.');
    }

    public function forceDelete($id) {
        $voucher = WaliVoucher::onlyTrashed()->findOrFail($id);
        $voucher->forceDelete();
        return redirect()->route('dashboard.wali.trash')->with('success', 'تم حذف السند نهائياً.');
    }
}
