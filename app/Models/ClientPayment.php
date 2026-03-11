<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientPayment extends Model
{
    use HasFactory;
protected $table = 'payments';

    protected $fillable = [
        'customer_id',
        'amount',
        'date',
        'paid_to',
        'paid_to_other',
        'payment_method',
        'currency',
        'notes',
        'bank_name',
        'other_bank_name',
        'other_bank_branch',
        'check_number',
        'check_bank',
        'check_due_date',
        'check_receipt_date',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'date' => 'date',
        'check_due_date' => 'date',
        'check_receipt_date' => 'date',
    ];
}
