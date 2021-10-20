<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index('order_items_user_id_foreign');
			$table->integer('order_id')->unsigned()->index('order_items_order_id_foreign');
			$table->integer('webinar_id')->unsigned()->nullable()->index('order_items_webinar_id_foreign');
			$table->integer('subscribe_id')->unsigned()->nullable()->index('order_items_subscribe_id_foreign');
			$table->integer('promotion_id')->unsigned()->nullable()->index('order_items_promotion_id_foreign');
			$table->integer('reserve_meeting_id')->unsigned()->nullable()->index('order_items_reserve_meeting_id_foreign');
			$table->integer('ticket_id')->unsigned()->nullable()->index('order_items_ticket_id_foreign');
			$table->integer('discount_id')->nullable();
			$table->integer('amount')->unsigned()->nullable();
			$table->integer('tax')->unsigned()->nullable();
			$table->decimal('tax_price', 13)->nullable();
			$table->integer('commission')->unsigned()->nullable();
			$table->decimal('commission_price', 13)->nullable();
			$table->decimal('discount', 13)->nullable();
			$table->decimal('total_amount', 13)->nullable();
			$table->integer('created_at')->unsigned()->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_items');
	}

}
