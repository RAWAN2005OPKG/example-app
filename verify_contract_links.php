<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Schema;

foreach(['khaled_vouchers', 'mohammed_vouchers', 'wali_vouchers', 'payments'] as $t) {
    echo $t . ': ' . (Schema::hasColumn($t, 'contract_id') ? 'OK' : 'MISSING') . PHP_EOL;
}
