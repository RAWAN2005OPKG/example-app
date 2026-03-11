<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'sku',
        'category',
        'purchase_price',
        'sale_price',
        'quantity',
        'weight',
        'is_active',
    ];
 public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }}
