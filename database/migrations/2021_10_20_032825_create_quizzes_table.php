<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quizzes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('webinar_id')->unsigned()->nullable()->index('quizzes_webinar_id_foreign');
			$table->integer('creator_id')->unsigned()->index('quizzes_creator_id_foreign');
			$table->string('title');
			$table->string('webinar_title', 64)->nullable();
			$table->integer('time')->nullable()->default(0);
			$table->integer('attempt')->nullable();
			$table->integer('pass_mark');
			$table->boolean('certificate');
			$table->enum('status', array('active','inactive'));
			$table->integer('total_mark')->unsigned()->nullable();
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
		Schema::drop('quizzes');
	}

}
