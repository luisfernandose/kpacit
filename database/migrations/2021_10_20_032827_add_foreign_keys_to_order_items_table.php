<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToOrderItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('order_items', function(Blueprint $table)
		{
			$table->foreign('order_id')->references('id')->on('orders')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('promotion_id')->references('id')->on('promotions')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('reserve_meeting_id')->references('id')->on('reserve_meetings')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('subscribe_id')->references('id')->on('subscribes')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('ticket_id')->references('id')->on('tickets')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
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
		Schema::table('order_items', function(Blueprint $table)
		{
			$table->dropForeign('order_items_order_id_foreign');
			$table->dropForeign('order_items_promotion_id_foreign');
			$table->dropForeign('order_items_reserve_meeting_id_foreign');
			$table->dropForeign('order_items_subscribe_id_foreign');
			$table->dropForeign('order_items_ticket_id_foreign');
			$table->dropForeign('order_items_user_id_foreign');
			$table->dropForeign('order_items_webinar_id_foreign');
		});
	}

}
