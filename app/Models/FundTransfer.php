<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundTransfer extends Model {
    use HasFactory;
    protected $fillable = ['date', 'amount', 'currency', 'fromable_type', 'fromable_id', 'toable_type', 'toable_id', 'notes'];
}
