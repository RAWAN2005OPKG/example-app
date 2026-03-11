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
            $table->nullableMorphs('payable');
            $table->string('source_of_funds')->nullable()->after('payment_source');
            $table->string('paid_by')->nullable()->after('source_of_funds');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('expenses', function (Blueprint $table) {
            $table->dropMorphs('payable');
            $table->dropColumn(['source_of_funds', 'paid_by']);
        });
    }
};
