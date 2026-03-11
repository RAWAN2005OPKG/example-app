<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->morphs('payable'); // (payable_id, payable_type) -> Client, Investor, etc.
            $table->foreignId('contract_id')->nullable()->constrained('contracts')->onDelete('set null');
            $table->enum('type', ['in', 'out']); // in = قبض, out = صرف
            $table->date('payment_date');
            $table->decimal('amount', 15, 2);
            $table->string('currency', 3);
            $table->decimal('exchange_rate', 10, 4)->default(1);
            $table->string('method'); // cash, check, bank_transfer
            $table->text('notes')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null'); // من قام بالتسجيل
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down(): void {
        Schema::dropIfExists('payments');
    }
};
