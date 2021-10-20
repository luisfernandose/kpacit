<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index('orders_user_id_foreign');
			$table->enum('status', array('pending','paying','paid','fail'));
			$table->enum('payment_method', array('credit','payment_channel'))->nullable();
			$table->boolean('is_charge_account')->default(0);
			$table->integer('amount')->unsigned();
			$table->decimal('tax', 13)->nullable();
			$table->decimal('total_discount', 13)->nullable();
			$table->decimal('total_amount', 13)->nullable();
			$table->text('reference_id')->nullable();
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
		Schema::drop('orders');
	}

}
