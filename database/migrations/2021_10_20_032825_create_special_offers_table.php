<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialOffersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('special_offers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('creator_id')->unsigned()->index('special_offers_creator_id_foreign');
			$table->integer('webinar_id')->unsigned()->index('special_offers_webinar_id_foreign');
			$table->string('name', 64)->nullable();
			$table->integer('percent')->unsigned();
			$table->enum('status', array('active','inactive'));
			$table->integer('created_at')->unsigned();
			$table->integer('from_date')->unsigned();
			$table->integer('to_date')->unsigned();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('special_offers');
	}

}
