<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ManualReport;
use App\Models\Sale;
use App\Models\Expense;

class DailyReportController extends Controller
{
    public function index(Request $request)
    {
        $reportDate = $request->input('report_date', now()->toDateString());
        $manualReport = ManualReport::where('report_date', $reportDate)->first();
        $sales = Sale::whereDate('sale_date', $reportDate)->get();
        $expenses = Expense::whereDate('date', $reportDate)->get();

        if ($request->ajax()) {
            return response()->json([
                'manual_report' => $manualReport,
                'sales' => $sales,
                'expenses' => $expenses,
            ]);
        }

        return view('dashboard.daily', compact('manualReport', 'sales', 'expenses', 'reportDate'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'report_date' => ['required', 'date'],
            'achievements' => ['nullable', 'string'],
            'issues' => ['nullable', 'string'],
            'decisions' => ['nullable', 'string'],
        ]);

        ManualReport::updateOrCreate(
            ['report_date' => $validated['report_date']],
            [
                'achievements' => $validated['achievements'] ?? null,
                'issues' => $validated['issues'] ?? null,
                'decisions' => $validated['decisions'] ?? null,
            ]
        );
         return redirect()->route('dashboard')->with('success', 'تم حفظ التقرير اليومي بنجاح');


    }
}
