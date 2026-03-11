<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Stocktake extends Model {
    protected $fillable = ['reference_no', 'warehouse_id', 'date', 'status'];
    protected $casts = ['date' => 'date'];

    public function warehouse() { return $this->belongsTo(Warehouse::class); }
    public function items() { return $this->hasMany(StocktakeItem::class); }
}
