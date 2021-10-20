<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebinarReviewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('webinar_reviews', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('webinar_id')->unsigned()->index('webinar_reviews_webinar_id_foreign');
			$table->integer('creator_id')->unsigned()->index('webinar_reviews_creator_id_foreign');
			$table->integer('content_quality')->unsigned();
			$table->integer('instructor_skills')->unsigned();
			$table->integer('purchase_worth')->unsigned();
			$table->integer('support_quality')->unsigned();
			$table->char('rates', 10);
			$table->text('description')->nullable();
			$table->integer('created_at')->unsigned();
			$table->enum('status', array('pending','active'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('webinar_reviews');
	}

}
