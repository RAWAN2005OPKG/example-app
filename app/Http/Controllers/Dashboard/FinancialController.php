<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\SaleInvoice;
use App\Models\Expense;
use App\Models\JournalEntry;

class FinancialController extends Controller
{
    public function summary()
    {
        $financialService = new \App\Services\FinancialService();

        // 1. بطاقات الإحصائيات الرئيسية
        $totalRevenue = SaleInvoice::sum('total_amount') ?: 0;
        $totalExpenses = $financialService->getTotalExpenses();
        $netProfit = $totalRevenue - $totalExpenses;
        
        // صافي التدفق النقدي (إجمالي المقبوضات - إجمالي المدفوعات من كل الخزائن والبنوك)
        $totalIn = \App\Models\CashTransaction::where('type', 'in')->sum('amount_ils') + 
                  \App\Models\BankTransaction::where('type', 'deposit')->sum('amount');
        $totalOut = \App\Models\CashTransaction::where('type', 'out')->sum('amount_ils') + 
                   \App\Models\BankTransaction::where('type', 'withdrawal')->sum('amount');
        $netCashFlow = $totalIn - $totalOut;

        // نسب مالية
        $profitMargin = $totalRevenue > 0 ? ($netProfit / $totalRevenue) * 100 : 0;
        $expenseRatio = $totalRevenue > 0 ? ($totalExpenses / $totalRevenue) * 100 : 0;

        // 2. بيانات الرسم البياني (آخر 6 أشهر)
        $chartData = [
            'revenue' => [],
            'expense' => []
        ];
        $chartLabels = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $chartLabels[] = $date->translatedFormat('F'); // Use translated format for Arabic months

            $chartData['revenue'][] = SaleInvoice::whereYear('issue_date', $date->year)
                                                ->whereMonth('issue_date', $date->month)
                                                ->sum('total_amount') ?? 0;

            $chartData['expense'][] = Expense::whereYear('date', $date->year)
                                              ->whereMonth('date', $date->month)
                                              ->sum('amount') ?? 0;
        }

        // 3. أحدث المعاملات (من قيود اليومية)
        $latestTransactions = JournalEntry::with('items')->latest()->take(8)->get();

        // إرسال كل البيانات إلى الواجهة
        return view('dashboard.financial.summary', compact(
            'totalRevenue',
            'totalExpenses',
            'netProfit',
            'netCashFlow',
            'profitMargin',
            'expenseRatio',
            'chartLabels',
            'chartData',
            'latestTransactions'
        ));
    }
}
