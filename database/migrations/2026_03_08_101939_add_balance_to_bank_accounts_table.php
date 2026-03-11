<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bank_accounts', function (Blueprint $table) {
            // هذا هو السطر الذي يضيف العمود الناقص
            // نجعله بعد عمود 'currency' ليكون الترتيب منطقياً
            // ونعطيه قيمة افتراضية 0 ليعمل مع الحسابات القديمة
            $table->decimal('balance', 15, 2)->default(0)->after('currency');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bank_accounts', function (Blueprint $table) {
            // هذا السطر يسمح بالتراجع عن التغيير إذا احتجت لذلك
            $table->dropColumn('balance');
        });
    }
};
