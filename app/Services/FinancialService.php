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
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
        // إجمالي المصروفات من جدول المصاريف (يشمل المصاريف العامة ومصاريف الموردين)
        $allExpenses = (float) Expense::sum('amount_ils');
        
        // مصروفات الرواتب (إذا كانت موجودة في مكان آخر مستقبلاً)
        $salaryExpenses = 0;

        // سندات الصرف (Payments out)
        $paymentOut = (float) Payment::where('type', 'out')->sum('amount_ils');

        // سندات الصرف من الصناديق الفرعية
        $khaledOut = (float) KhaledVoucher::where('type', 'payment')->sum('amount_ils');
        $mohammedOut = (float) MohammedVoucher::where('type', 'payment')->sum('amount_ils');
        $waliOut = (float) WaliVoucher::where('type', 'payment')->sum('amount_ils');

        return $allExpenses + $salaryExpenses + $paymentOut + $khaledOut + $mohammedOut + $waliOut;
    }

    /**
     * يحسب إجمالي الإيرادات.
     */
    public function getTotalRevenue(): float
    {
        // سندات القبض (Payments in)
        $paymentIn = (float) Payment::where('type', 'in')->sum('amount_ils');

        // سندات القبض من الصناديق الفرعية
        $khaledIn = (float) KhaledVoucher::where('type', 'receipt')->sum('amount_ils');
        $mohammedIn = (float) MohammedVoucher::where('type', 'receipt')->sum('amount_ils');
        $waliIn = (float) WaliVoucher::where('type', 'receipt')->sum('amount_ils');

        // الدفعات المحصلة من الفواتير (Sale Invoices) - إذا كانت موجودة
        $salePayments = 0;
        if (Schema::hasTable('sale_invoice_payments')) {
            $salePayments = (float) DB::table('sale_invoice_payments')->sum('amount');
        }

        return $paymentIn + $khaledIn + $mohammedIn + $waliIn + $salePayments;
    }

    /**
     * يحسب صافي الربح.
     */
    public function getTotalProfit(): float
    {
        return $this->getTotalRevenue() - $this->getTotalExpenses();
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

    /**
     * يحسب إجمالي الإيرادات لشهر محدد.
     */
    public function getMonthlyRevenue(int $year, int $month): float
    {
        $paymentIn = (float) Payment::where('type', 'in')
            ->whereYear('payment_date', $year)
            ->whereMonth('payment_date', $month)
            ->sum('amount_ils');

        $khaledIn = (float) KhaledVoucher::where('type', 'receipt')
            ->whereYear('voucher_date', $year)
            ->whereMonth('voucher_date', $month)
            ->sum('amount_ils');

        $mohammedIn = (float) MohammedVoucher::where('type', 'receipt')
            ->whereYear('voucher_date', $year)
            ->whereMonth('voucher_date', $month)
            ->sum('amount_ils');

        $waliIn = (float) WaliVoucher::where('type', 'receipt')
            ->whereYear('voucher_date', $year)
            ->whereMonth('voucher_date', $month)
            ->sum('amount_ils');

        $salePayments = 0;
        if (Schema::hasTable('sale_invoice_payments')) {
            $salePayments = (float) DB::table('sale_invoice_payments')
                ->whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->sum('amount');
        }

        return $paymentIn + $khaledIn + $mohammedIn + $waliIn + $salePayments;
    }

    /**
     * يحسب إجمالي المصروفات لشهر محدد.
     */
    public function getMonthlyExpenses(int $year, int $month): float
    {
        $allExpenses = (float) Expense::whereYear('date', $year)
            ->whereMonth('date', $month)
            ->sum('amount_ils');

        $salaryExpenses = 0;

        $paymentOut = (float) Payment::where('type', 'out')
            ->whereYear('payment_date', $year)
            ->whereMonth('payment_date', $month)
            ->sum('amount_ils');

        $khaledOut = (float) KhaledVoucher::where('type', 'payment')
            ->whereYear('voucher_date', $year)
            ->whereMonth('voucher_date', $month)
            ->sum('amount_ils');

        $mohammedOut = (float) MohammedVoucher::where('type', 'payment')
            ->whereYear('voucher_date', $year)
            ->whereMonth('voucher_date', $month)
            ->sum('amount_ils');

        $waliOut = (float) WaliVoucher::where('type', 'payment')
            ->whereYear('voucher_date', $year)
            ->whereMonth('voucher_date', $month)
            ->sum('amount_ils');

        return $allExpenses + $salaryExpenses + $paymentOut + $khaledOut + $mohammedOut + $waliOut;
    }

    /**
     * يحسب إجمالي الإيرادات لسنة محددة.
     */
    public function getYearlyRevenue(int $year): float
    {
        $paymentIn = (float) Payment::where('type', 'in')
            ->whereYear('payment_date', $year)
            ->sum('amount_ils');

        $khaledIn = (float) KhaledVoucher::where('type', 'receipt')
            ->whereYear('voucher_date', $year)
            ->sum('amount_ils');

        $mohammedIn = (float) MohammedVoucher::where('type', 'receipt')
            ->whereYear('voucher_date', $year)
            ->sum('amount_ils');

        $waliIn = (float) WaliVoucher::where('type', 'receipt')
            ->whereYear('voucher_date', $year)
            ->sum('amount_ils');

        $salePayments = 0;
        if (Schema::hasTable('sale_invoice_payments')) {
            $salePayments = (float) DB::table('sale_invoice_payments')
                ->whereYear('created_at', $year)
                ->sum('amount');
        }

        return $paymentIn + $khaledIn + $mohammedIn + $waliIn + $salePayments;
    }

    /**
     * يحسب إجمالي المصروفات لسنة محددة.
     */
    public function getYearlyExpenses(int $year): float
    {
        $allExpenses = (float) Expense::whereYear('date', $year)
            ->sum('amount_ils');

        $salaryExpenses = 0; // كما تم الاتفاق عليه حالياً لعدم وجود الجدول

        $paymentOut = (float) Payment::where('type', 'out')
            ->whereYear('payment_date', $year)
            ->sum('amount_ils');

        $khaledOut = (float) KhaledVoucher::where('type', 'payment')
            ->whereYear('voucher_date', $year)
            ->sum('amount_ils');

        $mohammedOut = (float) MohammedVoucher::where('type', 'payment')
            ->whereYear('voucher_date', $year)
            ->sum('amount_ils');

        $waliOut = (float) WaliVoucher::where('type', 'payment')
            ->whereYear('voucher_date', $year)
            ->sum('amount_ils');

        return $allExpenses + $salaryExpenses + $paymentOut + $khaledOut + $mohammedOut + $waliOut;
    }
}
