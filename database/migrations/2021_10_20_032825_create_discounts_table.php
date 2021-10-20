<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('discounts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('creator_id')->unsigned()->index('discounts_creator_id_foreign');
			$table->string('title');
			$table->string('code', 64)->unique();
			$table->integer('percent')->unsigned()->nullable();
			$table->integer('amount')->unsigned()->nullable();
			$table->integer('count')->default(1);
			$table->enum('type', array('all_users','special_users'));
			$table->enum('status', array('active','disable'))->default('active');
			$table->integer('expired_at')->unsigned();
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
		Schema::drop('discounts');
	}

}
