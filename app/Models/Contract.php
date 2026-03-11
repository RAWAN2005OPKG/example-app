<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * اسم الجدول المرتبط بالموديل.
     */
    protected $table = 'contracts';

    protected $guarded = [];

    /**
     * تحويل الحقول إلى أنواع بيانات محددة.
     */
    protected $casts = [
        'contract_date' => 'date',
    ];

    /**
     * علاقة متعددة الأشكال لجلب صاحب العقد.
     */
    public function contractable()
    {
        return $this->morphTo();
    }

    /**
     * علاقة لجلب المشروع المرتبط.
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * علاقة لجلب الوحدة السكنية المرتبطة.
     */
    public function projectUnit()
    {
        return $this->belongsTo(ProjectUnit::class);
    }
}
