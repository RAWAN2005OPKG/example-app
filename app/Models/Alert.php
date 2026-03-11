<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'message',
        'type', 
        'priority', 
        'status', 
        'related_id', 
        'related_type', 
        'due_date',
        'created_by',
        'assigned_to',
    ];

    protected $casts = [
        'due_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function assignee()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function getPriorityColorAttribute()
    {
        return match($this->priority) {
            'high' => 'danger',
            'medium' => 'warning',
            'low' => 'info',
            default => 'secondary'
        };
    }

    public function getTypeIconAttribute()
    {
        return match($this->type) {
            'cheque_due' => 'fas fa-money-check',
            'contract_expiry' => 'fas fa-file-contract',
            'payment_due' => 'fas fa-credit-card',
            'general' => 'fas fa-bell',
            default => 'fas fa-exclamation-triangle'
        };
    }

    public function getTypeNameAttribute()
    {
        return match($this->type) {
            'cheque_due' => 'شيك مستحق',
            'contract_expiry' => 'عقد منتهي الصلاحية',
            'payment_due' => 'دفعة مستحقة',
            'general' => 'عام',
            default => 'غير محدد'
        };
    }

    public function getPriorityNameAttribute()
    {
        return match($this->priority) {
            'high' => 'عالية',
            'medium' => 'متوسطة',
            'low' => 'منخفضة',
            default => 'غير محدد'
        };
    }

    public function getStatusNameAttribute()
    {
        return match($this->status) {
            'active' => 'نشط',
            'dismissed' => 'مرفوض',
            'resolved' => 'محلول',
            default => 'غير محدد'
        };
    }
}
