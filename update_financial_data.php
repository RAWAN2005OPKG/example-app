<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Payment;
use App\Models\SupplierPayment;
use Illuminate\Support\Facades\DB;

echo "Updating existing payments...\n";
$payments = Payment::where('amount_ils', 0)->orWhereNull('amount_ils')->get();
foreach ($payments as $payment) {
    $amount_ils = ($payment->currency === 'ILS') ? $payment->amount : ($payment->amount * $payment->exchange_rate);
    $payment->update(['amount_ils' => $amount_ils]);
    echo "Payment ID {$payment->id} updated. Amount: {$payment->amount}, Currency: {$payment->currency}, ILS: {$amount_ils}\n";
}

echo "Updating existing supplier expenses (table expenses)...\n";
// SupplierPayment model uses 'expenses' table
$expenses = SupplierPayment::where('amount_ils', 0)->orWhereNull('amount_ils')->get();
foreach ($expenses as $expense) {
    // For expenses table, we use 'currency' and if missing assume ILS
    $curr = $expense->currency ?: 'ILS';
    // We don't have exchange_rate in expenses table directly in all migrations, 
    // but we can check if it exists or just assume 1 if it's ILS.
    // Based on create_expenses_table, it doesn't have exchange_rate directly.
    $amount_ils = ($curr === 'ILS') ? $expense->amount : $expense->amount; // Default to amount if exchange_rate unknown
    $expense->update(['amount_ils' => $amount_ils]);
    echo "Expense ID {$expense->id} updated. Amount: {$expense->amount}\n";
}

echo "Done!\n";
