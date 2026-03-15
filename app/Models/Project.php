<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'location',
        'description',
        'start_date',
        'estimated_end_date',
        'duration_months',
        'main_contractor',
        'architect',
        'estimated_cost_usd',
        'estimated_cost_ils',
        'exchange_rate',
        'notes',
        'attachments',
        'completion_percentage',
        'status',
        'balance',
    ];

    protected $casts = [
        'start_date' => 'date',
        'estimated_end_date' => 'date',
        'attachments' => 'array',
        'estimated_cost_usd' => 'float',
        'estimated_cost_ils' => 'float',
        'exchange_rate' => 'float',
        'balance' => 'float',
        'completion_percentage' => 'integer',
    ];

    /**
     * علاقة الوحدات (One-to-Many)
     */
    public function units(): HasMany
    {
        return $this->hasMany(ProjectUnit::class);
    }

    /**
     * علاقة المستثمرين (Many-to-Many)
     */
    public function investors(): BelongsToMany
    {
        return $this->belongsToMany(Investor::class, 'project_investor') // <--- تم إضافة اسم الجدول هنا
            ->withPivot('investment_percentage', 'invested_amount', 'notes')
            ->withTimestamps();
    }

    /**
     * تحديث رصيد المشروع
     */
    public function applyBalanceDelta(float $amount): void
    {
        $this->increment('balance', $amount);
    }

    /**
     * إجمالي قيمة العقود المرتبطة بالمشروع
     */
    public function getTotalContractValueAttribute(): float
    {
        return (float) Contract::where('project_id', $this->id)->sum('total_amount_ils');
    }

    /**
     * إجمالي الاستثمارات المرتبطة بالمشروع
     */
    public function getTotalInvestmentsAttribute(): float
    {
        return (float) $this->investors()->sum('invested_amount_ils');
    }

    /**
     * إجمالي المحصل من العملاء (عبر العقود المرتبطة بوحدات المشروع)
     */
    public function getTotalCollectedFromClientsAttribute(): float
    {
        return (float) Payment::where('type', 'in')
            ->whereHas('contract', function($q) {
                $q->where('project_id', $this->id)
                  ->where('contractable_type', Client::class);
            })
            ->sum(DB::raw('amount * exchange_rate'));
    }

    /**
     * إجمالي المحصل من المستثمرين
     */
    public function getTotalCollectedFromInvestorsAttribute(): float
    {
        return (float) Payment::where('type', 'in')
            ->where('payable_type', Investor::class)
            ->whereHas('contract', function($q) {
                $q->where('project_id', $this->id);
            })
            ->sum(DB::raw('amount * exchange_rate'));
    }
}
