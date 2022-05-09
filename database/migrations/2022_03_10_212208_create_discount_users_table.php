<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('discount_id')->index('discount_users_discount_id_foreign');
            $table->unsignedInteger('user_id')->index('discount_users_user_id_foreign');
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
        Schema::dropIfExists('discount_users');
    }
}
