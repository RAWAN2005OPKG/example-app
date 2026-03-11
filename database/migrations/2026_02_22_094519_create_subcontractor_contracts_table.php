<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('subcontractor_contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subcontractor_id')->constrained('subcontractors')->onDelete('cascade');
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');

            $table->date('contract_date');
            $table->decimal('contract_value', 15, 2);
            $table->string('currency', 3);
            $table->decimal('exchange_rate', 10, 4);
            $table->text('contract_details')->nullable();

            $table->timestamps();
            $table->unique(['subcontractor_id', 'project_id', 'contract_date'], 'sub_project_date_unique');
        });
    }
    public function down(): void { Schema::dropIfExists('subcontractor_contracts'); }
};
