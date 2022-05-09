<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('creator_id')->index('sessions_creator_id_foreign');
            $table->unsignedInteger('webinar_id')->index('sessions_webinar_id_foreign');
            $table->string('title', 64);
            $table->integer('date');
            $table->integer('duration');
            $table->string('link')->nullable();
            $table->text('zoom_start_link')->nullable();
            $table->enum('session_api', ['local', 'big_blue_button', 'zoom'])->default('local');
            $table->string('api_secret')->nullable();
            $table->string('moderator_secret')->nullable();
            $table->string('description', 1000)->nullable();
            $table->unsignedInteger('order')->nullable();
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
        Schema::dropIfExists('sessions');
    }
}
