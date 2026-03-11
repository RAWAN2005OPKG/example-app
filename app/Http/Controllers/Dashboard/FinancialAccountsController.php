<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use App\Models\CashSafe;
use App\Models\Check;
use App\Services\FinancialService;
use Illuminate\Http\Request;

class FinancialAccountsController extends Controller
{
    public function index(Request $request)
    {
        // جلب بيانات الخزائن
        $cashSafes = CashSafe::latest()->get();

        // جلب بيانات الحسابات البنكية
        $bankAccounts = BankAccount::latest()->get();

        // جلب بيانات الشيكات مع الفلاتر
        $checksQuery = Check::latest();

        if ($request->filled('check_status')) {
            $checksQuery->where('status', $request->check_status);
        }
        if ($request->filled('check_type')) {
            $checksQuery->where('type', $request->check_type);
        }
        if ($request->filled('check_search')) {
            $searchTerm = $request->check_search;
            $checksQuery->where(function ($query) use ($searchTerm) {
                $query->where('check_number', 'like', "%{$searchTerm}%")
                      ->orWhere('holder_name', 'like', "%{$searchTerm}%");
            });
        }
        $checks = $checksQuery->paginate(10, ['*'], 'checks_page');

        // حساب الإجماليات باستخدام FinancialService لضمان الدقة
        $financialService = new FinancialService();
        $openingBalance = $financialService->getOpeningBalance();
        $totalCashBalance = $financialService->getCashBalance();
        $totalBankBalance = $financialService->getBankBalance();
        $totalChecksBalance = $financialService->getChecksBalance();
        $totalCapital = $financialService->getTotalCapital();

        $cashSafes->transform(function ($safe) {
            $safe->display_balance = (float) $safe->balance;
            return $safe;
        });

        if ($cashSafes->count() === 1 && abs($totalCashBalance - (float) $cashSafes->first()->balance) > 0.01) {
            $cashSafes->first()->display_balance = $totalCashBalance;
        }

        $bankAccounts->transform(function (BankAccount $account) {
            $account->display_balance = $account->resolved_balance;
            return $account;
        });

        // حساب توزيع الشيكات حسب الحالة للرسم البياني
        $checkStats = [
            'in_wallet' => Check::where('status', 'in_wallet')->count(),
            'under_collection' => Check::where('status', 'under_collection')->count(),
            'cleared' => Check::where('status', 'cleared')->count(),
            'bounced' => Check::where('status', 'bounced')->count(),
        ];

        return view('dashboard.financial_accounts.index', compact(
            'cashSafes',
            'bankAccounts',
            'checks',
            'openingBalance',
            'totalCashBalance',
            'totalBankBalance',
            'totalChecksBalance',
            'totalCapital',
            'checkStats'
        ));
    }
}
