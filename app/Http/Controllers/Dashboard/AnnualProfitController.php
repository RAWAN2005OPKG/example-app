<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SaleInvoice;
use App\Models\Expense;
use Illuminate\Support\Facades\DB;

class AnnualProfitController extends Controller
{
    public function index()
    {
        if (!class_exists(SaleInvoice::class) || !class_exists(Expense::class)) {
            $annualData = [];
            return view('dashboard.annual_profit.index', compact('annualData'))
                ->with('error', 'يرجى التأكد من وجود موديلات SaleInvoice و Expense.');
        }

        // >>==  الحصول على كل السنوات التي تمت فيها عمليات بيع أو مصروفات ==<<
        // نقرأ من جدول "sale_invoices" ومن حقل "issue_date"
        $revenueYears = SaleInvoice::select(DB::raw('YEAR(issue_date) as year'))->distinct()->pluck('year');

        // نقرأ من جدول "expenses" ومن حقل "date"
        $expenseYears = Expense::select(DB::raw('YEAR(date) as year'))->distinct()->pluck('year');

        // دمج السنوات وترتيبها بشكل فريد
        $years = $revenueYears->merge($expenseYears)->unique()->sortDesc();

        $annualData = [];

        // >>==  حساب الإيرادات والمصروفات لكل سنة ==<<
        foreach ($years as $year) {
            // حساب إجمالي الإيرادات للسنة من جدول "sale_invoices"
            $totalRevenue = SaleInvoice::whereYear('issue_date', $year)->sum('total_amount');

            // حساب إجمالي المصروفات للسنة من جدول "expenses"
            $totalExpenses = Expense::whereYear('date', $year)->sum('amount');

            // حساب صافي الربح
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
            'labels' => ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'],
            'revenue' => [],
            'expenses' => []
        ];

        if ($latestYear) {
            for ($m = 1; $m <= 12; $m++) {
                $monthlyData['revenue'][] = SaleInvoice::whereYear('issue_date', $latestYear)->whereMonth('issue_date', $m)->sum('total_amount') ?? 0;
                $monthlyData['expenses'][] = Expense::whereYear('date', $latestYear)->whereMonth('date', $m)->sum('amount') ?? 0;
            }
        }

        return view('dashboard.annual_profit.index', compact('annualData', 'monthlyData', 'latestYear'));
    }
}
