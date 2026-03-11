<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentDetail extends Model {
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function payment() { return $this->belongsTo(Payment::class); }
    public function senderBankAccount() { return $this->belongsTo(BankAccount::class, 'sender_bank_account_id'); }
    public function receiverBankAccount() { return $this->belongsTo(BankAccount::class, 'receiver_bank_account_id'); }
}
