<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
class NewExpenseNotification extends Notification {
    use Queueable;
    private $expense;
    public function __construct($expense) { $this->expense = $expense; }
    public function via($notifiable) { return ['database']; }
    public function toArray($notifiable) {
        return [
            'title' => 'مصروف جديد: ' . $this->expense->payee,
            'amount' => $this->expense->amount,
            'icon'  => 'fas fa-receipt text-danger',
            'link'  => '#',
        ];
    }
}
