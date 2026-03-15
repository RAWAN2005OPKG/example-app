لا<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalEntry extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'description', 'reference_type', 'reference_id'];

    public function items()
    {
        return $this->hasMany(JournalEntryItem::class);
    }

    /**
     * Get the parent model (e.g., FundTransfer) that created this journal entry.
     */
    public function reference()
    {
        return $this->morphTo();
    }
}
