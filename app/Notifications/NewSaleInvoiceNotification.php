<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
class NewSaleInvoiceNotification extends Notification {
    use Queueable;
    private $invoice;
    public function __construct($invoice) { $this->invoice = $invoice; }
    public function via($notifiable) { return ['database']; }
    public function toArray($notifiable) {
        return [
            'title' => 'فاتورة جديدة للعميل: ' . $this->invoice->customer->name,
            'amount' => $this->invoice->total_amount,
            'icon'  => 'fas fa-file-invoice-dollar text-primary',
            'link'  => '#',
        ];
    }
}
