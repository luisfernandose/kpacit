<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sales', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('seller_id')->unsigned()->nullable()->index('sales_seller_id_foreign');
			$table->integer('buyer_id')->unsigned()->index('sales_buyer_id_foreign');
			$table->integer('order_id')->unsigned()->nullable()->index('sales_order_id_foreign');
			$table->integer('webinar_id')->unsigned()->nullable()->index('sales_webinar_id_foreign');
			$table->integer('meeting_id')->unsigned()->nullable()->index('sales_meeting_id_foreign');
			$table->integer('subscribe_id')->unsigned()->nullable();
			$table->integer('ticket_id')->unsigned()->nullable()->index('sales_ticket_id_foreign');
			$table->integer('promotion_id')->unsigned()->nullable()->index('sales_promotion_id_foreign');
			$table->enum('type', array('webinar','meeting','subscribe','promotion'));
			$table->enum('payment_method', array('credit','payment_channel','subscribe'))->nullable();
			$table->integer('amount')->unsigned();
			$table->decimal('tax', 13)->nullable();
			$table->decimal('commission', 13)->nullable();
			$table->decimal('discount', 13)->nullable();
			$table->decimal('total_amount', 13)->nullable();
			$table->integer('created_at')->unsigned();
			$table->integer('refund_at')->unsigned()->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sales');
	}

}
