<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
class NewCustomerNotification extends Notification {
    use Queueable;
    private $customer;
    public function __construct($customer) { $this->customer = $customer; }
    public function via($notifiable) { return ['database']; }
    public function toArray($notifiable) {
        return [
            'title' => 'عميل جديد انضم: ' . $this->customer->name,
            'icon'  => 'fas fa-user-plus text-info',
            'link'  => route('dashboard.customers.show', $this->customer->id),
        ];
    }
}
