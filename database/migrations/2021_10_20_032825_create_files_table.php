<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('files', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('creator_id')->unsigned()->index('files_creator_id_foreign');
			$table->integer('webinar_id')->unsigned()->index('files_webinar_id_foreign');
			$table->string('title', 64);
			$table->enum('accessibility', array('free','paid'));
			$table->boolean('downloadable')->nullable()->default(0);
			$table->enum('storage', array('local','online'));
			$table->string('file');
			$table->string('volume', 64);
			$table->string('file_type', 64);
			$table->string('description', 1000)->nullable();
			$table->integer('order')->unsigned()->nullable();
			$table->integer('created_at');
			$table->integer('updated_at')->nullable();
			$table->integer('deleted_at')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('files');
	}

}
