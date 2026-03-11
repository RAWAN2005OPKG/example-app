<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'email', 'phone', 'address', 'notes'];

    public function invoices()
    {
        return $this->hasMany(PurchaseInvoice::class);
    }

    public function returns()
    {
        return $this->hasMany(PurchaseReturn::class);
    }
public function purchaseReturns()
{
    return $this->hasMany(PurchaseReturn::class);
}}
