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
        Schema::create('course_result', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(App\Models\Course::class);
            $table->foreignIdFor(App\Models\Student::class);
            $table->enum('semester',['1','2']);
            $table->integer('academic_year')->nullable()    ;
            $table->enum('course_grade',['A','B+','B','C+','C','D+','D','F']);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_result');
    }
};
