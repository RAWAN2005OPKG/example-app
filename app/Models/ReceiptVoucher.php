<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiptVoucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_date',
        'contact_id',
        'amount',
        'currency',
        'payment_method', 
        'payment_source',        
        'cash_receiver',
        'cash_receiver_other',
        'cash_receiver_job',
        'sender_bank',
        'sender_bank_other',
        'sender_bank_branch',
        'receiver_bank',
        'receiver_bank_other',
        'receiver_bank_branch',
        'transaction_id',
        'check_number',
        'check_owner',
        'check_holder',
        'check_due_date',
        'check_receive_date',
        'purpose', 
        'project_id',
        'purpose_description',
        'receiver_name',
        'receiver_signature',
        'notes',
    ];

    protected $casts = [
        'transaction_date' => 'date',
        'check_due_date' => 'date',
        'check_receive_date' => 'date',
        'amount' => 'decimal:2',
    ];
}
