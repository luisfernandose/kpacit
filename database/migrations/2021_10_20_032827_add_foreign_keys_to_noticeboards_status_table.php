<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToNoticeboardsStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('noticeboards_status', function(Blueprint $table)
		{
			$table->foreign('noticeboard_id')->references('id')->on('noticeboards')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('noticeboards_status', function(Blueprint $table)
		{
			$table->dropForeign('noticeboards_status_noticeboard_id_foreign');
		});
	}

}
