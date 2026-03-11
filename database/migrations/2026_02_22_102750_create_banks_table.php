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
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // اسم البنك يجب أن يكون فريداً
            $table->boolean('is_active')->default(true); // لتعطيل أو تفعيل البنك
            $table->timestamps();
            $table->softDeletes(); // لإمكانية الحذف الناعم
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banks');
    }
};
