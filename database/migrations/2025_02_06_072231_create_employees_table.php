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
            $table->string('fname');
            $table->string('lname');
            $table->string('register')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->date('date_of_employement');
            $table->date('date_of_expiration');
            $table->string('photo')->nullable();
            $table->foreignId('company_id')->constrained('companies')->cascadeOnDelete()->nullable();
            $table->foreignId('appointment_id')->constrained('appointments')->cascadeOnDelete()->nullable();
            $table->foreignId('co_operation_id')->constrained('co_operations')->cascadeOnDelete()->nullable();
            $table->foreignId('mining_site_id')->constrained('mining_sites')->cascadeOnDelete()->nullable();
            $table->foreignId('sub_company_id')->constrained('sub_companies')->cascadeOnDelete()->nullable();
            $table->foreignId('shift_id')->constrained('shifts')->cascadeOnDelete()->nullable();
            $table->foreignId('region_id')->constrained('regions')->cascadeOnDelete()->nullable();
            $table->foreignId('point_id')->constrained('points')->cascadeOnDelete()->nullable();
//            $table->foreignId('team_id')->constrained('teams')->cascadeOnDelete()->nullable();
            $table->string('card_number')->unique()->nullable(false);
            $table->string('employee_uid')->unique()->nullable(false);
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_trained')->default(true);
            $table->timestamps();
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
