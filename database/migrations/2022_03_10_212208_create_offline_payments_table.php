<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfflinePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offline_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index('offline_payments_user_id_foreign');
            $table->integer('amount');
            $table->string('bank', 64);
            $table->string('reference_number', 64);
            $table->enum('status', ['waiting', 'approved', 'reject']);
            $table->integer('created_at');
            $table->string('pay_date', 64);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offline_payments');
    }
}
