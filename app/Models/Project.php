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
        'notes',
        'attachments',
        'completion_percentage',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
        'estimated_end_date' => 'date',
        'attachments' => 'array',
        'estimated_cost_usd' => 'float',
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
}
