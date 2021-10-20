<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilterOptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('filter_options', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 64);
			$table->integer('filter_id')->unsigned()->index('filter_options_filter_id_foreign');
			$table->integer('order')->unsigned()->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('filter_options');
	}

}
