<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->unique();

            // --- العلاقة المتعددة الأشكال (هذا هو الجزء الصحيح) ---
            $table->unsignedBigInteger('contractable_id');
            $table->string('contractable_type');

            // --- باقي تفاصيل العقد ---
            $table->foreignId('project_id')->nullable()->constrained('projects')->onDelete('set null');
            $table->date('contract_date');
            $table->text('contract_details')->nullable();

            // --- المعلومات المالية ---
            $table->decimal('contract_value', 15, 2);
            $table->string('currency', 3);
            $table->decimal('exchange_rate', 10, 4)->default(1);
            $table->decimal('total_amount_ils', 15, 2);

            $table->string('attachment')->nullable();
            $table->enum('status', ['active', 'completed', 'cancelled'])->default('active');

            $table->timestamps();
            $table->softDeletes();

            // إضافة فهرس لتحسين أداء الاستعلامات
            $table->index(['contractable_id', 'contractable_type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
