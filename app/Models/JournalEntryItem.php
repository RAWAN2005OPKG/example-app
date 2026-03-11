<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalEntryItem extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['journal_entry_id', 'account_id', 'debit', 'credit'];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
