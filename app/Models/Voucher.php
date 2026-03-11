<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voucher extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'serial_number',
        'voucher_date',
        'type',
        'description',
        'amount',
        'currency',
        'exchange_rate',
        'amount_ils',
        'payment_method',
        'cash_safe_id',
        'handler_name',
        'handler_role',
        'from_bank_account_id',
        'to_bank_account_id',
        'check_number',
        'check_owner_name',
        'check_bank_name',
        'check_due_date',
        'project_id',
        'client_id',
        'investor_id',
        'notes',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'voucher_date' => 'date',
        'check_due_date' => 'date',
        'amount' => 'decimal:2',
        'amount_ils' => 'decimal:2',
        'exchange_rate' => 'decimal:4',
    ];

    /**
     * علاقة السند بالخزنة النقدية.
     */
    public function cashSafe()
    {
        return $this->belongsTo(CashSafe::class);
    }

    /**
     * علاقة السند بالحساب البنكي (المرسل).
     */
    public function fromBankAccount()
    {
        return $this->belongsTo(BankAccount::class, 'from_bank_account_id');
    }

    /**
     * علاقة السند بالحساب البنكي (المستقبل).
     */
    public function toBankAccount()
    {
        return $this->belongsTo(BankAccount::class, 'to_bank_account_id');
    }

    /**
     * علاقة السند بالمشروع.
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * علاقة السند بالعميل.
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * علاقة السند بالمستثمر.
     */
    public function investor()
    {
        return $this->belongsTo(Investor::class);
    }
}
