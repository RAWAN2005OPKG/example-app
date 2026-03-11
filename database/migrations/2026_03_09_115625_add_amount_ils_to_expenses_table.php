<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::table('expenses', function (Blueprint $table) {
        // إضافة العمود الجديد بعد عمود 'amount' لترتيب أفضل
        $table->decimal('amount_ils', 15, 2)->after('amount')->default(0);
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('expenses', function (Blueprint $table) {
        $table->dropColumn('amount_ils');
    });
}

};
