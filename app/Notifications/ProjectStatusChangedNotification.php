<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
class ProjectStatusChangedNotification extends Notification {
    use Queueable;
    private $project;
    private $newStatus;
    public function __construct($project, $newStatus) {
        $this->project = $project;
        $this->newStatus = $newStatus;
    }
    public function via($notifiable) { return ['database']; }
    public function toArray($notifiable) {
        // يمكنك تخصيص النصوص والأيقونات حسب الحالة
        $statusText = ['pending' => 'قيد الانتظار', 'in_progress' => 'قيد التنفيذ', 'completed' => 'مكتمل', 'canceled' => 'ملغي'];
        $statusIcon = ['pending' => 'fas fa-clock text-warning', 'in_progress' => 'fas fa-cogs text-primary', 'completed' => 'fas fa-check-circle text-success', 'canceled' => 'fas fa-times-circle text-danger'];

        return [
            'title' => 'مشروع "' . $this->project->name . '" الآن ' . ($statusText[$this->newStatus] ?? $this->newStatus),
            'icon'  => $statusIcon[$this->newStatus] ?? 'fas fa-info-circle',
            'link'  => route('dashboard.projects.show', $this->project->id),
        ];
    }
}
