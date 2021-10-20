<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayoutsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payouts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index('payouts_user_id_foreign');
			$table->decimal('amount', 13);
			$table->string('account_name', 64);
			$table->string('account_number', 64);
			$table->string('account_bank_name', 64);
			$table->enum('status', array('waiting','done','reject'));
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
		Schema::drop('payouts');
	}

}
