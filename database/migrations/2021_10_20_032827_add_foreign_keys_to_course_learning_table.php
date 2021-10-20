<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCourseLearningTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('course_learning', function(Blueprint $table)
		{
			$table->foreign('file_id')->references('id')->on('files')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('session_id')->references('id')->on('sessions')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('text_lesson_id')->references('id')->on('text_lessons')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('course_learning', function(Blueprint $table)
		{
			$table->dropForeign('course_learning_file_id_foreign');
			$table->dropForeign('course_learning_session_id_foreign');
			$table->dropForeign('course_learning_text_lesson_id_foreign');
			$table->dropForeign('course_learning_user_id_foreign');
		});
	}

}
