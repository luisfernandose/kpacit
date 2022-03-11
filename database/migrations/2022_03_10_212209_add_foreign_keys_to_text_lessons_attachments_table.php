<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTextLessonsAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('text_lessons_attachments', function (Blueprint $table) {
            $table->foreign(['file_id'])->references(['id'])->on('files')->onDelete('CASCADE');
            $table->foreign(['text_lesson_id'])->references(['id'])->on('text_lessons')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('text_lessons_attachments', function (Blueprint $table) {
            $table->dropForeign('text_lessons_attachments_file_id_foreign');
            $table->dropForeign('text_lessons_attachments_text_lesson_id_foreign');
        });
    }
}
