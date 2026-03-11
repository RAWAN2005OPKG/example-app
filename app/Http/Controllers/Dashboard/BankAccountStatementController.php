<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use App\Models\BankTransaction;
use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BankAccountStatementController extends Controller
{
    /**
     * عرض صفحة كشف الحساب (النموذج + سجل الحركات)
     */
    public function show(BankAccount $bankAccount)
    {
        // جلب الحساب مع اسم البنك المرتبط به
        $bankAccount->load('bank');

        // جلب الحركات الخاصة بهذا الحساب فقط، مع ترتيبها من الأحدث للأقدم
        $transactions = $bankAccount->transactions()->latest('transaction_date')->paginate(15);

        // جلب قائمة بأسماء البنوك لاستخدامها في القوائم المنسدلة
        $banks = Bank::pluck('name');

        return view('dashboard.bank-accounts.show', compact('bankAccount', 'transactions', 'banks'));
    }

    /**
     * تخزين حركة جديدة وتحديث رصيد الحساب
     */
    public function store(Request $request, BankAccount $bankAccount)
    {
        $validated = $request->validate([
            'transaction_date' => 'required|date',
            'type' => 'required|string',
            'amount' => 'required|numeric|min:0.01',
            'currency' => 'required|string',
            // اجعل باقي الحقول اختيارية
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

        // استخدام Transaction لضمان تنفيذ العمليتين معًا أو عدم تنفيذهما على الإطلاق
        DB::transaction(function () use ($validated, $bankAccount) {
            // 1. إنشاء الحركة الجديدة وربطها بالحساب البنكي
            $bankAccount->transactions()->create($validated);

            // 2. تحديث رصيد الحساب البنكي
            if ($validated['type'] == 'deposit') {
                $bankAccount->applyBalanceDelta((float) $validated['amount']);
            } else { // withdrawal, transfer, personal_withdrawal
                $bankAccount->applyBalanceDelta(-1 * (float) $validated['amount']);
            }
        });

        return redirect()->back()->with('success', 'تم تسجيل الحركة وتحديث الرصيد بنجاح.');
    }
}
