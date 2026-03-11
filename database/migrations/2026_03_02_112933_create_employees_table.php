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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');
            $table->string('email')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->decimal('salary', 10, 2);
            $table->string('currency', 3);
            $table->string('iban')->nullable();
            $table->string('wallet_name')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_branch')->nullable();
            $table->timestamps();
            $table->softDeletes(); // لإضافة ميزة الحذف الناعم (سلة المهملات)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
