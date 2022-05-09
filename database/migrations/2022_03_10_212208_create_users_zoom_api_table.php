<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersZoomApiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_zoom_api', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index('users_zoom_api_user_id_foreign');
            $table->text('jwt_token');
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
        Schema::dropIfExists('users_zoom_api');
    }
}
