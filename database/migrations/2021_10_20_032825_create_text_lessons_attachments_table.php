<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextLessonsAttachmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('text_lessons_attachments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('text_lesson_id')->unsigned()->index('text_lessons_attachments_text_lesson_id_foreign');
			$table->integer('file_id')->unsigned()->index('text_lessons_attachments_file_id_foreign');
			$table->integer('created_at')->unsigned();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('text_lessons_attachments');
	}

}
