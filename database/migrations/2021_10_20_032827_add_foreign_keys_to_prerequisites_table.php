<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPrerequisitesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('prerequisites', function(Blueprint $table)
		{
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
		Schema::table('prerequisites', function(Blueprint $table)
		{
			$table->dropForeign('prerequisites_webinar_id_foreign');
		});
	}

}
