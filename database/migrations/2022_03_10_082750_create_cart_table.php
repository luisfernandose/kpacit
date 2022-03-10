<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('creator_id')->index('cart_creator_id_foreign');
            $table->unsignedInteger('webinar_id')->nullable()->index('cart_webinar_id_foreign');
            $table->unsignedInteger('reserve_meeting_id')->nullable()->index('cart_reserve_meeting_id_foreign');
            $table->unsignedInteger('subscribe_id')->nullable()->index('cart_subscribe_id_foreign');
            $table->unsignedInteger('promotion_id')->nullable()->index('cart_promotion_id_foreign');
            $table->unsignedInteger('ticket_id')->nullable()->index('cart_ticket_id_foreign');
            $table->unsignedInteger('special_offer_id')->nullable()->index('cart_special_offer_id_foreign');
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
        Schema::dropIfExists('cart');
    }
}
