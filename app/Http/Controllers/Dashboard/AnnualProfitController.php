<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SaleInvoice;
use App\Models\Expense;
use App\Models\JournalEntry;
use App\Services\FinancialService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class AnnualProfitController extends Controller
{
    public function index()
    {
        $financialService = new FinancialService();

        // >>== الحصول على كل السنوات التي تمت فيها عمليات ==<<
        $revenueYears = SaleInvoice::select(DB::raw('YEAR(issue_date) as year'))->distinct()->pluck('year');
        $expenseYears = Expense::select(DB::raw('YEAR(date) as year'))->distinct()->pluck('year');
        $journalYears = JournalEntry::select(DB::raw('YEAR(date) as year'))->distinct()->pluck('year');

        $years = collect($revenueYears)
            ->merge($expenseYears)
            ->merge($journalYears);

        // Check if payments table exists
        if (Schema::hasTable('payments')) {
            $paymentYears = DB::table('payments')->select(DB::raw('YEAR(payment_date) as year'))->distinct()->pluck('year');
            $years = $years->merge($paymentYears);
        }

        $years = $years->unique()->filter()->sortDesc();

        if ($years->isEmpty()) {
            $years = collect([date('Y')]);
        }

        $annualData = [];

        foreach ($years as $year) {
            $totalRevenue = $financialService->getYearlyRevenue($year);
            $totalExpenses = $financialService->getYearlyExpenses($year);
            $netProfit = $totalRevenue - $totalExpenses;

            $annualData[] = [
                'year' => $year,
                'revenue' => $totalRevenue,
                'expenses' => $totalExpenses,
                'net_profit' => $netProfit,
            ];
        }

        // >>== حساب البيانات الشهرية للسنة الأخيرة لعرضها في رسم بياني ==<<
        $latestYear = $years->first();
        $monthlyData = [
            'labels' => [],
            'revenue' => [],
            'expenses' => []
        ];

        for ($m = 1; $m <= 12; $m++) {
            $date = Carbon::create($latestYear, $m, 1);
            $monthlyData['labels'][] = $date->translatedFormat('F');
            $monthlyData['revenue'][] = $financialService->getMonthlyRevenue($latestYear, $m);
            $monthlyData['expenses'][] = $financialService->getMonthlyExpenses($latestYear, $m);
        }

        return view('dashboard.annual_profit.index', compact('annualData', 'monthlyData', 'latestYear'));
    }
}
