<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReserveMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserve_meetings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('meeting_id')->nullable();
            $table->unsignedInteger('sale_id')->nullable()->index('reserve_meetings_sale_id_foreign');
            $table->unsignedInteger('meeting_time_id')->index('reserve_meetings_meeting_time_id_foreign');
            $table->string('day', 10);
            $table->unsignedInteger('date');
            $table->unsignedInteger('user_id')->index('reserve_meetings_user_id_foreign');
            $table->decimal('paid_amount', 13);
            $table->integer('discount')->nullable();
            $table->string('link')->nullable();
            $table->string('password', 64)->nullable();
            $table->enum('status', ['pending', 'open', 'finished', 'canceled']);
            $table->integer('created_at');
            $table->integer('locked_at')->nullable();
            $table->integer('reserved_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserve_meetings');
    }
}
