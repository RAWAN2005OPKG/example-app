<?php

use App\Models\Project;
use App\Models\ProjectTransfer;
use App\Models\Expense;
use App\Models\KhaledVoucher;
use App\Models\MohammedVoucher;
use App\Models\WaliVoucher;
use Illuminate\Support\Facades\DB;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

DB::beginTransaction();
try {
    $projects = Project::all();

    echo "Starting Project Balance Reconciliation...\n";
    echo str_repeat("-", 40) . "\n";

    foreach ($projects as $project) {
        $transfersIn = ProjectTransfer::where('to_project_id', $project->id)->sum('amount');
        $transfersOut = ProjectTransfer::where('from_project_id', $project->id)->sum('amount');
        $expenses = Expense::where('project_id', $project->id)->sum('amount_ils');
        
        $khaledIn = KhaledVoucher::where('project_id', $project->id)->where('type', 'receipt')->sum('amount_ils');
        $khaledOut = KhaledVoucher::where('project_id', $project->id)->where('type', 'payment')->sum('amount_ils');
        
        $mohammedIn = MohammedVoucher::where('project_id', $project->id)->where('type', 'receipt')->sum('amount_ils');
        $mohammedOut = MohammedVoucher::where('project_id', $project->id)->where('type', 'payment')->sum('amount_ils');
        
        $waliIn = WaliVoucher::where('project_id', $project->id)->where('type', 'receipt')->sum('amount_ils');
        $waliOut = WaliVoucher::where('project_id', $project->id)->where('type', 'payment')->sum('amount_ils');

        $totalIn = $transfersIn + $khaledIn + $mohammedIn + $waliIn;
        $totalOut = $transfersOut + $expenses + $khaledOut + $mohammedOut + $waliOut;
        
        $newBalance = $totalIn - $totalOut;

        echo "Project: {$project->name} (ID: {$project->id})\n";
        echo "  Old Balance: " . number_format($project->balance, 2) . "\n";
        echo "  New Balance: " . number_format($newBalance, 2) . "\n";

        $project->balance = $newBalance;
        $project->save();
        
        echo "  Status: Updated\n\n";
    }

    DB::commit();
    echo "Reconciliation Completed Successfully!\n";
} catch (\Exception $e) {
    DB::rollBack();
    echo "ERROR: " . $e->getMessage() . "\n";
}
