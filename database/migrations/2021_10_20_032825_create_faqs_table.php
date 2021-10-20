<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('faqs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('creator_id')->unsigned()->index('faqs_creator_id_foreign');
			$table->integer('webinar_id')->unsigned()->index('faqs_webinar_id_foreign');
			$table->string('title', 64);
			$table->text('answer');
			$table->integer('order')->unsigned()->nullable();
			$table->integer('created_at')->unsigned()->nullable();
			$table->integer('updated_at')->unsigned()->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('faqs');
	}

}
