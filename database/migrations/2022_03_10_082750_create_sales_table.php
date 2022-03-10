<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('seller_id')->nullable()->index('sales_seller_id_foreign');
            $table->unsignedInteger('buyer_id')->index('sales_buyer_id_foreign');
            $table->unsignedInteger('order_id')->nullable()->index('sales_order_id_foreign');
            $table->unsignedInteger('webinar_id')->nullable()->index('sales_webinar_id_foreign');
            $table->unsignedInteger('meeting_id')->nullable()->index('sales_meeting_id_foreign');
            $table->unsignedInteger('subscribe_id')->nullable();
            $table->unsignedInteger('ticket_id')->nullable()->index('sales_ticket_id_foreign');
            $table->unsignedInteger('promotion_id')->nullable()->index('sales_promotion_id_foreign');
            $table->enum('type', ['webinar', 'meeting', 'subscribe', 'promotion']);
            $table->enum('payment_method', ['credit', 'payment_channel', 'subscribe'])->nullable();
            $table->unsignedInteger('amount');
            $table->decimal('tax', 13)->nullable();
            $table->decimal('commission', 13)->nullable();
            $table->decimal('discount', 13)->nullable();
            $table->decimal('total_amount', 13)->nullable();
            $table->unsignedInteger('created_at');
            $table->unsignedInteger('refund_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
