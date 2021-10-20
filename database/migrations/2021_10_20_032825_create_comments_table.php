<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index('comments_user_id_foreign');
			$table->integer('review_id')->unsigned()->nullable()->index('comments_review_id_foreign');
			$table->integer('webinar_id')->unsigned()->nullable()->index('comments_webinar_id_foreign');
			$table->integer('blog_id')->unsigned()->nullable();
			$table->integer('reply_id')->unsigned()->nullable()->index('comments_reply_id_foreign');
			$table->text('comment')->nullable();
			$table->enum('status', array('pending','active'));
			$table->boolean('report')->default(0);
			$table->boolean('disabled')->default(0);
			$table->integer('created_at');
			$table->integer('viewed_at')->unsigned()->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comments');
	}

}
