<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportConversationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('support_conversations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('support_id')->unsigned()->index('support_conversations_support_id_foreign');
			$table->integer('supporter_id')->unsigned()->nullable()->index('support_conversations_supporter_id_foreign');
			$table->integer('sender_id')->unsigned()->nullable()->index('support_conversations_sender_id_foreign');
			$table->string('attach')->nullable();
			$table->text('message');
			$table->integer('created_at')->unsigned();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('support_conversations');
	}

}
