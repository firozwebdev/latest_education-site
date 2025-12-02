<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->string('study_level')->nullable()->after('student_level');
            $table->string('duration')->nullable()->after('study_level');
            $table->string('course_type')->nullable()->after('duration'); // online, offline, hybrid
        });
    }

    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn(['study_level', 'duration', 'course_type']);
        });
    }
};