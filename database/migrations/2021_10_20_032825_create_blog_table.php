<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blog', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('category_id')->unsigned()->nullable()->index('blog_category_id_foreign');
			$table->integer('author_id')->unsigned();
			$table->string('title');
			$table->string('slug');
			$table->string('image');
			$table->text('description');
			$table->text('meta_description')->nullable();
			$table->text('content');
			$table->integer('visit_count')->unsigned()->nullable()->default(0);
			$table->boolean('enable_comment')->default(1);
			$table->enum('status', array('pending','publish'))->default('pending');
			$table->integer('created_at')->unsigned();
			$table->integer('updated_at')->unsigned()->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('blog');
	}

}
