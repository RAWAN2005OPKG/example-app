<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

echo "Starting optimized project balance synchronization...\n";

try {
    $projectIds = DB::table('projects')->whereNull('deleted_at')->pluck('id');

    foreach ($projectIds as $id) {
        $balance = 0;

        // 1. Sum vouchers
        $vouchersIn = DB::table('vouchers')->where('project_id', $id)->where('type', 'receipt')->whereNull('deleted_at')->sum('amount_ils');
        $vouchersOut = DB::table('vouchers')->where('project_id', $id)->where('type', 'payment')->whereNull('deleted_at')->sum('amount_ils');
        $balance += ($vouchersIn - $vouchersOut);

        // 2. Sum payments via contracts
        $payments = DB::table('payments')
            ->join('contracts', 'payments.contract_id', '=', 'contracts.id')
            ->where('contracts.project_id', $id)
            ->whereNull('payments.deleted_at')
            ->select('payments.type', 'payments.amount', 'payments.exchange_rate')
            ->get();

        foreach ($payments as $p) {
            $paymentIls = (float)$p->amount * (float)$p->exchange_rate;
            $balance += ($p->type == 'in') ? $paymentIls : -$paymentIls;
        }

        // 3. Sum project transfers
        $transfersTo = DB::table('project_transfers')->where('to_project_id', $id)->sum('amount');
        $transfersFrom = DB::table('project_transfers')->where('from_project_id', $id)->sum('amount');
        $balance += ($transfersTo - $transfersFrom);

        DB::table('projects')->where('id', $id)->update(['balance' => (float)$balance]);
        
        echo "Project ID: {$id} | Balance: {$balance}\n";
    }
    echo "Synchronization complete.\n";
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
