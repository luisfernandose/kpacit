<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseLearningTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_learning', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index('course_learning_user_id_foreign');
            $table->unsignedInteger('text_lesson_id')->nullable()->index('course_learning_text_lesson_id_foreign');
            $table->unsignedInteger('file_id')->nullable()->index('course_learning_file_id_foreign');
            $table->unsignedInteger('session_id')->nullable()->index('course_learning_session_id_foreign');
            $table->unsignedInteger('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_learning');
    }
}
