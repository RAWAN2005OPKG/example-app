<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KhaledVoucher extends Model {
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected $casts = ['voucher_date' => 'date'];

    public function details() { return $this->hasOne(KhaledVoucherDetail::class); }
    public function project() { return $this->belongsTo(Project::class); }
    public function client() { return $this->belongsTo(Client::class); }
    public function investor() { return $this->belongsTo(Investor::class); }
    public function contract() { return $this->belongsTo(Contract::class); }
    public function user() { return $this->belongsTo(User::class); }
}
