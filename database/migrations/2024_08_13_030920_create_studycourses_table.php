<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('studycourses', function (Blueprint $table) {
            $table->id('course_id');
            $table->string('course_name');
            $table->text('descriptions');
            $table->string('course_img')->nullable();
            $table->string('course_vidio')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studycourses');
    }
};