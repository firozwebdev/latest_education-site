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
        Schema::create('universities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained('countries')->onDelete('cascade');
            $table->string('university_name');
            $table->string('student_level');
            $table->string('duration');
            $table->string('next_intake');
            $table->decimal('tuition_fees', 10, 2);
            $table->string('scholarship');
            $table->string('ielts_score');
            $table->string('website_url');
            $table->text('description');
            $table->integer('global_rank');
            $table->integer('in_country_rank');
            $table->string('location');
            $table->string('logo')->nullable();
            $table->json('images')->nullable();
            $table->text('university_wise_course');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universities');
    }
};
