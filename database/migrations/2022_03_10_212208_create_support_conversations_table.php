<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_conversations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('support_id')->index('support_conversations_support_id_foreign');
            $table->unsignedInteger('supporter_id')->nullable()->index('support_conversations_supporter_id_foreign');
            $table->unsignedInteger('sender_id')->nullable()->index('support_conversations_sender_id_foreign');
            $table->string('attach')->nullable();
            $table->text('message');
            $table->unsignedInteger('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('support_conversations');
    }
}
