<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseInvoiceItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_invoice_id', 'product_id', 'product_name',
        'quantity', 'unit_price', 'total'
    ];

    public function invoice()
    {
        return $this->belongsTo(PurchaseInvoice::class);
    }
}
