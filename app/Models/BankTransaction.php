<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // <-- استدعاء الكلاس
use Illuminate\Database\Eloquent\SoftDeletes;

class BankTransaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'bank_account_id', 'transaction_date', 'type', 'amount', 'currency',
        'from_account_id', 'to_account_id', 'details', 'notes',
        'related_transaction_id', 'status'
    ];

    protected $casts = [
        'transaction_date' => 'date',
    ];


    /**
     * العلاقة لجلب الحساب الذي خرجت منه الأموال (في حالة الحوالة أو السحب).
     */
    public function fromAccount(): BelongsTo
    {
        // هذه العلاقة تربط عمود 'from_account_id' في هذا الجدول
        // بعمود 'id' في جدول 'bank_accounts'
        return $this->belongsTo(BankAccount::class, 'from_account_id');
    }

    /**
     * العلاقة لجلب الحساب الذي دخلت إليه الأموال (في حالة الحوالة أو الإيداع).
     */
    public function toAccount(): BelongsTo
    {
        // هذه العلاقة تربط عمود 'to_account_id' في هذا الجدول
        // بعمود 'id' في جدول 'bank_accounts'
        return $this->belongsTo(BankAccount::class, 'to_account_id');
    }

    /**
     * علاقة عامة للحساب الرئيسي (تستخدم في الإيداع والسحب التقليدي).
     */
    public function bankAccount(): BelongsTo
    {
        return $this->belongsTo(BankAccount::class, 'bank_account_id');
    }


}
