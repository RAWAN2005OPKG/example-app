<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PriceList extends Model {
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'type', 'value', 'is_active'];

    public function products() {
        return $this->belongsToMany(Product::class, 'price_list_products')->withPivot('fixed_price');
    }
}
