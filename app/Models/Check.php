<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Check extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'check_number',
        'bank_name',
        'issue_date',
        'due_date',
        'type',
        'party_name',
        'party_phone',
        'amount',
        'currency',
        'exchange_rate',
        'amount_ils',
        'deposit_bank_account_id',
        'payment_bank_account_id',
        'project_id',
        'project_unit_id',
        'notes',
    ];

    protected $casts = [
        'issue_date' => 'date',
        'due_date' => 'date',
        'amount' => 'decimal:2',
        'amount_ils' => 'decimal:2',
    ];

    // علاقة الشيك بالمشروع
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // علاقة الشيك بالوحدة العقارية
    public function projectUnit()
    {
        return $this->belongsTo(ProjectUnit::class);
    }

    // علاقة الشيك بالحساب البنكي (حساب الإيداع)
    public function depositBankAccount()
    {
        return $this->belongsTo(BankAccount::class, 'deposit_bank_account_id');
    }

    // علاقة الشيك بالحساب البنكي (حساب الدفع)
    public function paymentBankAccount()
    {
        return $this->belongsTo(BankAccount::class, 'payment_bank_account_id');
    }
}
