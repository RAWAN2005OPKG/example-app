<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceListProduct extends Model {
    use HasFactory;
    protected $fillable = ['price_list_id', 'product_id', 'fixed_price'];
}
