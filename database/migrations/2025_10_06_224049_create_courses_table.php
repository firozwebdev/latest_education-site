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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('images')->nullable();
            $table->foreignId('university_id')->constrained('universities')->onDelete('cascade');
            $table->string('offer_card_1');
            $table->string('offer_card_2');
            $table->string('city');
            $table->string('qs_ranking');
            $table->string('course_name');
            $table->string('progress_to');
            $table->string('student_level');
            $table->string('next_intake');
            $table->string('entry_score');
            $table->string('tuition_fees');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
