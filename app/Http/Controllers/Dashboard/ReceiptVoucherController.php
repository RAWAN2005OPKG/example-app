<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReceiptVoucher;
use Illuminate\Support\Facades\Validator;

class ReceiptVoucherController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'transaction_date' => ['required', 'date'],
            'contact_id' => ['required', 'integer'],
            'amount' => ['required', 'numeric', 'min:0.01'],
            'currency' => ['required', 'string', 'max:10'],
            'payment_method' => ['required', 'in:cash,bank_transaction,check'],
            'purpose' => ['required', 'string'],
            'purpose_description' => ['nullable', 'string'],
            'project_id' => ['nullable', 'integer'],
            'receiver_name' => ['required', 'string', 'max:255'],
            'cash_receiver' => ['nullable', 'string', 'max:255'],
            'cash_receiver_job' => ['nullable', 'string', 'max:255'],
            'sender_bank' => ['nullable', 'string', 'max:255'],
            'receiver_bank' => ['nullable', 'string', 'max:255'],
            'transaction_id' => ['nullable', 'string', 'max:255'],
            'check_number' => ['nullable', 'string', 'max:255'],
            'check_owner' => ['nullable', 'string', 'max:255'],
            'check_due_date' => ['nullable', 'date'],
        ]);



        ReceiptVoucher::create($validator->validated());


        return redirect()->route('dashboard.vouchers.index')->with('success', 'تم الإضافة بنجاح!');
    }
}
