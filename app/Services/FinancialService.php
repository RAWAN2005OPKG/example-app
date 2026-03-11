<?php

namespace App\Services;

// 1. استيراد كل الموديلات التي ستدخل في الحسابات
use App\Models\Setting;
use App\Models\CashSafe;
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
    public function getOpeningBalance(): float
    {
        $openingBalance = Setting::where('key', 'opening_balance')->value('value');

        if ($openingBalance !== null) {
            return (float) $openingBalance;
        }

        return (float) (Setting::where('key', 'total_budget')->value('value') ?? 0);
    }

    public function getTotalCapital(): float
    {
        return $this->getOpeningBalance() + $this->getCurrentLiquidityBalance();
    }

    public function getCurrentLiquidityBalance(): float
    {
        return $this->getCashBalance() + $this->getBankBalance() + $this->getChecksBalance();
    }

    /**
     * يحسب الرصيد الحالي للخزينة (الكاش) فقط.
     *
     * @return float
     */
    public function getCashBalance(): float
    {
        $cashSafesBalance = (float) CashSafe::where('is_active', true)->sum('balance');
        $transactionsNet = (float) CashTransaction::where('type', 'in')->sum('amount_ils')
            - (float) CashTransaction::where('type', 'out')->sum('amount_ils');

        return abs($transactionsNet) >= 0.01 ? $transactionsNet : $cashSafesBalance;
    }

    /**
     * يحسب مجموع الأرصدة الحالية في كل الحسابات البنكية.
     *
     * @return float
     */
    public function getBankBalance(): float
    {
        return (float) BankAccount::where('is_active', true)
            ->get()
            ->sum(fn (BankAccount $account) => $account->resolved_balance);
    }

    public function getChecksBalance(): float
    {
        return $this->getChecksInWalletValue();
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
        $balance = $this->getOpeningBalance();

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
