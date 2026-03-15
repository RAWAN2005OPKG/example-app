<?php

use App\Models\Project;
use App\Models\Voucher;
use App\Models\Payment;
use App\Models\ProjectTransfer;
use Illuminate\Support\Facades\DB;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Starting project balance synchronization...\n";

DB::transaction(function() {
    $projects = Project::all();

    foreach ($projects as $project) {
        $balance = 0;

        // 1. Sum vouchers (Receipts - Payments)
        $vouchersIn = Voucher::where('project_id', $project->id)->where('type', 'receipt')->sum('amount_ils');
        $vouchersOut = Voucher::where('project_id', $project->id)->where('type', 'payment')->sum('amount_ils');
        $balance += ($vouchersIn - $vouchersOut);

        // 2. Sum payments via contracts
        $paymentsIn = Payment::whereHas('contract', function($q) use ($project) {
            $q->where('project_id', $project->id);
        })->where('type', 'in')->get()->sum(fn($p) => $p->amount * $p->exchange_rate);

        $paymentsOut = Payment::whereHas('contract', function($q) use ($project) {
            $q->where('project_id', $project->id);
        })->where('type', 'out')->get()->sum(fn($p) => $p->amount * $p->exchange_rate);
        
        $balance += ($paymentsIn - $paymentsOut);

        // 3. Sum project transfers
        $transfersTo = ProjectTransfer::where('to_project_id', $project->id)->sum('amount');
        $transfersFrom = ProjectTransfer::where('from_project_id', $project->id)->sum('amount');
        $balance += ($transfersTo - $transfersFrom);

        echo "Project: {$project->name} | Calculated Balance: {$balance}\n";

        $project->update(['balance' => $balance]);
    }
});

echo "Synchronization complete.\n";
