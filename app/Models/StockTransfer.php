<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class StockTransfer extends Model {
    protected $fillable = ['reference_no', 'from_warehouse_id', 'to_warehouse_id', 'date', 'status'];
    protected $casts = ['date' => 'date'];

    public function fromWarehouse() { return $this->belongsTo(Warehouse::class, 'from_warehouse_id'); }
    public function toWarehouse() { return $this->belongsTo(Warehouse::class, 'to_warehouse_id'); }
    public function items() { return $this->hasMany(StockTransferItem::class); }
}
