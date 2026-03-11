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
        Schema::create('project_units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
            $table->string('unit_number');
            $table->string('unit_type')->default('apartment');

            $table->string('floor')->nullable(); // رقم الطابق
            $table->boolean('has_parking')->default(false); // هل يوجد موقف سيارة؟
            $table->enum('finish_type', ['finished', 'unfinished'])->default('unfinished'); // نوع التشطيب

            $table->decimal('area', 8, 2)->nullable();
    $table->enum('status', ['available', 'sold', 'reserved'])->default('available');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_units');
    }
};
