<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionRemindsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('session_reminds', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('session_id')->unsigned()->index('session_reminds_session_id_foreign');
			$table->integer('user_id')->unsigned()->index('session_reminds_user_id_foreign');
			$table->integer('created_at');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('session_reminds');
	}

}
