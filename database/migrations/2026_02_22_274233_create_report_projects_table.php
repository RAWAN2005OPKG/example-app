<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('report_projects', function (Blueprint $table) {
            $table->id();

            // هذه هي الحقول التي طلبتها في الموديل
            $table->string('name'); // اسم التقرير
            $table->string('project_title'); // عنوان المشروع
            $table->string('owner_name'); // اسم المالك
            $table->string('owner_phone')->nullable(); // هاتف المالك
            $table->string('owner_id')->nullable(); // هوية المالك
            $table->string('project_status')->default('pending'); // حالة المشروع
            $table->date('start_date')->nullable(); // تاريخ البدء
            $table->decimal('total_budget', 15, 2)->default(0); // الميزانية الإجمالية
            $table->string('currency', 3)->default('USD'); // العملة
            $table->text('description')->nullable(); // الوصف
            $table->json('project_media')->nullable(); // لتخزين مسارات الصور والفيديوهات

            $table->timestamps(); // حقول created_at و updated_at
            $table->softDeletes(); // حقل deleted_at للحذف الناعم
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('report_projects');
    }
};
