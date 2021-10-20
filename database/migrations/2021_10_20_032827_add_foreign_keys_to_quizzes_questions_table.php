<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToQuizzesQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('quizzes_questions', function(Blueprint $table)
		{
			$table->foreign('creator_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('quiz_id')->references('id')->on('quizzes')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('quizzes_questions', function(Blueprint $table)
		{
			$table->dropForeign('quizzes_questions_creator_id_foreign');
			$table->dropForeign('quizzes_questions_quiz_id_foreign');
		});
	}

}
