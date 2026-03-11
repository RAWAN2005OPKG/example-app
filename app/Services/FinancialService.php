<?php

namespace App\Services;

// 1. استيراد كل الموديلات التي ستدخل في الحسابات
use App\Models\Setting;
use App\Models\CashTransaction;
use App\Models\BankAccount;
use App\Models\Project;
use App\Models\Expense;
use App\Models\SupplierPayment;
use App\Models\Check;            
use App\Models\Payment;
use App\Models\KhaledVoucher;
use App\Models\MohammedVoucher;
use App\Models\WaliVoucher;

class FinancialService
{
    public function getTotalCapital(): float
    {
        $checksInWallet = $this->getChecksInWalletValue(); // **تمت إضافته**

        // إجمالي السيولة هو ما تملكه نقداً وفي البنوك، بالإضافة إلى الشيكات التي في محفظتك
        // The user asked to remove Cash & Banks from this specific total and keep them only on their individual pages.
        return $checksInWallet; // Removed $cashBalance + $bankBalance
    }

    /**
     * يحسب الرصيد الحالي للخزينة (الكاش) فقط.
     *
     * @return float
     */
    public function getCashBalance(): float
    {
        return (float) \App\Models\CashSafe::where('is_active', true)->sum('balance');
    }

    /**
     * يحسب مجموع الأرصدة الحالية في كل الحسابات البنكية.
     *
     * @return float
     */
    public function getBankBalance(): float
    {
        return (float) BankAccount::where('is_active', true)->sum('balance');
    }

    /**
     * **دالة جديدة ومهمة جداً**
     * تحسب القيمة الإجمالية للشيكات المستحقة (شيكات القبض) التي لم يتم تحصيلها بعد.
     *
     * @return float
     */
    public function getChecksInWalletValue(): float
    {
        // 'receivable' = شيكات قبض
        // 'in_wallet' = في المحفظة (لم تودع في البنك بعد)
        // 'under_collection' = أودعت في البنك وتنتظر التحصيل
        return (float) Check::where('type', 'receivable')
                            ->whereIn('status', ['in_wallet', 'under_collection'])
                            ->sum('amount_ils');
    }

    public function getTotalExpenses(): float
    {
        $generalExpenses = (float) Expense::whereNull('payable_type')->sum('amount');
        $supplierExpenses = (float) SupplierPayment::sum('amount'); // Using amount instead of total_amount

        return $generalExpenses + $supplierExpenses;
    }

    /**
     * يحسب إجمالي الأرصدة المستثمرة في كل المشاريع.
     *
     * @return float
     */
    public function getTotalProjectsBalance(): float
    {
        return (float) Project::sum('balance');
    }


    // ===================================================================
    // == الدالة القديمة التي طلبت الإبقاء عليها (لأغراض التوافق) ==
    // ===================================================================

    /**
     * [دالة قديمة] تحسب الرصيد بناءً على الرصيد الافتتاحي العام وكل الحركات القديمة.
     *
     * @return float
     */
    public function getLegacyCurrentBalance(): float
    {
        $initialBudgetSetting = Setting::where('key', 'total_budget')->first();
        $balance = $initialBudgetSetting ? (float) $initialBudgetSetting->value : 0;

        // إضافة الإيرادات
        $balance += Payment::where('type', 'in')->sum('amount_ils');
        $balance += KhaledVoucher::where('type', 'receipt')->sum('amount');
        $balance += MohammedVoucher::where('type', 'receipt')->sum('amount');
        $balance += WaliVoucher::where('type', 'receipt')->sum('amount');

        // طرح المصروفات
        $balance -= Payment::where('type', 'out')->sum('amount_ils');
        $balance -= KhaledVoucher::where('type', 'payment')->sum('amount');
        $balance -= MohammedVoucher::where('type', 'payment')->sum('amount');
        $balance -= WaliVoucher::where('type', 'payment')->sum('amount');

        // **تمت إضافة المصروفات التي كانت منسية**
        $balance -= Expense::whereNull('payable_type')->sum('amount');
        $balance -= SupplierPayment::sum('amount');

        return $balance;
    }
}
