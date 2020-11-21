<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('settings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('project_title', 191)->nullable();
			$table->string('logo', 191)->nullable();
			$table->string('favicon', 191)->nullable();
			$table->string('cpy_txt', 191)->nullable();
			$table->string('logo_type', 191)->nullable();
			$table->boolean('rightclick')->default(1);
			$table->boolean('inspect')->default(1);
			$table->string('meta_data_desc', 191)->nullable();
			$table->string('meta_data_keyword', 191)->nullable();
			$table->string('google_ana', 191)->nullable();
			$table->string('fb_pixel', 191)->nullable();
			$table->boolean('fb_login_enable')->nullable();
			$table->boolean('google_login_enable')->nullable();
			$table->boolean('gitlab_login_enable')->nullable();
			$table->boolean('stripe_enable')->nullable();
			$table->boolean('instamojo_enable')->nullable();
			$table->boolean('paypal_enable')->nullable();
			$table->boolean('paytm_enable')->nullable();
			$table->boolean('braintree_enable')->nullable();
			$table->boolean('razorpay_enable')->nullable();
			$table->boolean('paystack_enable')->nullable();
			$table->boolean('w_email_enable')->nullable();
			$table->boolean('verify_enable')->default(0);
			$table->string('wel_email', 191)->nullable();
			$table->text('default_address')->nullable();
			$table->string('default_phone', 191)->nullable();
			$table->boolean('instructor_enable')->nullable();
			$table->boolean('debug_enable')->default(1);
			$table->integer('cat_enable')->default(0);
			$table->integer('feature_amount')->nullable();
			$table->boolean('preloader_enable')->nullable()->default(1);
			$table->timestamps();
			$table->integer('zoom_enable')->unsigned()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('settings');
	}

}
