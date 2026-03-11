<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTransfer extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = ['transfer_date' => 'date'];

    public function fromProject() {
        return $this->belongsTo(Project::class, 'from_project_id');
    }

    public function toProject() {
        return $this->belongsTo(Project::class, 'to_project_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
