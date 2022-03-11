<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_channels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 64);
            $table->enum('class_name', ['Paypal', 'Paystack', 'Paytm', 'Payu', 'Razorpay', 'Zarinpal', 'Stripe', 'Paysera', 'Cashu', 'YandexCheckout', 'MercadoPago', 'Bitpay', 'Midtrans', 'Iyzipay', 'Flutterwave', 'Payfort']);
            $table->enum('status', ['active', 'inactive']);
            $table->string('image')->nullable();
            $table->text('settings')->nullable();
            $table->string('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_channels');
    }
}
