<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// في ملف ..._create_cash_transactions_table.php

public function up(): void
{
    Schema::create('cash_transactions', function (Blueprint $table) {
        $table->id();

            $table->string('voucher_id')->unique(); // رقم السند، ويجب أن يكون فريداً

        // الحقول الأساسية من النموذج
        $table->date('transaction_date');
        $table->enum('type', ['in', 'out']);
        $table->string('source');

        // الحقول المالية
        $table->decimal('amount', 15, 2);
        $table->string('currency', 3);
        $table->decimal('exchange_rate', 10, 4);
        $table->decimal('amount_ils', 15, 2);

        // حقول إضافية
        $table->text('details')->nullable();

        $table->timestamps();
        $table->softDeletes();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_transactions');
    }
};
