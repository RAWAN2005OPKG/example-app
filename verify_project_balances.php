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

$projects = Project::all();

echo str_pad("Project ID", 12) . str_pad("Current Balance", 20) . str_pad("Expected Balance", 20) . str_pad("Difference", 15) . "\n";
echo str_repeat("-", 70) . "\n";

foreach ($projects as $project) {
    // 1. تحويلات المشاريع
    $transfersIn = ProjectTransfer::where('to_project_id', $project->id)->sum('amount');
    $transfersOut = ProjectTransfer::where('from_project_id', $project->id)->sum('amount');
    
    // 2. المصاريف
    $expenses = Expense::where('project_id', $project->id)->sum('amount_ils');
    
    // 3. السندات (إيرادات ومصروفات)
    $khaledIn = KhaledVoucher::where('project_id', $project->id)->where('type', 'receipt')->sum('amount_ils');
    $khaledOut = KhaledVoucher::where('project_id', $project->id)->where('type', 'payment')->sum('amount_ils');
    
    $mohammedIn = MohammedVoucher::where('project_id', $project->id)->where('type', 'receipt')->sum('amount_ils');
    $mohammedOut = MohammedVoucher::where('project_id', $project->id)->where('type', 'payment')->sum('amount_ils');
    
    $waliIn = WaliVoucher::where('project_id', $project->id)->where('type', 'receipt')->sum('amount_ils');
    $waliOut = WaliVoucher::where('project_id', $project->id)->where('type', 'payment')->sum('amount_ils');

    $totalRevenues = $khaledIn + $mohammedIn + $waliIn;
    $totalExpenses = $expenses + $khaledOut + $mohammedOut + $waliOut;

    $expectedBalance = $transfersIn - $transfersOut + $totalRevenues - $totalExpenses;
    $diff = $project->balance - $expectedBalance;

    echo str_pad($project->id, 12) . 
         str_pad(number_format($project->balance, 2), 20) . 
         str_pad(number_format($expectedBalance, 2), 20) . 
         str_pad(number_format($diff, 2), 15) . "\n";
}
