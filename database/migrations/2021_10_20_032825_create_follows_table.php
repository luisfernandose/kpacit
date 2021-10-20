<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('follows', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('follower')->unsigned()->index('follows_follower_foreign');
			$table->integer('user_id')->unsigned()->index('follows_user_id_foreign');
			$table->enum('status', array('requested','accepted','rejected'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('follows');
	}

}
