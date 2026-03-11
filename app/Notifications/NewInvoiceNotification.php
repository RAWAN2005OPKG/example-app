<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewInvoiceNotification extends Notification
{
    use Queueable;

    private $invoice;

    public function __construct($invoice)
    {
        $this->invoice = $invoice;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    // >>== هذه الدالة تحدد شكل البيانات التي ستخزن في قاعدة البيانات ==<<
    public function toArray($notifiable)
    {
        return [
            'title' => 'فاتورة جديدة تم إنشاؤها #' . $this->invoice->number,
            'icon'  => 'fas fa-file-invoice-dollar',
            'link'  => route('dashboard.sales.show', $this->invoice->id),
        ];
    }
}
