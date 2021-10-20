<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subscribes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->integer('usable_count')->unsigned();
			$table->integer('days')->unsigned();
			$table->integer('price')->unsigned();
			$table->string('icon');
			$table->string('description')->nullable();
			$table->boolean('is_popular')->default(0);
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
		Schema::drop('subscribes');
	}

}
