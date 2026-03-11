<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('mohammed_vouchers', function (Blueprint $table) {
            $table->id();
            $table->date('voucher_date');
            $table->enum('type', ['receipt', 'payment']);
            $table->string('payment_method');
            $table->text('description');
            $table->decimal('amount', 15, 2);
            $table->string('currency', 3);
            $table->decimal('exchange_rate', 10, 4)->default(1.0000);
            $table->foreignId('project_id')->nullable()->constrained('projects')->onDelete('set null');
            $table->foreignId('client_id')->nullable()->constrained('clients')->onDelete('set null');
            $table->foreignId('investor_id')->nullable()->constrained('investors')->onDelete('set null');
            $table->text('notes')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down(): void { Schema::dropIfExists('mohammed_vouchers'); }
};
