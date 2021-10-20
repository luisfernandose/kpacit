<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMeetingTimesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('meeting_times', function(Blueprint $table)
		{
			$table->foreign('meeting_id')->references('id')->on('meetings')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('meeting_times', function(Blueprint $table)
		{
			$table->dropForeign('meeting_times_meeting_id_foreign');
		});
	}

}
