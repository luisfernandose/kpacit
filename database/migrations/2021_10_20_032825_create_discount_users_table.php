<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('discount_users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('discount_id')->unsigned()->index('discount_users_discount_id_foreign');
			$table->integer('user_id')->unsigned()->index('discount_users_user_id_foreign');
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
		Schema::drop('discount_users');
	}

}
