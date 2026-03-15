<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('project_transfers', function (Blueprint $table) {
            $table->string('from_entity_type')->nullable()->after('from_project_id'); // Client, Supplier, Safe, ProjectBalance
            $table->unsignedBigInteger('from_entity_id')->nullable()->after('from_entity_type');
            $table->string('to_entity_type')->nullable()->after('to_project_id');
            $table->unsignedBigInteger('to_entity_id')->nullable()->after('to_entity_type');
            $table->string('voucher_type')->nullable()->after('to_entity_id');
            $table->unsignedBigInteger('voucher_id')->nullable()->after('voucher_type');
            
            // Allow from_project_id and to_project_id to be nullable for non-project transfers
            $table->unsignedBigInteger('from_project_id')->nullable()->change();
            $table->unsignedBigInteger('to_project_id')->nullable()->change();
        });
    }

    public function down(): void {
        Schema::table('project_transfers', function (Blueprint $table) {
            $table->dropColumn([
                'from_entity_type', 
                'from_entity_id', 
                'to_entity_type', 
                'to_entity_id', 
                'voucher_type', 
                'voucher_id'
            ]);
            $table->unsignedBigInteger('from_project_id')->nullable(false)->change();
            $table->unsignedBigInteger('to_project_id')->nullable(false)->change();
        });
    }
};
