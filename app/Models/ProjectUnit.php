<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectUnit extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'unit_number',
        'unit_type',
        'floor_number',
        'area_sqm',
        'expected_price_usd',
        'specifications',
        'status',
    ];

    protected $casts = [
        'area_sqm' => 'float',
        'expected_price_usd' => 'float',
    ];

    /**
     * علاقة المشروع (Many-to-One)
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
 /**
     * العلاقة مع العملاء الذين اشتروا هذه الوحدة
     */
    public function clients()
    {
        return $this->belongsToMany(Client::class, 'client_project_unit');
    }}
