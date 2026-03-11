<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'payment_date' => 'date'
    ];

    public function payable()
    {
        return $this->morphTo();
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    public function details()
    {
        return $this->hasOne(PaymentDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
