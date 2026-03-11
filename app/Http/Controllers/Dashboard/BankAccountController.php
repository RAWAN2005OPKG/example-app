<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    /**
     * عرض قائمة بكل الحسابات البنكية
     */
    public function index()
    {
        // جلب الحسابات مع اسم البنك المرتبط بها بكفاءة (Eager Loading)
        $bankAccounts = BankAccount::with('bank')->latest()->paginate(15);

        // إحصائيات للصفحة
        $totalAccounts = BankAccount::count();
        $activeAccounts = BankAccount::where('is_active', true)->count();

        return view('dashboard.bank-accounts.index', compact(
            'bankAccounts',
            'totalAccounts',
            'activeAccounts'
        ));
    }

    /**
     * عرض نموذج إضافة حساب بنكي جديد
     */
    public function create()
    {
        // جلب البنوك النشطة لعرضها في القائمة المنسدلة
        $banks = Bank::where('is_active', true)->orderBy('name')->get();

        if ($banks->isEmpty()) {
            return redirect()->route('dashboard.banks.index')
                ->with('error', 'يجب عليك إضافة بنك واحد على الأقل قبل إضافة حساب بنكي.');
        }

        return view('dashboard.bank-accounts.create', compact('banks'));
    }

    /**
     * تخزين حساب بنكي جديد في قاعدة البيانات
     */
    public function store(Request $request)
    {
        // التحقق من صحة البيانات، مع التأكد من وجود 'bank_id'
        $validated = $request->validate([
            'bank_id' => 'required|exists:banks,id', // <-- التصحيح الأهم: استخدام bank_id
            'account_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255|unique:bank_accounts,account_number',
            'iban' => 'nullable|string|max:255|unique:bank_accounts,iban',
            'currency' => 'required|string|max:10',
            'current_balance' => 'nullable|numeric|min:0', // اسم الحقل الصحيح
        ]);

        $initialBalance = (float) ($validated['current_balance'] ?? 0);
        $validated['opening_balance'] = $initialBalance;
        $validated['balance'] = $initialBalance;
        $validated['current_balance'] = $initialBalance;

        BankAccount::create($validated);

        return redirect()->route('dashboard.bank-accounts.index')->with('success', 'تم إضافة الحساب البنكي بنجاح.');
    }

    /**
     * عرض نموذج تعديل حساب بنكي
     */
    public function edit(BankTransaction $transaction)
    {
        // تحميل العلاقات المطلوبة بكفاءة لتجنب أخطاء N+1
        $transaction->load('bankAccount.bank');

        // جلب قائمة بأسماء البنوك من دليل البنوك
        $banks = Bank::pluck('name');

        // تمرير متغير الحركة وقائمة البنوك إلى الواجهة
        return view('dashboard.bank-accounts.transactions.edit', compact('transaction', 'banks'));
    }

    /**
     * تحديث حركة بنكية في قاعدة البيانات.
     */
    public function update(Request $request, BankTransaction $transaction)
    {
        // قواعد التحقق من صحة البيانات
        $validatedData = $request->validate([
            'date' => 'required|date',
            'type' => ['required', Rule::in(['deposit', 'withdrawal', 'transfer', 'personal_withdrawal'])],
            'amount' => 'required|numeric|min:0.01',
            'currency' => ['required', Rule::in(['SAR', 'USD', 'ILS', 'JOD'])], // أضف العملات التي تستخدمها
            'client_name' => 'nullable|string|max:255',
            'client_phone' => 'nullable|string|max:255',
            'payer_id_number' => 'nullable|string|max:255',
            'project_name' => 'nullable|string|max:255',
            'source' => 'nullable|string|max:255',
            'transfer_number' => 'nullable|string|max:255',
            'transfer_details' => 'nullable|string|max:255',
            'payer_bank_name' => 'nullable|string|max:255',
            'beneficiary_bank_name' => 'nullable|string|max:255',
            'details' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        // تحديث بيانات الحركة بالبيانات الجديدة التي تم التحقق منها
        $transaction->update($validatedData);

        // إعادة التوجيه إلى صفحة كشف الحساب مع رسالة نجاح
        return redirect()->route('dashboard.bank-accounts.show', $transaction->bank_account_id)
                         ->with('success', 'تم تحديث الحركة البنكية بنجاح.');
    }
    /**
     * حذف حساب بنكي من قاعدة البيانات
     */
    public function destroy(BankAccount $bankAccount)
    {
        // يمكنك إضافة شرط هنا لمنع حذف حساب يحتوي على حركات أو رصيد
        if ($bankAccount->transactions()->exists() || abs($bankAccount->resolved_balance) > 0.01) {
            return back()->with('error', 'لا يمكن حذف حساب بنكي يحتوي على حركات أو رصيد.');
        }

        $bankAccount->delete();

        return redirect()->route('dashboard.bank-accounts.index')->with('success', 'تم حذف الحساب البنكي بنجاح.');
    }
}
