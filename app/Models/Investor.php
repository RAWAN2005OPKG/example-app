<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Investor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'unique_id',
        'company',
        'id_number',
        'phone',
        'notes',
    ];


    protected static function boot()
    {
        parent::boot();

        // هذا الكود يعمل "قبل" محاولة إنشاء السجل في قاعدة البيانات
        static::creating(function ($model) {
            // إذا كان حقل unique_id فارغاً، قم بإنشاء قيمة جديدة له
            if (empty($model->unique_id)) {
                $model->unique_id = 'INV-' . time();
            }
        });
    }

  public function contracts()
    {
        return $this->morphMany(Contract::class, 'contractable');
    }
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_investor')
            ->withPivot('investment_percentage', 'invested_amount', 'currency', 'exchange_rate', 'invested_amount_ils', 'notes')
            ->withTimestamps();
    }

    public function payments()
    {
        return $this->morphMany(Payment::class, 'payable');
    }

    public function getTotalInvestmentIlsAttribute(): float
    {
        if ($this->relationLoaded('projects')) {
            return (float) $this->projects->sum('pivot.invested_amount_ils');
        }
        return (float) $this->projects()->sum('invested_amount_ils');
    }

    public function getTotalPaidOutAttribute(): float
    {
        if ($this->relationLoaded('payments')) {
            return (float) $this->payments->where('type', 'out')->sum('amount_ils');
        }
        return (float) $this->payments()->where('type', 'out')->sum('amount_ils');
    }

    public function getRemainingBalanceAttribute(): float
    {
        return $this->total_investment_ils - $this->total_paid_out;
    }
}
