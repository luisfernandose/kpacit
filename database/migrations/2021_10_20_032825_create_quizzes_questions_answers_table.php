<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesQuestionsAnswersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quizzes_questions_answers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('creator_id')->unsigned()->index('quizzes_questions_answers_creator_id_foreign');
			$table->integer('question_id')->unsigned()->index('quizzes_questions_answers_question_id_foreign');
			$table->string('title')->nullable();
			$table->string('image')->nullable();
			$table->boolean('correct')->default(0);
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
		Schema::drop('quizzes_questions_answers');
	}

}
