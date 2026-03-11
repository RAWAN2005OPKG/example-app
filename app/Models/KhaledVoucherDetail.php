<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhaledVoucherDetail extends Model {
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function khaledVoucher() { return $this->belongsTo(KhaledVoucher::class); }
    public function cash() { return $this->belongsTo(CashTransaction::class); }
    public function fromBankAccount() { return $this->belongsTo(BankAccount::class, 'from_bank_account_id'); }
    public function toBankAccount() { return $this->belongsTo(BankAccount::class, 'to_bank_account_id'); }
    public function check() { return $this->belongsTo(Check::class); }
}
