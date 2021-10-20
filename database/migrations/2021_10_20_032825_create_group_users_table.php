<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('group_users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('group_id')->unsigned()->index('group_users_group_id_foreign');
			$table->integer('user_id')->unsigned()->index('group_users_user_id_foreign');
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
		Schema::drop('group_users');
	}

}
