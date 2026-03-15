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
        Schema::table('project_units', function (Blueprint $table) {
            if (!Schema::hasColumn('project_units', 'price_usd')) {
                $table->decimal('price_usd', 15, 2)->nullable()->after('finish_type');
            }
            if (!Schema::hasColumn('project_units', 'price_ils')) {
                $table->decimal('price_ils', 15, 2)->nullable()->after('price_usd');
            }
            
            // Fix column names if they are different from what's expected in the controller/model
            if (Schema::hasColumn('project_units', 'floor') && !Schema::hasColumn('project_units', 'floor_number')) {
                // Keep 'floor' as it matches the migration I saw earlier
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_units', function (Blueprint $table) {
            $table->dropColumn(['price_usd', 'price_ils']);
        });
    }
};
