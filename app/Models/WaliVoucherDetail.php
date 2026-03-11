<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaliVoucherDetail extends Model {
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function waliVoucher() { return $this->belongsTo(WaliVoucher::class); }
}
