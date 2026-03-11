<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleInvoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'number', 'customer_id', 'issue_date', 'due_date', 'subtotal',
        'discount_value', 'tax_value', 'total_amount', 'paid_amount',
        'status', 'notes'
    ];

    protected $casts = [
        'issue_date' => 'date',
        'due_date' => 'date',
    ];
}
