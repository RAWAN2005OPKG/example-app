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
        Schema::create('checks', function (Blueprint $table) {
            $table->id();

            // معلومات الشيك الأساسية
            $table->string('check_number');
            $table->string('bank_name');
            $table->date('issue_date'); // تاريخ التحرير
            $table->date('due_date');   // تاريخ الاستحقاق

            // نوع الشيك والطرف الآخر
            $table->enum('type', ['receivable', 'payable']); // receivable: قبض, payable: دفع
            $table->string('party_name'); // اسم العميل أو المورد
            $table->string('party_phone')->nullable();

            // المعلومات المالية
            $table->decimal('amount', 15, 2);
            $table->string('currency', 3);
            $table->decimal('exchange_rate', 10, 4)->default(1);
            $table->decimal('amount_ils', 15, 2); // القيمة المحسوبة بالشيكل

            // حالة الشيك (مهم جداً لتتبع دورة حياة الشيك)
            $table->enum('status', [
                'in_wallet',        // في المحفظة (لشيكات القبض)
                'under_collection', // تحت التحصيل (تم إيداعه في البنك)
                'cashed',           // تم صرفه
                'returned',         // مرتجع
                'cancelled',        // ملغي
                'pending_payment',  // بانتظار الدفع (لشيكات الدفع)
            ])->default('in_wallet');

            // حقول الربط (Foreign Keys)
            $table->foreignId('deposit_bank_account_id')->nullable()->constrained('bank_accounts')->onDelete('set null');
            $table->foreignId('payment_bank_account_id')->nullable()->constrained('bank_accounts')->onDelete('set null');
            $table->foreignId('project_id')->nullable()->constrained('projects')->onDelete('set null');
            $table->foreignId('project_unit_id')->nullable()->constrained('project_units')->onDelete('set null');

            // حقول إضافية
            $table->text('notes')->nullable();

            $table->timestamps();
            $table->softDeletes(); // لإضافة ميزة الحذف الناعم

            // إضافة فهرس (index) لتحسين أداء البحث
            $table->index('check_number');
            $table->index('due_date');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checks');
    }
};
