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
            $table->foreignId('contract_id')->nullable()->after('investor_id')->constrained('contracts')->onDelete('set null');
        });

        Schema::table('mohammed_vouchers', function (Blueprint $table) {
            $table->foreignId('contract_id')->nullable()->after('investor_id')->constrained('contracts')->onDelete('set null');
        });

        Schema::table('wali_vouchers', function (Blueprint $table) {
            $table->foreignId('contract_id')->nullable()->after('investor_id')->constrained('contracts')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('khaled_vouchers', function (Blueprint $table) {
            $table->dropForeign(['contract_id']);
            $table->dropColumn('contract_id');
        });

        Schema::table('mohammed_vouchers', function (Blueprint $table) {
            $table->dropForeign(['contract_id']);
            $table->dropColumn('contract_id');
        });

        Schema::table('wali_vouchers', function (Blueprint $table) {
            $table->dropForeign(['contract_id']);
            $table->dropColumn('contract_id');
        });
    }
};
