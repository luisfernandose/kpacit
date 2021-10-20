<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribeUsesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subscribe_uses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index('subscribe_uses_user_id_foreign');
			$table->integer('subscribe_id')->unsigned()->index('subscribe_uses_subscribe_id_foreign');
			$table->integer('webinar_id')->unsigned()->index('subscribe_uses_webinar_id_foreign');
			$table->integer('sale_id')->unsigned()->index('subscribe_uses_sale_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('subscribe_uses');
	}

}
