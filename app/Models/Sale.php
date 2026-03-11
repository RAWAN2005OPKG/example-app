<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    /**
     * الحقول التي يمكن تعبئتها بشكل جماعي.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sale_date',
        'customer_name',
        'project_name',
        'amount_paid',
        'seller_name',
        'payment_method',
        'notes',

    ];

    /**
     * تحويل الحقول التي تحتوي على تاريخ إلى كائنات Carbon.
     *
     * @var array<int, string>
     */
    protected $casts = [
        'sale_date' => 'datetime',
    ];
}
