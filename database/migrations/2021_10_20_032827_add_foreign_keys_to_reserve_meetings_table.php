<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToReserveMeetingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('reserve_meetings', function(Blueprint $table)
		{
			$table->foreign('meeting_time_id')->references('id')->on('meeting_times')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('sale_id')->references('id')->on('sales')->onUpdate('RESTRICT')->onDelete('CASCADE');
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
		Schema::table('reserve_meetings', function(Blueprint $table)
		{
			$table->dropForeign('reserve_meetings_meeting_time_id_foreign');
			$table->dropForeign('reserve_meetings_sale_id_foreign');
			$table->dropForeign('reserve_meetings_user_id_foreign');
		});
	}

}
