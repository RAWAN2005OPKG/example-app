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
        Schema::create('bank_transactions', function (Blueprint $table) {
            $table->id();

            // --- الربط الأساسي بالحساب البنكي ---
            // هذا الحقل سيُستخدم في حركات الإيداع والسحب
            // جعلناه nullable لأنه في حالة الحوالة، قد نعتمد على from/to بدلاً منه
            $table->foreignId('bank_account_id')->nullable()->constrained('bank_accounts')->onDelete('cascade');

            // --- تفاصيل الحركة الأساسية (موجودة دائماً) ---
            $table->date('transaction_date');
            $table->string('type'); // deposit, withdrawal, transfer
            $table->decimal('amount', 15, 2);
            $table->string('currency', 3);

            // --- حقول خاصة بالحوالات (Transfer) ---
            // هذان الحقلان يتم ملؤهما فقط عندما يكون النوع 'transfer'
            $table->foreignId('from_account_id')->nullable()->constrained('bank_accounts')->onDelete('set null');
            $table->foreignId('to_account_id')->nullable()->constrained('bank_accounts')->onDelete('set null');

            // --- حقول إضافية للوصف والتفاصيل ---
            $table->text('details')->nullable(); // الوصف العام للحركة
            $table->text('notes')->nullable();   // ملاحظات داخلية

            // --- حقول لتتبع العلاقات والحالة ---
            // لربط حركة السحب بحركة الإيداع في الحوالة
            $table->foreignId('related_transaction_id')->nullable()->constrained('bank_transactions')->onDelete('set null');
            $table->string('status')->default('completed'); // completed, pending, cancelled

            $table->timestamps();
            $table->softDeletes(); // لإضافة ميزة الحذف الناعم
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_transactions');
    }
};
