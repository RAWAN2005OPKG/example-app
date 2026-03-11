<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    use HasFactory;

    /**
     * اسم الجدول المرتبط بالنموذج.
     *
     * @var string
     */
    protected $table = 'funds';

    /**
     * الحقول التي يمكن تعبئتها جماعياً.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'initial_balance',
        'current_balance',
        'currency',
    ];


    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    // يمكنك إضافة Accessors أو Mutators هنا إذا لزم الأمر
}
