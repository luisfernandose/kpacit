<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSessionRemindsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('session_reminds', function(Blueprint $table)
		{
			$table->foreign('session_id')->references('id')->on('sessions')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('session_reminds', function(Blueprint $table)
		{
			$table->dropForeign('session_reminds_session_id_foreign');
			$table->dropForeign('session_reminds_user_id_foreign');
		});
	}

}
