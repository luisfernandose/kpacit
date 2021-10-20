<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('full_name', 128)->nullable();
			$table->string('role_name', 64);
			$table->integer('role_id')->unsigned();
			$table->integer('organ_id')->nullable();
			$table->string('mobile', 32)->nullable()->unique();
			$table->string('email')->nullable()->unique();
			$table->string('bio', 128)->nullable();
			$table->string('password')->nullable();
			$table->string('google_id')->nullable();
			$table->string('facebook_id')->nullable();
			$table->string('remember_token')->nullable();
			$table->boolean('verified')->default(0);
			$table->boolean('financial_approval')->default(0);
			$table->string('avatar', 128)->nullable();
			$table->string('cover_img', 128)->nullable();
			$table->string('headline', 128)->nullable();
			$table->text('about')->nullable();
			$table->string('address')->nullable();
			$table->enum('status', array('active','pending','inactive'))->default('active');
			$table->string('language')->nullable();
			$table->boolean('newsletter')->default(0);
			$table->boolean('public_message')->default(0);
			$table->string('account_type', 128)->nullable();
			$table->string('iban', 128)->nullable();
			$table->string('account_id', 128)->nullable();
			$table->string('identity_scan', 128)->nullable();
			$table->string('certificate', 128)->nullable();
			$table->integer('commission')->unsigned()->nullable();
			$table->boolean('ban')->default(0);
			$table->integer('ban_start_at')->unsigned()->nullable();
			$table->integer('ban_end_at')->unsigned()->nullable();
			$table->boolean('offline')->default(0);
			$table->text('offline_message')->nullable();
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
		Schema::drop('users');
	}

}
