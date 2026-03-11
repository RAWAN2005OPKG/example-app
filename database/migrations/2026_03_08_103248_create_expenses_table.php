<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            // الحقول الأساسية
            $table->date('date');
            $table->foreignId('project_id')->nullable()->constrained('projects')->onDelete('set null');
            $table->decimal('amount', 15, 2);
            $table->string('currency', 10);
            $table->string('payment_method');
            $table->string('payment_source'); // 'خزينة' أو 'بنك'
            $table->text('details')->nullable();
            $table->text('notes')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');

            // حقول المستفيد
            $table->string('payee');
            $table->string('phone')->nullable();
            $table->string('job')->nullable();
            $table->string('id_number')->nullable();

            // حقول الوصل والتكلفة
            $table->string('receipt_name')->nullable();
            $table->decimal('receipt_value_shekel', 15, 2)->nullable();
            $table->decimal('cost_value_dollar', 15, 2)->nullable();

            // حقول الشركاء
            $table->decimal('walid_share_amount', 15, 2)->nullable();
            $table->decimal('mohammad_khalid_share_amount', 15, 2)->nullable();
            $table->decimal('walid_paid_dollar', 15, 2)->nullable();
            $table->decimal('mohammad_khalid_paid_dollar', 15, 2)->nullable();
            $table->decimal('walid_paid_shekel', 15, 2)->nullable();
            $table->decimal('mohammad_khalid_paid_shekel', 15, 2)->nullable();
            $table->decimal('remaining_amount', 15, 2)->nullable();
            $table->decimal('remaining_amount_dollar', 15, 2)->nullable();
            $table->decimal('difference_in_payments', 15, 2)->nullable();
            $table->decimal('total_paid_amount', 15, 2)->nullable();

            // تفاصيل الدفع (JSON لتخزين كل شيء)
            $table->json('payment_details')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down() {
        Schema::dropIfExists('expenses');
    }
};
