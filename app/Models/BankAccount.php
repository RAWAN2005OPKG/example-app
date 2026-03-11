<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $fillable = [
        'bank_id', 'account_name', 'account_number', 'iban',
        'currency', 'current_balance', 'is_active'
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
    }
       public function getOpeningBalance(): float
{
    // 'opening_balance' هو اسم العمود في قاعدة البيانات
    // الذي يخزن الرصيد الذي تم إدخاله عند إنشاء الحساب.
    return (float) $this->opening_balance;
}
}
