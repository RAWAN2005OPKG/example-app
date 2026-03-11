<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'position',
        'email',
        'phone',
        'salary',
        'currency',
        'bank_account_id',
    ];


    public function bankAccount()
    {
        // تأكد من أن اسم الموديل 'BankAccount' صحيح
        return $this->belongsTo(BankAccount::class);
    }


    protected $casts = [
        // هذا يضمن أن حقل الراتب سيعامل دائمًا كرقم عشري
        'salary' => 'decimal:2',
    ];


      public function salaryPayments()
      {
          return $this->hasMany(SalaryPayment::class);
     }
public function contracts()
{
    return $this->morphMany(Contract::class, 'contractable');
}
}
