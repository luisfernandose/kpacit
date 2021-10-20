<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ticket_users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ticket_id')->unsigned()->index('ticket_users_ticket_id_foreign');
			$table->integer('user_id')->unsigned()->index('ticket_users_user_id_foreign');
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
		Schema::drop('ticket_users');
	}

}
