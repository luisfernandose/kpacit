<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quizzes_questions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('quiz_id')->unsigned()->index('quizzes_questions_quiz_id_foreign');
			$table->integer('creator_id')->unsigned()->index('quizzes_questions_creator_id_foreign');
			$table->string('title');
			$table->string('grade');
			$table->enum('type', array('multiple','descriptive'));
			$table->string('correct', 1000)->nullable();
			$table->integer('created_at');
			$table->integer('updated_at')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('quizzes_questions');
	}

}
