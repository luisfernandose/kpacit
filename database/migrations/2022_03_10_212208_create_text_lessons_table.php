<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text_lessons', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('creator_id')->index('text_lessons_creator_id_foreign');
            $table->unsignedInteger('webinar_id')->index('text_lessons_webinar_id_foreign');
            $table->string('title');
            $table->string('image')->nullable();
            $table->unsignedInteger('study_time')->nullable();
            $table->text('summary');
            $table->longText('content');
            $table->enum('accessibility', ['free', 'paid'])->default('free');
            $table->unsignedInteger('order')->nullable();
            $table->unsignedInteger('created_at');
            $table->unsignedInteger('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('text_lessons');
    }
}
