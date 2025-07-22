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
        Schema::create('tech_regs', function (Blueprint $table) {
            $table->id();
            $table -> foreignId('mining_site_id') -> constrained('mining_sites') -> cascadeOnDelete() -> nullable();
            $table -> foreignId('co_operation_id') -> constrained('co_operations') -> cascadeOnDelete() -> nullable();
            $table -> foreignId('company_id') -> constrained('companies') -> cascadeOnDelete() -> nullable();
            $table -> foreignId('sub_company_id') -> constrained('sub_companies') -> cascadeOnDelete() -> nullable();
            $table->foreignId('tech_category_id')->constrained('tech_categories')->cascadeOnDelete()->nullable();
            $table->foreignId('tech_type_id')->constrained('tech_types')->cascadeOnDelete()->nullable();
            $table -> foreignId('tech_mark_id') -> constrained('tech_marks') -> cascadeOnDelete() -> nullable();
            $table -> foreignId('tech_specs_id') -> constrained('tech_specs') -> cascadeOnDelete() -> nullable();
            $table->string('tech_number')->nullable();
            $table->string('tech_park_number')->nullable();
            $table->string('tech_aral_numebr')->nullable();
            $table -> date('date_of_manufacture');
            $table -> date('date_of_imported');
            $table->json('tech_tewsh')->nullable();
            $table->string('radio_id')->nullable();
            $table->string('radio_serial')->nullable();
            $table->boolean('status')->default(1);
            $table->string('property_file')->nullable();
            $table->json('property')->nullable();
            $table->json('insurance')->nullable();
            $table->json('tech_permission')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tech_regs');
    }
};
