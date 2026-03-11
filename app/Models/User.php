<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * الأعمدة القابلة للتعبئة
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * الأعمدة اللي لازم تكون مخفية لما يتحول الموديل لـ JSON
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * الأعمدة اللي Laravel يحولها لأنواع مختلفة تلقائيًا
     *
     * @var array<string, string>
     */
protected $casts = [



    ];
}
