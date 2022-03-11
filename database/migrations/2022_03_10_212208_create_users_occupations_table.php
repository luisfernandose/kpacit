<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersOccupationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_occupations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index('users_occupations_user_id_foreign');
            $table->unsignedInteger('category_id')->index('users_occupations_category_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_occupations');
    }
}
