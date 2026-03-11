<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
class ChequeStatusChangedNotification extends Notification {
    use Queueable;
    private $cheque;
    private $newStatus;
    public function __construct($cheque, $newStatus) {
        $this->cheque = $cheque;
        $this->newStatus = $newStatus;
    }
    public function via($notifiable) { return ['database']; }
    public function toArray($notifiable) {
        $statusText = [
            'cashed' => 'تم صرفه',
            'returned' => 'مرتجع',
            'in_wallet' => 'في المحفظة'
        ];
        $statusIcon = [
            'cashed' => 'fas fa-check-circle text-success',
            'returned' => 'fas fa-times-circle text-danger',
            'in_wallet' => 'fas fa-wallet text-info'
        ];
        return [
            'title' => 'تحديث حالة شيك #' . $this->cheque->cheque_number . ' إلى ' . $statusText[$this->newStatus],
            'amount' => $this->cheque->amount,
            'icon'  => $statusIcon[$this->newStatus],
            'link'  => route('dashboard.checks.index'),
        ];
    }
}
