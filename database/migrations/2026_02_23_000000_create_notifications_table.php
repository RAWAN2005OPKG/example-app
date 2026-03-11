<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary(); // يستخدم UUID كمعرف فريد
            $table->string('type');
            $table->morphs('notifiable'); // علاقة متعددة لربط الإشعار بالمستخدم أو أي موديل آخر
            $table->text('data'); // لتخزين بيانات الإشعار (مثل: اسم المستخدم الذي قام بالإجراء)
            $table->timestamp('read_at')->nullable(); // لتحديد ما إذا كان الإشعار قد قُرئ أم لا
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
