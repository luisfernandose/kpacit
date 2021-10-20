<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSalesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sales', function(Blueprint $table)
		{
			$table->foreign('buyer_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('meeting_id')->references('id')->on('meetings')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('order_id')->references('id')->on('orders')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('promotion_id')->references('id')->on('promotions')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('seller_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('ticket_id')->references('id')->on('tickets')->onUpdate('RESTRICT')->onDelete('CASCADE');
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
		Schema::table('sales', function(Blueprint $table)
		{
			$table->dropForeign('sales_buyer_id_foreign');
			$table->dropForeign('sales_meeting_id_foreign');
			$table->dropForeign('sales_order_id_foreign');
			$table->dropForeign('sales_promotion_id_foreign');
			$table->dropForeign('sales_seller_id_foreign');
			$table->dropForeign('sales_ticket_id_foreign');
			$table->dropForeign('sales_webinar_id_foreign');
		});
	}

}
