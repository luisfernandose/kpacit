<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseLearningTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('course_learning', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index('course_learning_user_id_foreign');
			$table->integer('text_lesson_id')->unsigned()->nullable()->index('course_learning_text_lesson_id_foreign');
			$table->integer('file_id')->unsigned()->nullable()->index('course_learning_file_id_foreign');
			$table->integer('session_id')->unsigned()->nullable()->index('course_learning_session_id_foreign');
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
		Schema::drop('course_learning');
	}

}
