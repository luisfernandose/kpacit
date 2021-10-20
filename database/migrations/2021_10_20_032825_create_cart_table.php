<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cart', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('creator_id')->unsigned()->index('cart_creator_id_foreign');
			$table->integer('webinar_id')->unsigned()->nullable()->index('cart_webinar_id_foreign');
			$table->integer('reserve_meeting_id')->unsigned()->nullable()->index('cart_reserve_meeting_id_foreign');
			$table->integer('subscribe_id')->unsigned()->nullable()->index('cart_subscribe_id_foreign');
			$table->integer('promotion_id')->unsigned()->nullable()->index('cart_promotion_id_foreign');
			$table->integer('ticket_id')->unsigned()->nullable()->index('cart_ticket_id_foreign');
			$table->integer('special_offer_id')->unsigned()->nullable()->index('cart_special_offer_id_foreign');
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
		Schema::drop('cart');
	}

}
