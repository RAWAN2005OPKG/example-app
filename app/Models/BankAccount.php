<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $fillable = [
        'bank_id', 'account_name', 'account_number', 'iban',
        'currency', 'opening_balance', 'balance', 'current_balance', 'is_active'
    ];


    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }


    public function transactions()
    {
        return $this->hasMany(BankTransaction::class);
    }
     public function calculateBalance(): void
    {
        $inflow = BankTransaction::where('to_account_id', $this->id)->sum('amount');

        $outflow = BankTransaction::where('from_account_id', $this->id)->sum('amount');

        $this->balance = ($this->opening_balance ?? 0) + $inflow - $outflow;
        $this->current_balance = $this->balance;
    }

    public function getResolvedBalanceAttribute(): float
    {
        $balance = (float) ($this->balance ?? 0);
        $currentBalance = (float) ($this->current_balance ?? 0);

        if (abs($balance) < 0.01) {
            return $currentBalance;
        }

        if (abs($currentBalance) < 0.01) {
            return $balance;
        }

        if (abs($balance - $currentBalance) < 0.01) {
            return $balance;
        }

        return abs($balance) >= abs($currentBalance) ? $balance : $currentBalance;
    }

    public function setUnifiedBalance(float $amount): void
    {
        $this->forceFill([
            'balance' => $amount,
            'current_balance' => $amount,
        ])->save();
    }

    public function applyBalanceDelta(float $amount): void
    {
        $this->setUnifiedBalance($this->resolved_balance + $amount);
    }

       public function getOpeningBalance(): float
{
    // 'opening_balance' هو اسم العمود في قاعدة البيانات
    // الذي يخزن الرصيد الذي تم إدخاله عند إنشاء الحساب.
    return (float) $this->opening_balance;
}
}
