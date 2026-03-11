<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'unique_id', 'id_number', 'phone', 'address', 'notes'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->unique_id)) {
                $model->unique_id = 'CLT-' . time();
            }
        });
    }

  public function contracts()
    {
        return $this->morphMany(Contract::class, 'contractable');
    }
public function investments()
    {
        return $this->hasMany(Investment::class);
    }

    public function payments()
    {
        return $this->morphMany(Payment::class, 'payable');
    }

    // --- Accessors ---
    public function getTotalDueIlsAttribute()
    {
        return $this->contracts()->sum('total_amount_ils');
    }

    public function getTotalPaidIlsAttribute()
    {
        return $this->payments()->where('type', 'in')->sum('amount_ils');
    }

    public function getRemainingBalanceAttribute()
    {
        return $this->total_due_ils - $this->total_paid_ils;
    }
}
