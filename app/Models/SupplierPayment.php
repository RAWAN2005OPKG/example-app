<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupplierPayment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'expenses';

    protected $fillable = [
        'date',
        'source_of_funds',
        'paid_by',
        'amount',
        'amount_ils',
        'currency',
        'payment_method',
        'payment_source',
        'payee',
        'payable_type',
        'payable_id',
        'notes',
    ];

    protected $casts = [
        'date' => 'date',
        'amount' => 'decimal:2',
    ];

    public function payable()
    {
        return $this->morphTo();
    }
}
