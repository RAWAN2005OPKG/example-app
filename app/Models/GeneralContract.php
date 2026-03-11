<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeneralContract extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'general_contracts'; // نحدد اسم الجدول بشكل صريح

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = []; // للسماح بالحفظ الجماعي

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'contract_date' => 'date',
    ];

    /**
     * Get the parent contractable model (investor or subcontractor).
     */
    public function contractable()
    {
        return $this->morphTo();
    }

    /**
     * Get the project that owns the contract.
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
