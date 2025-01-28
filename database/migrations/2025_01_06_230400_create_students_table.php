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
        Schema::create('students', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->id();
            $table->string('student_code');
            $table->string('first_name') ;
            $table->string('last_name');
            $table->enum('student_type', ['regular', 'special']);
            $table->string('contact_info')->nullable();
            $table->string('telephone_num')->nullable();
            $table->string('admission_channel')->nullable();
            $table->string('admission_year')->nullable();
            $table->float('semester')->default(3);
            $table->string('completion_year')->nullable();
            $table->enum('student_status', ['active', 'inactive'])->default('active');
            $table->enum('curriculum', ['65', '60'])->default('65');
            $table->string('advisor_first_name')->nullable();
            $table->string('advisor_last_name')->nullable();
            $table->string('workplace')->nullable();
            $table->text('contribution')->nullable();
            $table->string('academic_year')->default(3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
