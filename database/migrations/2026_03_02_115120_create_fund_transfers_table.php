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
        Schema::create('fund_transfers', function (Blueprint $table) {
            $table->id();

            // المبلغ والعملة
            $table->decimal('amount', 15, 2); // 15 رقم إجمالي، 2 بعد الفاصلة
            $table->string('currency', 3);

            // تاريخ التحويل
            $table->date('date');

            // ملاحظات (اختياري)
            $table->text('notes')->nullable();

            // --- العلاقات المتعددة الأشكال (Polymorphic) ---
            // الجهة المُرسِلة (من)
            $table->morphs('fromable'); // يُنشئ عمودين: fromable_id و fromable_type

            // الجهة المستقبِلة (إلى)
            $table->morphs('toable'); // يُنشئ عمودين: toable_id و toable_type

            $table->timestamps();

            // إضافة فهارس لتحسين أداء الاستعلامات
            $table->index(['fromable_id', 'fromable_type']);
            $table->index(['toable_id', 'toable_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fund_transfers');
    }
};
