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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location')->nullable();
            $table->text('description')->nullable();
            $table->date('start_date');
            $table->date('estimated_end_date')->nullable();

            $table->decimal('estimated_cost_usd', 15, 2)->nullable();
            $table->decimal('estimated_cost_ils', 15, 2)->nullable();
            $table->decimal('exchange_rate', 8, 4)->nullable();

            $table->string('main_contractor')->nullable();
            $table->string('architect')->nullable();
            $table->integer('duration_months')->nullable();
            $table->string('status')->default('planning');
            $table->text('notes')->nullable();
            $table->json('attachments')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
