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
        $openingBalance = $financialService->getOpeningBalance();
        $totalCapital = $financialService->getTotalCapital();

        // 1. بطاقات الإحصائيات الرئيسية
        $totalRevenue = $financialService->getTotalRevenue();
        $totalExpenses = $financialService->getTotalExpenses();
        $netProfit = $financialService->getTotalProfit();
        
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

            $chartData['revenue'][] = $financialService->getMonthlyRevenue($date->year, $date->month);
            $chartData['expense'][] = $financialService->getMonthlyExpenses($date->year, $date->month);
        }

        // 3. أحدث المعاملات (من قيود اليومية)
        $latestTransactions = JournalEntry::with('items')->latest()->take(8)->get();

        // إرسال كل البيانات إلى الواجهة
        return view('dashboard.financial.summary', compact(
            'totalRevenue',
            'totalExpenses',
            'openingBalance',
            'totalCapital',
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
