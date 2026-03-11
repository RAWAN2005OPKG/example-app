<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundTransfer extends Model {
    use HasFactory;
    protected $fillable = ['date', 'amount', 'currency', 'from_type', 'from_id', 'to_type', 'to_id', 'notes'];
}
