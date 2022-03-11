<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionRemindsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_reminds', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('session_id')->index('session_reminds_session_id_foreign');
            $table->unsignedInteger('user_id')->index('session_reminds_user_id_foreign');
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
        Schema::dropIfExists('session_reminds');
    }
}
