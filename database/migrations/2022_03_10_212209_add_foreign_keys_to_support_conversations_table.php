<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSupportConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('support_conversations', function (Blueprint $table) {
            $table->foreign(['sender_id'])->references(['id'])->on('users')->onDelete('CASCADE');
            $table->foreign(['support_id'])->references(['id'])->on('supports')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('support_conversations', function (Blueprint $table) {
            $table->dropForeign('support_conversations_sender_id_foreign');
            $table->dropForeign('support_conversations_support_id_foreign');
        });
    }
}
