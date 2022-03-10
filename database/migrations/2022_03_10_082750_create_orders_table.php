<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('external_invoice_id', 250)->nullable()->comment('Id para usar en plataforma externa ERP');
            $table->unsignedInteger('user_id')->index('orders_user_id_foreign');
            $table->enum('status', ['pending', 'paying', 'paid', 'fail']);
            $table->enum('payment_method', ['credit', 'payment_channel'])->nullable();
            $table->boolean('is_charge_account')->default(false);
            $table->unsignedInteger('amount');
            $table->decimal('tax', 13)->nullable();
            $table->decimal('total_discount', 13)->nullable();
            $table->decimal('total_amount', 13)->nullable();
            $table->text('reference_id')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
