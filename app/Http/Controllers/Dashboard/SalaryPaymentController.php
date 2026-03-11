<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SalaryPayment;
use Illuminate\Support\Carbon;

class SalaryPaymentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => ['required', 'exists:employees,id'],
            'amount' => ['required', 'numeric', 'min:0.01'],
            'notes' => ['nullable', 'string'],
            'paid_at' => ['nullable', 'date'],
        ]);

        if (empty($validated['paid_at'])) {
            $validated['paid_at'] = now()->toDateString();
        }

        SalaryPayment::create($validated);

        return back()->with('success', 'تم تسجيل دفع الراتب بنجاح');
    }
}
