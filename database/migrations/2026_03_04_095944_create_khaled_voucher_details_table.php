<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('khaled_voucher_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('khaled_voucher_id')->constrained('khaled_vouchers')->onDelete('cascade');
            $table->foreignId('cash_id')->nullable()->constrained('cash_transactions')->onDelete('set null');
            $table->string('handler_name')->nullable();
            $table->string('handler_role')->nullable();
            $table->foreignId('from_bank_account_id')->nullable()->constrained('bank_accounts')->onDelete('set null');
            $table->foreignId('to_bank_account_id')->nullable()->constrained('bank_accounts')->onDelete('set null');
            $table->string('check_number')->nullable();
            $table->string('check_owner_name')->nullable();
            $table->string('check_bank_name')->nullable();
            $table->date('check_due_date')->nullable();
            $table->foreignId('check_id')->nullable()->constrained('checks')->onDelete('set null');
        });
    }
    public function down(): void { Schema::dropIfExists('khaled_voucher_details'); }
};
