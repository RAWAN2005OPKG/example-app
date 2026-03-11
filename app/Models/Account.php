<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'type', 'parent_id', 'is_active'];

    // علاقة الحساب الأب
    public function parent()
    {
        return $this->belongsTo(Account::class, 'parent_id');
    }

    // علاقة الحسابات الأبناء
    public function children()
    {
        return $this->hasMany(Account::class, 'parent_id');
    }

    // دالة جديدة لتحديد هل الحساب فرعي (لا يملك أبناء)
    public function isSubAccount(): bool
    {
        return $this->children()->count() === 0;
    }
}
