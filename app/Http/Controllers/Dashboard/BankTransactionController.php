<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use App\Models\Setting;
use App\Models\BankTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class BankTransactionController extends Controller
{
    /**
     * عرض كشف حساب بنكي مفصل.
     */
   public function index(Request $request)
    {
        $bankAccounts = BankAccount::where('is_active', true)->get();
        $selectedAccount = null;
        $transactionsWithBalance = collect();
        $openingBalance = 0;
        $currentBalance = 0;

        if ($request->filled('bank_account_id')) {
            $selectedAccount = BankAccount::findOrFail($request->bank_account_id);

            // الآن هذا السطر سيعمل بنجاح لأن الدالة في مكانها الصحيح
            $openingBalance = $selectedAccount->getOpeningBalance();
            $currentBalance = $openingBalance;

            $transactions = BankTransaction::where(function ($query) use ($selectedAccount) {
                $query->where('bank_account_id', $selectedAccount->id)
                      ->orWhere('from_account_id', $selectedAccount->id)
                      ->orWhere('to_account_id', $selectedAccount->id);
            })->orderBy('transaction_date', 'asc')->orderBy('id', 'asc')->get();

            $transactionsWithBalance = $transactions->map(function ($transaction) use (&$currentBalance, $selectedAccount) {
                if ($transaction->type == 'deposit' || $transaction->to_account_id == $selectedAccount->id) {
                    $currentBalance += $transaction->amount;
                    $transaction->is_credit = true;
                } else {
                    $currentBalance -= $transaction->amount;
                    $transaction->is_credit = false;
                }
                $transaction->balance = $currentBalance;
                return $transaction;
            });
        }

        return view('dashboard.bank-transactions.index', compact(
            'bankAccounts', 'selectedAccount', 'transactionsWithBalance', 'openingBalance', 'currentBalance'
        ));
    }

    /**
     * عرض نموذج إنشاء حركة جديدة.
     */
    public function create()
    {
        $bankAccounts = BankAccount::with('bank')->where('is_active', true)->get();
        $transaction = new BankTransaction();
        return view('dashboard.bank-transactions.create', compact('bankAccounts', 'transaction'));
    }

    /**
     * تخزين حركة جديدة وتحديث الأرصدة.
     */
    /**
 * تخزين حركة جديدة وتحديث الأرصدة.
 */
public function store(Request $request)
{
    $validated = $request->validate([
        'type' => 'required|in:deposit,withdrawal,transfer',
        'transaction_date' => 'required|date',
        'amount' => 'required|numeric|min:0.01',
        'bank_account_id' => 'required_if:type,deposit,withdrawal|exists:bank_accounts,id',
        'from_account_id' => 'required_if:type,transfer|exists:bank_accounts,id|different:to_account_id',
        'to_account_id' => 'required_if:type,transfer|exists:bank_accounts,id',
        'details' => 'nullable|string|max:2000',
    ], ['from_account_id.different' => 'لا يمكن التحويل من وإلى نفس الحساب.']);

    DB::beginTransaction();
    try {

        $dataToSave = $validated;

        // جلب العملة تلقائياً من الحساب البنكي المختار
        if ($validated['type'] === 'deposit' || $validated['type'] === 'withdrawal') {
            $account = BankAccount::find($validated['bank_account_id']);
            $dataToSave['currency'] = $account->currency;
        }

        $transaction = BankTransaction::create($dataToSave);

        // تحديث الأرصدة
        if ($validated['type'] === 'deposit') {
            BankAccount::find($validated['bank_account_id'])->increment('balance', $validated['amount']);
        }
        elseif ($validated['type'] === 'withdrawal') {
            BankAccount::find($validated['bank_account_id'])->decrement('balance', $validated['amount']);
        }
        elseif ($validated['type'] === 'transfer') {
            $fromAccount = BankAccount::find($validated['from_account_id']);
            $toAccount = BankAccount::find($validated['to_account_id']);

            // تحديث رصيد الحساب المرسل
            $fromAccount->decrement('balance', $validated['amount']);
            // تحديث رصيد الحساب المستقبل
            $toAccount->increment('balance', $validated['amount']);

            // تحديث عملة الحركة المسجلة (للدقة في حالة التحويل)
            // نفترض أن عملة التحويل هي عملة الحساب المرسل
            $transaction->update(['currency' => $fromAccount->currency]);
        }

        DB::commit();
        $redirectAccountId = $request->bank_account_id ?? $request->from_account_id;
        return redirect()->route('dashboard.bank-transactions.index', ['bank_account_id' => $redirectAccountId])->with('success', 'تم تسجيل الحركة بنجاح.');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'حدث خطأ: ' . $e->getMessage())->withInput();
    }
}

    /**
     * عرض تفاصيل حركة محددة.
     */
    public function show(BankTransaction $bankTransaction)
    {
        $bankTransaction->load(['bankAccount.bank', 'fromAccount.bank', 'toAccount.bank']);
        return view('dashboard.bank-transactions.show', compact('bankTransaction'));
    }

    /**
     * عرض نموذج تعديل حركة موجودة.
     */
    public function edit(BankTransaction $bankTransaction)
    {
        $bankAccounts = BankAccount::with('bank')->where('is_active', true)->get();
        // لتوحيد النموذج، نمرر الحساب الرئيسي للحركة
        $bankTransaction->bank_account_id = $bankTransaction->bank_account_id ?? ($bankTransaction->from_account_id ?? $bankTransaction->to_account_id);
        return view('dashboard.bank-transactions.edit', compact('bankTransaction', 'bankAccounts'));
    }

    /**
     * تحديث حركة موجودة وتصحيح الأرصدة.
     */
    public function update(Request $request, BankTransaction $bankTransaction)
    {
        $validated = $request->validate([
            'type' => 'required|in:deposit,withdrawal,transfer',
            'transaction_date' => 'required|date',
            'amount' => 'required|numeric|min:0.01',
            'bank_account_id' => 'required_if:type,deposit,withdrawal|exists:bank_accounts,id',
            'from_account_id' => 'required_if:type,transfer|exists:bank_accounts,id|different:to_account_id',
            'to_account_id' => 'required_if:type,transfer|exists:bank_accounts,id',
            'details' => 'nullable|string|max:2000',
        ]);

        DB::beginTransaction();
        try {
            // الخطوة 1: عكس أثر العملية القديمة على الأرصدة
            if ($bankTransaction->type === 'deposit') {
                if($bankTransaction->bank_account_id) BankAccount::find($bankTransaction->bank_account_id)->decrement('balance', $bankTransaction->amount);
            } elseif ($bankTransaction->type === 'withdrawal') {
                if($bankTransaction->bank_account_id) BankAccount::find($bankTransaction->bank_account_id)->increment('balance', $bankTransaction->amount);
            } elseif ($bankTransaction->type === 'transfer') {
                if($bankTransaction->from_account_id) BankAccount::find($bankTransaction->from_account_id)->increment('balance', $bankTransaction->amount);
                if($bankTransaction->to_account_id) BankAccount::find($bankTransaction->to_account_id)->decrement('balance', $bankTransaction->amount);
            }

            // الخطوة 2: تطبيق أثر العملية الجديدة على الأرصدة
            if ($validated['type'] === 'deposit') {
                BankAccount::find($validated['bank_account_id'])->increment('balance', $validated['amount']);
            } elseif ($validated['type'] === 'withdrawal') {
                BankAccount::find($validated['bank_account_id'])->decrement('balance', $validated['amount']);
            } elseif ($validated['type'] === 'transfer') {
                BankAccount::find($validated['from_account_id'])->decrement('balance', $validated['amount']);
                BankAccount::find($validated['to_account_id'])->increment('balance', $validated['amount']);
            }

            // الخطوة 3: تحديث سجل الحركة نفسه بالبيانات الجديدة
            $bankTransaction->update($validated);

            DB::commit();
            $redirectAccountId = $request->bank_account_id ?? $request->from_account_id;
            return redirect()->route('dashboard.bank-transactions.index', ['bank_account_id' => $redirectAccountId])->with('success', 'تم تحديث الحركة وتصحيح الأرصدة بنجاح.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'حدث خطأ أثناء التحديث: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * حذف حركة وعكس أثرها المالي.
     */
    public function destroy(BankTransaction $bankTransaction)
    {
        DB::beginTransaction();
        try {
            // عكس أثر الحركة على الأرصدة قبل حذفها
            if ($bankTransaction->type === 'deposit') {
                if($bankTransaction->bank_account_id) BankAccount::find($bankTransaction->bank_account_id)->decrement('balance', $bankTransaction->amount);
            } elseif ($bankTransaction->type === 'withdrawal') {
                if($bankTransaction->bank_account_id) BankAccount::find($bankTransaction->bank_account_id)->increment('balance', $bankTransaction->amount);
            } elseif ($bankTransaction->type === 'transfer') {
                if($bankTransaction->from_account_id) BankAccount::find($bankTransaction->from_account_id)->increment('balance', $bankTransaction->amount);
                if($bankTransaction->to_account_id) BankAccount::find($bankTransaction->to_account_id)->decrement('balance', $bankTransaction->amount);
            }

            $bankTransaction->delete();
            DB::commit();
            return redirect()->route('dashboard.bank-transactions.index')->with('success', 'تم حذف الحركة وعكس أثرها المالي بنجاح.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'حدث خطأ أثناء الحذف: ' . $e->getMessage());
        }
    }

    /**
     * عرض سلة المحذوفات.
     */
    public function trash()
    {
        $trashedTransactions = BankTransaction::onlyTrashed()->with(['bankAccount', 'fromAccount', 'toAccount'])->latest('deleted_at')->paginate(10);
        return view('dashboard.bank-transactions.trash', compact('trashedTransactions'));
    }

    /**
     * استعادة حركة من سلة المحذوفات.
     */
    public function restore($id)
    {
        $transaction = BankTransaction::onlyTrashed()->findOrFail($id);
        // لا نعيد تطبيق الأثر المالي عند الاستعادة لتجنب الحساب المزدوج
        // يجب على المستخدم مراجعة الأرصدة يدوياً أو حذف الحركة وإعادة إنشائها
        $transaction->restore();
        return back()->with('success', 'تم استعادة الحركة. يرجى مراجعة أرصدة الحسابات.');
    }

    /**
     * حذف حركة نهائياً من قاعدة البيانات.
     */
    public function forceDelete($id)
    {
        // الحذف النهائي لا يعكس الأثر المالي لأنه يفترض أن الحركة قد تم عكسها عند الحذف الأول
        BankTransaction::onlyTrashed()->findOrFail($id)->forceDelete();
        return back()->with('success', 'تم حذف الحركة نهائياً.');
    }

}
