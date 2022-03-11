<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index('order_items_user_id_foreign');
            $table->unsignedInteger('order_id')->index('order_items_order_id_foreign');
            $table->unsignedInteger('webinar_id')->nullable()->index('order_items_webinar_id_foreign');
            $table->unsignedInteger('subscribe_id')->nullable()->index('order_items_subscribe_id_foreign');
            $table->unsignedInteger('promotion_id')->nullable()->index('order_items_promotion_id_foreign');
            $table->unsignedInteger('reserve_meeting_id')->nullable()->index('order_items_reserve_meeting_id_foreign');
            $table->unsignedInteger('ticket_id')->nullable()->index('order_items_ticket_id_foreign');
            $table->integer('discount_id')->nullable();
            $table->unsignedInteger('amount')->nullable();
            $table->unsignedInteger('tax')->nullable();
            $table->decimal('tax_price', 13)->nullable();
            $table->unsignedInteger('commission')->nullable();
            $table->decimal('commission_price', 13)->nullable();
            $table->decimal('discount', 13)->nullable();
            $table->decimal('total_amount', 13)->nullable();
            $table->unsignedInteger('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
