<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextLessonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('text_lessons', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('creator_id')->unsigned()->index('text_lessons_creator_id_foreign');
			$table->integer('webinar_id')->unsigned()->index('text_lessons_webinar_id_foreign');
			$table->string('title');
			$table->string('image')->nullable();
			$table->integer('study_time')->unsigned()->nullable();
			$table->text('summary');
			$table->text('content');
			$table->enum('accessibility', array('free','paid'))->default('free');
			$table->integer('order')->unsigned()->nullable();
			$table->integer('created_at')->unsigned();
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
		Schema::drop('text_lessons');
	}

}
