<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrerequisitesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prerequisites', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('webinar_id')->unsigned()->index('prerequisites_webinar_id_foreign');
			$table->integer('prerequisite_id')->unsigned();
			$table->boolean('required')->default(0);
			$table->integer('order')->unsigned()->nullable();
			$table->integer('created_at');
			$table->integer('updated_at')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('prerequisites');
	}

}
