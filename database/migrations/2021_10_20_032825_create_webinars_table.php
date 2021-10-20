<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebinarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('webinars', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('teacher_id')->unsigned()->index('webinars_teacher_id_foreign');
			$table->integer('creator_id')->unsigned()->index('webinars_creator_id_foreign');
			$table->integer('category_id')->unsigned()->nullable()->index('webinars_category_id_foreign');
			$table->enum('type', array('webinar','course','text_lesson'));
			$table->boolean('private')->default(0);
			$table->string('title');
			$table->string('slug')->unique();
			$table->integer('start_date')->nullable();
			$table->integer('duration')->unsigned()->nullable();
			$table->string('seo_description')->nullable();
			$table->string('thumbnail');
			$table->string('image_cover');
			$table->string('video_demo')->nullable();
			$table->integer('capacity')->unsigned()->nullable();
			$table->decimal('price', 13)->unsigned()->nullable();
			$table->text('description')->nullable();
			$table->boolean('support')->nullable()->default(0);
			$table->boolean('downloadable')->nullable()->default(0);
			$table->boolean('partner_instructor')->nullable()->default(0);
			$table->boolean('subscribe')->nullable()->default(0);
			$table->text('message_for_reviewer')->nullable();
			$table->enum('status', array('active','pending','is_draft','inactive'));
			$table->integer('created_at');
			$table->integer('updated_at')->nullable();
			$table->integer('deleted_at')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('webinars');
	}

}
