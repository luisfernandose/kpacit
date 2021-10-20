<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebinarFilterOptionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('webinar_filter_option', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('webinar_id')->unsigned()->index('webinar_filter_option_webinar_id_foreign');
			$table->integer('filter_option_id')->unsigned()->index('webinar_filter_option_filter_option_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('webinar_filter_option');
	}

}
