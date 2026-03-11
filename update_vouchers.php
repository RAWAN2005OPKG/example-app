<?php

use App\Models\KhaledVoucher;
use App\Models\MohammedVoucher;
use App\Models\WaliVoucher;
use Illuminate\Support\Facades\DB;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Updating Khaled Vouchers...\n";
KhaledVoucher::all()->each(function($v) {
    $v->update(['amount_ils' => $v->currency === 'ILS' ? $v->amount : ($v->amount * ($v->exchange_rate ?? 1))]);
});

echo "Updating Mohammed Vouchers...\n";
MohammedVoucher::all()->each(function($v) {
    $v->update(['amount_ils' => $v->currency === 'ILS' ? $v->amount : ($v->amount * ($v->exchange_rate ?? 1))]);
});

echo "Updating Wali Vouchers...\n";
WaliVoucher::all()->each(function($v) {
    $v->update(['amount_ils' => $v->currency === 'ILS' ? $v->amount : ($v->amount * ($v->exchange_rate ?? 1))]);
});

echo "Done!\n";
