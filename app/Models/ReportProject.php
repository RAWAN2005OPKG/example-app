<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportProject extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'report_projects';

    protected $fillable = [
        'name',
        'project_title',
        'owner_name',
        'owner_phone',
        'owner_id',
        'project_status',
        'start_date',
        'total_budget',
        'currency',
        'description',
        'project_media',
    ];

    protected $casts = [
        'total_budget' => 'decimal:2',
        'start_date' => 'date',
        'project_media' => 'array', // هذا مهم جداً للتعامل مع حقل JSON
    ];

    // حالياً، لا توجد علاقات ضرورية أخرى بناءً على التحليل.
    // إذا أردت ربطه بالدفعات، يمكننا إضافة علاقة morphMany هنا.
}
