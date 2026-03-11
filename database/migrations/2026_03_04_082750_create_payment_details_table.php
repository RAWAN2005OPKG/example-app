<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('payment_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_id')->constrained('payments')->onDelete('cascade');

            // Cash Details
            $table->string('delivered_by')->nullable();
            $table->string('received_by')->nullable();

            // Check Details
            $table->string('check_number')->nullable();
            $table->date('due_date')->nullable();
            $table->string('check_owner')->nullable();

            // Bank Transfer Details
            $table->foreignId('sender_bank_account_id')->nullable()->constrained('bank_accounts')->onDelete('set null');
            $table->foreignId('receiver_bank_account_id')->nullable()->constrained('bank_accounts')->onDelete('set null');
            $table->string('transaction_reference')->nullable();

            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('payment_details');
    }
};
