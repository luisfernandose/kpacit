<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToQuizzesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('quizzes', function(Blueprint $table)
		{
			$table->foreign('creator_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('webinar_id')->references('id')->on('webinars')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('quizzes', function(Blueprint $table)
		{
			$table->dropForeign('quizzes_creator_id_foreign');
			$table->dropForeign('quizzes_webinar_id_foreign');
		});
	}

}