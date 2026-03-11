<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\CashTransaction;
use App\Models\BankTransaction;
use App\Models\Expense;
use App\Services\FinancialService; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    protected $financialService;

    // حقن الخدمة المالية في المتحكم
    public function __construct(FinancialService $financialService)
    {
        $this->financialService = $financialService;
    }

    /**
     * عرض لوحة التحكم الرئيسية مع كل البيانات المجمعة.
     */
    public function index()
    {
        // 1. جلب الأرصدة الرئيسية باستخدام الخدمة المالية
        $totalCapital = $this->financialService->getTotalCapital();
        $totalCashBalance = $this->financialService->getCashBalance();
        $totalBankBalance = $this->financialService->getBankBalance();

        // 2. إحصائيات سريعة
        $projectsCount = Project::count();
        $activeProjectsCount = Project::where('status', 'active')->count(); // نفترض وجود حقل status

        // 3. بيانات الرسم البياني لتوزيع السيولة
        $liquidityData = [
            'labels' => ['رصيد الخزينة', 'رصيد البنوك'],
            'data' => [$totalCashBalance, $totalBankBalance],
        ];

        // 4. بيانات الرسم البياني للإيرادات والمصروفات الشهرية (آخر 6 أشهر)
        $monthlyFlow = $this->getMonthlyFinancialFlow();

        // 5. جلب آخر 5 حركات (كمثال)
        $latestCash = CashTransaction::latest()->take(5)->get();
        $latestBank = BankTransaction::latest()->take(5)->get();

        // 6. إرسال كل البيانات إلى الواجهة
        return view('dashboard.home', [
            'totalCapital' => $totalCapital,
            'totalCashBalance' => $totalCashBalance,
            'totalBankBalance' => $totalBankBalance,
            'projectsCount' => $projectsCount,
            'activeProjectsCount' => $activeProjectsCount,
            'liquidityData' => json_encode($liquidityData),
            'monthlyFlowData' => json_encode($monthlyFlow),
            'latestCash' => $latestCash,
            'latestBank' => $latestBank,
        ]);
    }

    /**
     * دالة مساعدة لجلب بيانات الإيرادات والمصروفات الشهرية.
     */
    private function getMonthlyFinancialFlow()
    {
        $labels = [];
        $incomeData = [];
        $expenseData = [];

        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $monthName = $date->format('M'); // 'Jan', 'Feb', etc.
            $labels[] = $monthName;

            // حساب الإيرادات (الإيداعات النقدية والبنكية)
            $income = CashTransaction::where('type', 'in')
                ->whereYear('transaction_date', $date->year)
                ->whereMonth('transaction_date', $date->month)
                ->sum('amount_ils')
                +
                BankTransaction::where('type', 'deposit')
                ->whereYear('transaction_date', $date->year)
                ->whereMonth('transaction_date', $date->month)
                ->sum('amount'); // نفترض أن المبالغ موحدة بالشيكل

            // حساب المصروفات
            $expenses = Expense::whereYear('date', $date->year)
                ->whereMonth('date', $date->month)
                ->sum('amount_ils');

            $incomeData[] = round($income, 2);
            $expenseData[] = round($expenses, 2);
        }

        return [
            'labels' => $labels,
            'income' => $incomeData,
            'expenses' => $expenseData,
        ];
    }
}
