<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cart', function (Blueprint $table) {
            $table->foreign(['creator_id'])->references(['id'])->on('users')->onDelete('CASCADE');
            $table->foreign(['promotion_id'])->references(['id'])->on('promotions')->onDelete('CASCADE');
            $table->foreign(['reserve_meeting_id'])->references(['id'])->on('reserve_meetings')->onDelete('CASCADE');
            $table->foreign(['special_offer_id'])->references(['id'])->on('special_offers')->onDelete('CASCADE');
            $table->foreign(['subscribe_id'])->references(['id'])->on('subscribes')->onDelete('CASCADE');
            $table->foreign(['ticket_id'])->references(['id'])->on('tickets')->onDelete('CASCADE');
            $table->foreign(['webinar_id'])->references(['id'])->on('webinars')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cart', function (Blueprint $table) {
            $table->dropForeign('cart_creator_id_foreign');
            $table->dropForeign('cart_promotion_id_foreign');
            $table->dropForeign('cart_reserve_meeting_id_foreign');
            $table->dropForeign('cart_special_offer_id_foreign');
            $table->dropForeign('cart_subscribe_id_foreign');
            $table->dropForeign('cart_ticket_id_foreign');
            $table->dropForeign('cart_webinar_id_foreign');
        });
    }
}
