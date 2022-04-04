<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersBadgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_badges', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index('users_badges_user_id_foreign');
            $table->unsignedInteger('badge_id')->index('users_badges_badge_id_foreign');
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
        Schema::dropIfExists('users_badges');
    }
}
