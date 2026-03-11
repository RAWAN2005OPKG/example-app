<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalEntry extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'description'];

    public function items()
    {
        return $this->hasMany(JournalEntryItem::class);
    }
}
