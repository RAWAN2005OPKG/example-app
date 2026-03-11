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
        Schema::table('khaled_vouchers', function (Blueprint $table) {
            $table->decimal('amount_ils', 15, 2)->after('amount')->default(0);
        });
        Schema::table('mohammed_vouchers', function (Blueprint $table) {
            $table->decimal('amount_ils', 15, 2)->after('amount')->default(0);
        });
        Schema::table('wali_vouchers', function (Blueprint $table) {
            $table->decimal('amount_ils', 15, 2)->after('amount')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('khaled_vouchers', function (Blueprint $table) {
            $table->dropColumn('amount_ils');
        });
        Schema::table('mohammed_vouchers', function (Blueprint $table) {
            $table->dropColumn('amount_ils');
        });
        Schema::table('wali_vouchers', function (Blueprint $table) {
            $table->dropColumn('amount_ils');
        });
    }
};
