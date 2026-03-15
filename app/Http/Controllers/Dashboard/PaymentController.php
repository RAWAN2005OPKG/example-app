<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\PaymentDetail;
use App\Models\BankAccount;
use App\Models\Contract;
use App\Models\Client;
use App\Models\Investor;
use App\Models\Subcontractor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $query = Payment::with('payable')->latest();

        if ($request->filled('search_payable')) {
            $searchTerm = $request->search_payable;
            $query->whereHasMorph('payable', [Client::class, Investor::class, Subcontractor::class],
                fn ($q) => $q->where('name', 'like', "%{$searchTerm}%")->orWhere('unique_id', 'like', "%{$searchTerm}%")
            );
        }
        if ($request->filled('payment_type')) { $query->where('type', $request->payment_type); }
        if ($request->filled('start_date')) { $query->whereDate('payment_date', '>=', $request->start_date); }
        if ($request->filled('end_date')) { $query->whereDate('payment_date', '<=', $request->end_date); }

        // حساب الإجماليات من الـ query الكاملة (قبل الـ paginate)
        $totalsQuery = clone $query;
        $allFilteredPayments = $totalsQuery->get();
        $totalInIls  = $allFilteredPayments->where('type', 'in')->sum(fn($p) => $p->amount * $p->exchange_rate);
        $totalOutIls = $allFilteredPayments->where('type', 'out')->sum(fn($p) => $p->amount * $p->exchange_rate);
        $netBalance  = $totalInIls - $totalOutIls;

        $payments = $query->paginate(15)->withQueryString();
        $payments->each(fn ($p) => $p->amount_ils = $p->amount * $p->exchange_rate);

        return view('dashboard.payments.index', compact('payments', 'totalInIls', 'totalOutIls', 'netBalance'));
    }


    public function create()
    {
        $bankAccounts = BankAccount::with('bank')->get();
        return view('dashboard.payments.create', compact('bankAccounts'));
    }

    public function store(Request $request)
    {
       $validated = $request->validate([
    'payable_id'   => 'required|integer',
    'payable_type' => 'required|in:Client,Investor,Subcontractor',
    'payment_date' => 'required|date',
    'type' => 'required|in:in,out',
    'amount' => 'required|numeric|min:0.01',
    'currency' => 'required|string|size:3',
    'exchange_rate' => 'required|numeric|min:0',
    'method' => 'required|string|in:cash,check,bank_transfer',
    'notes' => 'nullable|string|max:1000',
    'contract_id' => 'nullable|exists:contracts,id',
    'delivered_by' => 'required_if:method,cash|nullable|string|max:255',
    'received_by' => 'required_if:method,cash|nullable|string|max:255',
    'check_number' => 'required_if:method,check|nullable|string|max:255',
    'due_date' => 'required_if:method,check|nullable|date',
    'check_owner' => 'required_if:method,check|nullable|string|max:255',
    'sender_bank_account_id' => [
        'required_if:method,bank_transfer',
        'nullable',
        'exists:bank_accounts,id',
    ],
    'receiver_bank_account_id' => [
        'required_if:method,bank_transfer',
        'nullable',
        'exists:bank_accounts,id',
        'different:sender_bank_account_id',
    ],
    'transaction_reference' => 'nullable|string|max:255',
]);


        DB::beginTransaction();
        try {
            $payment = Payment::create([
                'payable_id' => $validated['payable_id'],
                'payable_type' => 'App\\Models\\' . $validated['payable_type'],
                'contract_id' => $validated['contract_id'],
                'type' => $validated['type'],
                'payment_date' => $validated['payment_date'],
                'amount' => $validated['amount'],
                'currency' => $validated['currency'],
                'exchange_rate' => $validated['exchange_rate'],
                'method' => $validated['method'],
                'notes' => $validated['notes'],
                'user_id' => Auth::id(),
            ]);

            $payment->details()->create($request->only([
                'delivered_by', 'received_by', 'check_number', 'due_date',
                'check_owner', 'sender_bank_account_id', 'receiver_bank_account_id',
                'transaction_reference'
            ]));

            DB::commit();
            return redirect()->route('dashboard.payments.index')->with('success', 'تم تسجيل القيد بنجاح.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'حدث خطأ غير متوقع. ' . $e->getMessage())->withInput();
        }
    }

    public function show(Payment $payment)
    {
        $payment->load(['payable', 'contract.project', 'details.senderBankAccount.bank', 'details.receiverBankAccount.bank', 'user']);
        return view('dashboard.payments.show', compact('payment'));
    }

    public function edit(Payment $payment)
    {
        $payment->load('details');
        $bankAccounts = BankAccount::with('bank')->get();

        // جلب العقود الخاصة بهذا الكيان
        $payableType = $payment->payable_type;
        $payableId = $payment->payable_id;
        $contracts = Contract::where('contractable_id', $payableId)
            ->where('contractable_type', $payableType)
            ->get();

        return view('dashboard.payments.edit', compact('payment', 'bankAccounts', 'contracts'));
    }

    public function update(Request $request, Payment $payment)
    {
          $validated = $request->validate([
    'payment_date' => 'required|date',
    'type' => 'required|in:in,out',
    'amount' => 'required|numeric|min:0.01',
    'currency' => 'required|string|size:3',
    'exchange_rate' => 'required|numeric|min:0',
    'method' => 'required|string|in:cash,check,bank_transfer',
    'notes' => 'nullable|string|max:1000',
    'contract_id' => 'nullable|exists:contracts,id',
    'delivered_by' => 'required_if:method,cash|nullable|string|max:255',
    'received_by' => 'required_if:method,cash|nullable|string|max:255',
    'check_number' => 'required_if:method,check|nullable|string|max:255',
    'due_date' => 'required_if:method,check|nullable|date',
    'check_owner' => 'required_if:method,check|nullable|string|max:255',
    'sender_bank_account_id' => [
        'required_if:method,bank_transfer',
        'nullable',
        'exists:bank_accounts,id',
    ],
    'receiver_bank_account_id' => [
        'required_if:method,bank_transfer',
        'nullable',
        'exists:bank_accounts,id',
        'different:sender_bank_account_id',
    ],
    'transaction_reference' => 'nullable|string|max:255',
]);

        DB::beginTransaction();
        try {
            // 1. تحديث القيد الرئيسي
            $payment->update($validated);

            // 2. تحديث تفاصيل الدفع
            $details_data = $request->only([
                'delivered_by', 'received_by', 'check_number', 'due_date',
                'check_owner', 'sender_bank_account_id', 'receiver_bank_account_id',
                'transaction_reference'
            ]);

            $details_data = array_filter($details_data, fn($value) => !is_null($value) && $value !== '');

            if ($payment->details) {
                $payment->details->fill([
                    'delivered_by' => null, 'received_by' => null, 'check_number' => null,
                    'due_date' => null, 'check_owner' => null, 'sender_bank_account_id' => null,
                    'receiver_bank_account_id' => null, 'transaction_reference' => null
                ])->save();
                $payment->details->update($details_data);
            } else {
                $payment->details()->create($details_data);
            }

            DB::commit();
            return redirect()->route('dashboard.payments.index')->with('success', 'تم تحديث القيد رقم ' . $payment->id . ' بنجاح.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'حدث خطأ أثناء التحديث: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('dashboard.payments.index')->with('success', 'تم نقل القيد إلى سلة المحذوفات.');
    }

    public function trash()
    {
        $trashedPayments = Payment::onlyTrashed()->with('payable')->latest()->paginate(15);
        return view('dashboard.payments.trash', compact('trashedPayments'));
    }

    public function restore($id)
    {
        Payment::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('dashboard.payments.trash')->with('success', 'تم استعادة القيد بنجاح.');
    }

    public function forceDelete($id)
    {
        $payment = Payment::onlyTrashed()->findOrFail($id);
        DB::transaction(function () use ($payment) {
            $payment->details()->delete();
            $payment->forceDelete();
        });
        return redirect()->route('dashboard.payments.trash')->with('success', 'تم حذف القيد نهائياً.');
    }

    public function getPayables(Request $request)
    {
        $type = $request->type;
        $payables = collect();

        if ($type === 'Client') {
            $payables = Client::whereHas('contracts')->select('id', 'name', 'unique_id')->get();
        } elseif ($type === 'Investor') {
            $payables = Investor::whereHas('contracts')->select('id', 'name', 'unique_id')->get();
        } elseif ($type === 'Subcontractor') {
            $payables = Subcontractor::select('id', 'name', 'unique_id')->get(); // Subcontractors might not use contracts in the same way, adjust if needed
        }

        return response()->json($payables);
    }

    public function getPayableContracts(Request $request)
    {
        $payableId = $request->payable_id;
        $payableType = 'App\\Models\\' . $request->payable_type;

        $contracts = Contract::where('contractable_id', $payableId)
            ->where('contractable_type', $payableType)
            ->select('id', 'investment_amount')
            ->get();

        return response()->json(['contracts' => $contracts]);
    }
}
