<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('comments', function(Blueprint $table)
		{
			$table->foreign('reply_id')->references('id')->on('comments')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('review_id')->references('id')->on('webinar_reviews')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
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
		Schema::table('comments', function(Blueprint $table)
		{
			$table->dropForeign('comments_reply_id_foreign');
			$table->dropForeign('comments_review_id_foreign');
			$table->dropForeign('comments_user_id_foreign');
			$table->dropForeign('comments_webinar_id_foreign');
		});
	}

}
