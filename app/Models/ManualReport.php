<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManualReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_date',
        'achievements',
        'issues',
        'decisions',
    ];

    protected $casts = [
        'report_date' => 'date',
    ];
}
