<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSubscribeUsesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('subscribe_uses', function(Blueprint $table)
		{
			$table->foreign('sale_id')->references('id')->on('sales')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('subscribe_id')->references('id')->on('subscribes')->onUpdate('RESTRICT')->onDelete('CASCADE');
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
		Schema::table('subscribe_uses', function(Blueprint $table)
		{
			$table->dropForeign('subscribe_uses_sale_id_foreign');
			$table->dropForeign('subscribe_uses_subscribe_id_foreign');
			$table->dropForeign('subscribe_uses_user_id_foreign');
			$table->dropForeign('subscribe_uses_webinar_id_foreign');
		});
	}

}
