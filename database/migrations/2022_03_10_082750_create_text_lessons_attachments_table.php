<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextLessonsAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text_lessons_attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('text_lesson_id')->index('text_lessons_attachments_text_lesson_id_foreign');
            $table->unsignedInteger('file_id')->index('text_lessons_attachments_file_id_foreign');
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
        Schema::dropIfExists('text_lessons_attachments');
    }
}
