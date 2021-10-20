<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('supports', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index('supports_user_id_foreign');
			$table->integer('webinar_id')->unsigned()->nullable()->index('supports_webinar_id_foreign');
			$table->integer('department_id')->unsigned()->nullable()->index('supports_department_id_foreign');
			$table->string('title');
			$table->enum('status', array('open','close','replied','supporter_replied'))->default('open');
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
		Schema::drop('supports');
	}

}
