<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accounting', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->nullable()->index('accounting_user_id_foreign');
			$table->integer('creator_id')->nullable();
			$table->integer('webinar_id')->unsigned()->nullable()->index('accounting_webinar_id_foreign');
			$table->integer('meeting_time_id')->unsigned()->nullable()->index('accounting_meeting_time_id_foreign');
			$table->integer('subscribe_id')->unsigned()->nullable();
			$table->integer('promotion_id')->unsigned()->nullable()->index('accounting_promotion_id_foreign');
			$table->boolean('system')->default(0);
			$table->boolean('tax')->default(0);
			$table->decimal('amount', 13)->nullable();
			$table->enum('type', array('addiction','deduction'));
			$table->enum('type_account', array('income','asset','subscribe','promotion'))->nullable();
			$table->enum('store_type', array('automatic','manual'))->default('automatic');
			$table->text('description')->nullable();
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
		Schema::drop('accounting');
	}

}
