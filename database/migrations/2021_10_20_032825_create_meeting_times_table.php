<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingTimesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('meeting_times', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('meeting_id')->unsigned()->index('meeting_times_meeting_id_foreign');
			$table->enum('day_label', array('saturday','sunday','monday','tuesday','wednesday','thursday','friday'));
			$table->string('time', 64);
			$table->integer('created_at');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('meeting_times');
	}

}
