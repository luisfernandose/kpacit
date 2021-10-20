<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToFaqsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('faqs', function(Blueprint $table)
		{
			$table->foreign('creator_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('webinar_id')->references('id')->on('webinars')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('faqs', function(Blueprint $table)
		{
			$table->dropForeign('faqs_creator_id_foreign');
			$table->dropForeign('faqs_webinar_id_foreign');
		});
	}

}
