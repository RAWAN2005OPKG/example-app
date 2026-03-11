<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Check; // سنفترض أن لديك موديل للشيكات
use App\Models\Installment; // سنفترض أن لديك موديل للأقساط
use App\Models\Alert;
use Carbon\Carbon;

class CheckForAlerts extends Command
{
    protected $signature = 'app:check-for-alerts';
    protected $description = 'Check for upcoming due dates and create alerts';

    public function handle()
    {
        $this->info('Checking for alerts...');

        $this->checkDueCheques();
        $this->checkDueInstallments();

        $this->info('Alert check complete.');
        return 0;
    }

    private function checkDueCheques()
    {
        // ابحث عن الشيكات التي تستحق خلال 3 أيام من الآن ولم يتم إنشاء تنبيه لها بعد
        $upcomingCheques = Check::where('status', '!=', 'cleared')
                                 ->whereDate('due_date', '<=', Carbon::now()->addDays(3))
                                 ->whereDoesntHave('alerts') // للتأكد من عدم تكرار التنبيه
                                 ->get();

        foreach ($upcomingCheques as $cheque) {
            Alert::create([
                'title' => 'شيك مستحق قريبًا',
                'message' => "الشيك رقم {$cheque->check_number} بمبلغ {$cheque->amount} يستحق الدفع بتاريخ {$cheque->due_date->format('Y-m-d')}.",
                'type' => 'cheque_due',
                'priority' => 'high',
                'related_id' => $cheque->id,
                'related_type' => Check::class,
                'due_date' => $cheque->due_date,
            ]);
            $this->line("Alert created for cheque #{$cheque->check_number}");
        }
    }

    private function checkDueInstallments()
    {
        // ابحث عن الأقساط المستحقة اليوم ولم يتم إنشاء تنبيه لها
        $dueInstallments = Installment::where('status', 'unpaid')
                                      ->whereDate('due_date', Carbon::today())
                                      ->whereDoesntHave('alerts')
                                      ->get();

        foreach ($dueInstallments as $installment) {
            Alert::create([
                'title' => 'قسط مستحق اليوم',
                'message' => "قسط مستحق بقيمة {$installment->amount} للعميل {$installment->contract->client_name} بتاريخ اليوم.",
                'type' => 'payment_due',
                'priority' => 'medium',
                'related_id' => $installment->id,
                'related_type' => Installment::class,
                'due_date' => $installment->due_date,
            ]);
            $this->line("Alert created for installment ID #{$installment->id}");
        }
    }
}
