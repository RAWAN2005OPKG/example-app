<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id(); // العمود الأساسي (Primary Key)

            // --- الربط بالبنك (العلاقة) ---
            // هذا هو أهم سطر، يربط هذا الجدول بجدول `banks`
            // onDelete('cascade') تعني: إذا تم حذف بنك، سيتم حذف كل حساباته المرتبطة تلقائياً
            $table->foreignId('bank_id')->constrained('banks')->onDelete('cascade');

            // --- تفاصيل الحساب (من النموذج) ---
            $table->string('account_name'); // اسم الحساب للتمييز
            $table->string('account_number')->unique(); // رقم الحساب، يجب أن يكون فريداً
            $table->string('iban')->nullable()->unique(); // رقم الآيبان، اختياري وفريد

            // --- المعلومات المالية ---
            $table->string('currency', 3); // لتخزين العملة (ILS, USD, JOD)
            $table->decimal('current_balance', 15, 2)->default(0); // الرصيد الحالي، بقيمة افتراضية 0

            // --- معلومات إضافية ---
            $table->boolean('is_active')->default(true); // لتفعيل أو تعطيل الحساب
            $table->text('notes')->nullable(); // حقل للملاحظات المستقبلية

            $table->timestamps(); // حقول created_at و updated_at
            $table->softDeletes(); // حقل deleted_at للحذف الناعم
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_accounts');
    }
};

