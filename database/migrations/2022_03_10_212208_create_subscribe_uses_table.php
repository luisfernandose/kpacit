<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribeUsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribe_uses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index('subscribe_uses_user_id_foreign');
            $table->unsignedInteger('subscribe_id')->index('subscribe_uses_subscribe_id_foreign');
            $table->unsignedInteger('webinar_id')->index('subscribe_uses_webinar_id_foreign');
            $table->unsignedInteger('sale_id')->index('subscribe_uses_sale_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscribe_uses');
    }
}
