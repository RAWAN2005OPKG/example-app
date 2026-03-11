<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\CashTransaction;
use App\Models\BankTransaction;
use App\Models\Check;

class GeneralLedgerController extends Controller
{


    public function index()
    {
        $cash_moves = CashTransaction::select(
            'date',
            DB::raw("'حركة كاش' as type_label"),
            'details',
            'amount',
            'currency',
            DB::raw("CASE WHEN type = 'deposit' THEN 'إيداع' ELSE 'سحب' END as move_type"),
            DB::raw("CASE WHEN type = 'deposit' THEN amount ELSE -amount END as signed_amount")
        );

        $bank_moves = BankTransaction::select(
            'date',
            DB::raw("'حركة بنك' as type_label"),
            'details',
            'amount',
            'currency',
            DB::raw("CASE WHEN type = 'deposit' THEN 'إيداع' ELSE 'سحب' END as move_type"),
            DB::raw("CASE WHEN type = 'deposit' THEN amount ELSE -amount END as signed_amount")
        );


        $cheque_moves = Check::select(
            'due_date as date',
            DB::raw("'شيك' as type_label"),
            DB::raw("CONCAT('شيك رقم: ', check_number) as details"),
            'amount',
            'currency',
            DB::raw("CASE WHEN type = 'receivable' THEN 'وارد' ELSE 'صادر' END as move_type"),
            DB::raw("CASE WHEN type = 'receivable' THEN amount ELSE -amount END as signed_amount")
        );

        $all_transactions = $cash_moves
            ->unionAll($bank_moves)
            ->unionAll($cheque_moves)
            ->orderBy('date', 'desc')
            ->paginate(20);

        // Get total liquidity using FinancialService
        $financialService = new \App\Services\FinancialService();
        $totalLiquidity = $financialService->getTotalCapital();

        return view('dashboard.treasury', compact('all_transactions', 'totalLiquidity'));
    }
}
