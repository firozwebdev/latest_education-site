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
        Schema::table('courses', function (Blueprint $table) {
            $table->foreignId('instructor_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('slug')->nullable()->unique();
            $table->decimal('current_price', 10, 2)->nullable();
            $table->decimal('off_price', 10, 2)->nullable();
            $table->unsignedInteger('enrolled')->default(0);
            $table->unsignedInteger('lectures')->default(0);
            $table->decimal('rating', 3, 2)->default(0);
            $table->string('language')->nullable()->default('English');
            $table->boolean('certificate')->default(true);
            $table->unsignedTinyInteger('pass_percentage')->default(0);
            $table->string('preview_video_url')->nullable();
            $table->text('description')->nullable();
            $table->json('syllabus')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropConstrainedForeignId('instructor_id');
            $table->dropColumn([
                'slug','current_price','off_price','enrolled','lectures','rating','language','certificate','pass_percentage','preview_video_url','description','syllabus'
            ]);
        });
    }
};
