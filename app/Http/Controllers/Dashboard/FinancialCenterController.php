<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use App\Models\CashSafe;
use App\Models\Check;
use Illuminate\Http\Request;

class FinancialCenterController extends Controller
{
    /**
     * عرض صفحة المركز المالي.
     */
    public function index()
    {
        // 1. جلب بيانات الخزائن النقدية
        $cashSafes = CashSafe::orderBy('created_at', 'desc')->get();

        // 2. جلب بيانات الحسابات البنكية مع تحميل علاقة البنك لتجنب N+1 query problem
        $bankAccounts = BankAccount::with('bank')->orderBy('created_at', 'desc')->get();

        // 3. جلب الشيكات (التي في المحفظة) مع الترقيم (Pagination)
        $checks = Check::where('status', 'in_wallet')->latest()->paginate(10);

        // 4. حساب الإجماليات
        // ملاحظة: هذا الحساب يفترض أن جميع الأرصدة بنفس العملة أو تم تحويلها.
        // للتبسيط، سنجمع الأرقام كما هي. في تطبيق حقيقي، يجب توحيد العملات.
        $totalCashBalance = $cashSafes->sum('balance');
        $totalBankBalance = $bankAccounts->sum('current_balance');
        $totalOverallBalance = $totalCashBalance + $totalBankBalance;

        // 5. إرسال جميع البيانات إلى الواجهة
        return view('dashboard.financial_center.index', [
            'cashSafes' => $cashSafes,
            'bankAccounts' => $bankAccounts,
            'checks' => $checks,
            'totalCashBalance' => $totalCashBalance,
            'totalBankBalance' => $totalBankBalance,
            'totalOverallBalance' => $totalOverallBalance,
        ]);
    }
}
