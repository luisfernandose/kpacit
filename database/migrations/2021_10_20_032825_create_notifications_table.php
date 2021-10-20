<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notifications', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->nullable()->index('notifications_user_id_foreign');
			$table->integer('group_id')->unsigned()->nullable()->index('notifications_group_id_foreign');
			$table->string('title');
			$table->text('message');
			$table->enum('sender', array('system','admin'))->nullable()->default('system');
			$table->enum('type', array('single','all_users','students','instructors','organizations','group'));
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
		Schema::drop('notifications');
	}

}
