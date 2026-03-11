<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('khaled_vouchers', function (Blueprint $table) {
            $table->id();

            // 1. Basic Information
            $table->date('voucher_date');
            $table->enum('type', ['receipt', 'payment']); // سند قبض أو صرف
            $table->string('payment_method'); // cash, bank_transfer, check
            $table->text('description');

            // 2. Amount Details
            $table->decimal('amount', 15, 2);
            $table->string('currency', 3);
            $table->decimal('exchange_rate', 10, 4)->default(1.0000);

            // 3. Optional Links
            $table->foreignId('project_id')->nullable()->constrained('projects')->onDelete('set null');
            $table->foreignId('client_id')->nullable()->constrained('clients')->onDelete('set null');
            $table->foreignId('investor_id')->nullable()->constrained('investors')->onDelete('set null');

            // 4. Additional Notes & User
            $table->text('notes')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');

            $table->timestamps();
            $table->softDeletes(); // For trash functionality
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('khaled_vouchers');
    }
};
