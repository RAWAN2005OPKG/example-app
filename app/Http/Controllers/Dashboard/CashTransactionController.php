<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CashTransaction;
use Illuminate\Http\Request;
use App\Exports\CashTransactionsExport;
use Maatwebsite\Excel\Facades\Excel;

class CashTransactionController extends Controller
{
    public function index(Request $request)
    {
        $query = CashTransaction::query();
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('voucher_id', 'like', "%{$searchTerm}%")
                  ->orWhere('source', 'like', "%{$searchTerm}%")
                  ->orWhere('details', 'like', "%{$searchTerm}%");
            });
        }
        $transactions = $query->latest('transaction_date')->latest('id')->get();
        
        $balance = 0;
        $transactionsWithBalance = $transactions->reverse()->map(function($transaction) use (&$balance) {
            if ($transaction->type === 'in') { $balance += $transaction->amount_ils; }
            else { $balance -= $transaction->amount_ils; }
            $transaction->balance = $balance;
            return $transaction;
        })->reverse();

        $totalIn = CashTransaction::where('type', 'in')->sum('amount_ils');
        $totalOut = CashTransaction::where('type', 'out')->sum('amount_ils');
        $currentBalance = $totalIn - $totalOut;

        return view('dashboard.cash.index', compact('transactionsWithBalance', 'currentBalance'));
    }

    public function create()
    {
        $transaction = new CashTransaction();
        return view('dashboard.cash.create', compact('transaction'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'transaction_date' => 'required|date',
            'type' => 'required|in:in,out',
            'source' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'currency' => 'required|string|in:ILS,USD,JOD',
            'exchange_rate' => 'required|numeric|min:0',
            'details' => 'nullable|string',
        ]);
        $prefix = $validated['type'] === 'in' ? 'CP' : 'PV';
        $lastTransaction = CashTransaction::where('type', 'in', $validated['type'])->latest('id')->first();
        $lastId = $lastTransaction ? (int)substr($lastTransaction->voucher_id, 3) : 0;
        $voucherId = $prefix . '-' . str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);
        $validated['voucher_id'] = $voucherId;
        $validated['amount_ils'] = $validated['amount'] * $validated['exchange_rate'];
        CashTransaction::create($validated);
        return redirect()->route('dashboard.cash.index')->with('success', "تم تسجيل الحركة بنجاح. رقم السند: {$voucherId}");
    }

    public function edit(CashTransaction $cashTransaction)
    {
        return view('dashboard.cash.edit', ['transaction' => $cashTransaction]);
    }

    public function update(Request $request, CashTransaction $cashTransaction)
    {
        $validated = $request->validate([
            'transaction_date' => 'required|date',
            'type' => 'required|in:in,out',
            'source' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'currency' => 'required|string|in:ILS,USD,JOD',
            'exchange_rate' => 'required|numeric|min:0',
            'details' => 'nullable|string',
        ]);
        $validated['amount_ils'] = $validated['amount'] * $validated['exchange_rate'];
        $cashTransaction->update($validated);
        return redirect()->route('dashboard.cash.index')->with('success', 'تم تحديث الحركة بنجاح.');
    }

    public function destroy(CashTransaction $cashTransaction)
    {
        $cashTransaction->delete();
        return redirect()->route('dashboard.cash.index')->with('success', 'تم نقل الحركة إلى سلة المحذوفات.');
    }

    public function trash()
    {
        $trashedTransactions = CashTransaction::onlyTrashed()->latest()->get();
        return view('dashboard.cash.trash', compact('trashedTransactions'));
    }

    public function restore($id)
    {
        CashTransaction::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('dashboard.cash.trash')->with('success', 'تم استعادة الحركة بنجاح.');
    }

    public function forceDelete($id)
    {
        CashTransaction::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('dashboard.cash.trash')->with('success', 'تم حذف الحركة نهائياً.');
    }

    public function export()
    {
        return Excel::download(new CashTransactionsExport, 'cash_transactions.xlsx');
    }
    public function show(CashTransaction $cashTransaction)
{
    return view('dashboard.cash.show', ['transaction' => $cashTransaction]);
}
}
