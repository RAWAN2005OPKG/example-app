<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SaleInvoice;
use App\Models\Expense;
use App\Models\JournalEntry;
use App\Models\JournalEntryItem;
use App\Models\Account;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AnnualProfitController extends Controller
{
    public function index()
    {
        // >>== الحصول على كل السنوات التي تمت فيها عمليات ==<<
        $revenueYears = SaleInvoice::select(DB::raw('YEAR(issue_date) as year'))->distinct()->pluck('year');
        $expenseYears = Expense::select(DB::raw('YEAR(date) as year'))->distinct()->pluck('year');
        $journalYears = JournalEntry::select(DB::raw('YEAR(date) as year'))->distinct()->pluck('year');

        // Check if receipts table exists
        if (Schema::hasTable('receipt_vouchers')) {
            $receiptYears = \App\Models\ReceiptVoucher::select(DB::raw('YEAR(transaction_date) as year'))->distinct()->pluck('year');
            $years = $revenueYears->merge($expenseYears)->merge($journalYears)->merge($receiptYears);
        } else {
            $years = $revenueYears->merge($expenseYears)->merge($journalYears);
        }

        // Check if payments table exists
        if (Schema::hasTable('payments')) {
            $paymentYears = \App\Models\Payment::select(DB::raw('YEAR(date) as year'))->distinct()->pluck('year');
            $years = $years->merge($paymentYears);
        }

        // دمج السنوات وترتيبها بشكل فريد
        $years = $years->unique()->sortDesc();

        $annualData = [];

        // >>== حساب الإيرادات والمصروفات لكل سنة ==<<
        foreach ($years as $year) {
            // ==================== الإيرادات ====================

            // 1. إيرادات فواتير البيع
            $salesRevenue = SaleInvoice::whereYear('issue_date', $year)->sum('total_amount') ?? 0;

            // 2. سندات القبض (إيرادات إضافية) - إذا كانت الجداول موجودة
            $receiptVouchers = 0;
            if (Schema::hasTable('receipt_vouchers') && class_exists(\App\Models\ReceiptVoucher::class)) {
                try {
                    $receiptVouchers = \App\Models\ReceiptVoucher::whereYear('transaction_date', $year)->sum('amount') ?? 0;
                } catch (\Exception $e) {
                    $receiptVouchers = 0;
                }
            }

            // 3. إيرادات من القيود المحاسبية (الحسابات الإيرادية)
            $journalRevenue = $this->getJournalRevenueByYear($year);

            // إجمالي الإيرادات
            $totalRevenue = $salesRevenue + $receiptVouchers + $journalRevenue;

            // ==================== المصروفات ====================

            // 1. مصروفات من جدول المصروفات
            $expensesFromTable = Expense::whereYear('date', $year)->sum('amount') ?? 0;

            // 2. مدفوعات (مصروفات إضافية) - إذا كانت الجداول موجودة
            $payments = 0;
            if (Schema::hasTable('payments') && class_exists(\App\Models\Payment::class)) {
                try {
                    $payments = \App\Models\Payment::whereYear('date', $year)->sum('amount') ?? 0;
                } catch (\Exception $e) {
                    $payments = 0;
                }
            }

            // 3. مصروفات من القيود المحاسبية (حسابات المصروفات)
            $journalExpenses = $this->getJournalExpensesByYear($year);

            // إجمالي المصروفات
            $totalExpenses = $expensesFromTable + $payments + $journalExpenses;

            // حساب صافي الربح
            $netProfit = $totalRevenue - $totalExpenses;

            $annualData[] = [
                'year' => $year,
                // المفاتيح القديمة للتوافق مع الـ View
                'revenue' => $totalRevenue,
                'expenses' => $totalExpenses,
                'net_profit' => $netProfit,
                // التفصيل
                'sales_revenue' => $salesRevenue,
                'receipt_vouchers' => $receiptVouchers,
                'journal_revenue' => $journalRevenue,
                'total_revenue' => $totalRevenue,
                'table_expenses' => $expensesFromTable,
                'payments' => $payments,
                'journal_expenses' => $journalExpenses,
                'total_expenses' => $totalExpenses,
            ];
        }

        // >>== حساب البيانات الشهرية للسنة الأخيرة لعرضها في رسم بياني ==<<
        $latestYear = $years->first();
        $monthlyData = [
    /**
     * Get revenue from journal entries by year
     * Looks for accounts with type='revenue' or code starting with 4
     */
    private function getJournalRevenueByYear($year)
    {
        try {
            // Get revenue accounts - try multiple approaches
            $revenueAccountIds = Account::where(function($query) {
                $query->where('type', 'revenue')
                      ->orWhere('code', 'like', '4%')
                      ->orWhere('code', 'like', '4%');
            })->pluck('id');

            if ($revenueAccountIds->isEmpty()) {
                return 0;
            }

            // Get credit amounts from journal entries for revenue accounts
            $journalEntries = JournalEntry::whereYear('date', $year)
                ->with(['items' => function($query) use ($revenueAccountIds) {
                    $query->whereIn('account_id', $revenueAccountIds);
                }])->get();

            $totalCredit = 0;
            foreach ($journalEntries as $entry) {
                foreach ($entry->items as $item) {
                    $totalCredit += $item->credit ?? 0;
                }
            }

            return $totalCredit;
        } catch (\Exception $e) {
            // If there's any error, return 0
            return 0;
        }
    }

    /**
     * Get expenses from journal entries by year
     * Looks for accounts with type='expense' or code starting with 5 or 6
     */
    private function getJournalExpensesByYear($year)
    {
        try {
            // Get expense accounts
            $expenseAccountIds = Account::where(function($query) {
                $query->where('type', 'expense')
                      ->orWhere('code', 'like', '5%')
                      ->orWhere('code', 'like', '6%');
            })->pluck('id');

            if ($expenseAccountIds->isEmpty()) {
                return 0;
            }

            // Get debit amounts from journal entries for expense accounts
            $journalEntries = JournalEntry::whereYear('date', $year)
                ->with(['items' => function($query) use ($expenseAccountIds) {
                    $query->whereIn('account_id', $expenseAccountIds);
                }])->get();

            $totalDebit = 0;
            foreach ($journalEntries as $entry) {
                foreach ($entry->items as $item) {
                    $totalDebit += $item->debit ?? 0;
                }
            }

            return $totalDebit;
        } catch (\Exception $e) {
            return 0;
        }
    }

    /**
     * Get revenue from journal entries by month
     */
    private function getJournalRevenueByMonth($year, $month)
    {
        try {
            $revenueAccountIds = Account::where(function($query) {
                $query->where('type', 'revenue')
                      ->orWhere('code', 'like', '4%');
            })->pluck('id');

            if ($revenueAccountIds->isEmpty()) {
                return 0;
            }

            $journalEntries = JournalEntry::whereYear('date', $year)->whereMonth('date', $month)
                ->with(['items' => function($query) use ($revenueAccountIds) {
                    $query->whereIn('account_id', $revenueAccountIds);
                }])->get();

            $totalCredit = 0;
            foreach ($journalEntries as $entry) {
                foreach ($entry->items as $item) {
                    $totalCredit += $item->credit ?? 0;
                }
            }

            return $totalCredit;
        } catch (\Exception $e) {
            return 0;
        }
    }

    /**
     * Get expenses from journal entries by month
     */
    private function getJournalExpensesByMonth($year, $month)
    {
        try {
            $expenseAccountIds = Account::where(function($query) {
                $query->where('type', 'expense')
                      ->orWhere('code', 'like', '5%')
                      ->orWhere('code', 'like', '6%');
            })->pluck('id');

            if ($expenseAccountIds->isEmpty()) {
                return 0;
            }

            $journalEntries = JournalEntry::whereYear('date', $year)->whereMonth('date', $month)
                ->with(['items' => function($query) use ($expenseAccountIds) {
                    $query->whereIn('account_id', $expenseAccountIds);
                }])->get();

            $totalDebit = 0;
            foreach ($journalEntries as $entry) {
                foreach ($entry->items as $item) {
                    $totalDebit += $item->debit ?? 0;
                }
            }

            return $totalDebit;
        } catch (\Exception $e) {
            return 0;
        }
    }
}
