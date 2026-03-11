<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Subcontractor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'unique_id', 'name', 'specialization', 'id_number', 'phone', 'notes',
    ];

    /**
     * علاقة "متعدد لمتعدد" مع المشاريع من خلال جدول العقود.
     */
    public function contracts()
    {
        return $this->belongsToMany(Project::class, 'subcontractor_contracts')
                    ->withPivot('id', 'contract_date', 'contract_value', 'currency', 'exchange_rate', 'contract_details')
                    ->withTimestamps();
    }

    /**
     * علاقة مع الدفعات (إذا كان لديك جدول دفعات للموردين).
     */
    public function payments()
    {
        return $this->morphMany(Payment::class, 'payable'); // نفترض أن جدول payments يخدم الجميع
    }

    // --- Accessors لحساب الأرصدة ---

    protected function totalContractsValue(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->contracts->sum(function ($contract) {
                return $contract->pivot->contract_value * $contract->pivot->exchange_rate;
            })
        );
    }

    protected function totalPaid(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->payments()->where('type', 'out')->sum('amount_ils')
        );
    }

    protected function remainingBalance(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->total_contracts_value - $this->total_paid
        );
    }
}
