<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('creator_id')->index('tickets_creator_id_foreign');
            $table->unsignedInteger('webinar_id')->index('tickets_webinar_id_foreign');
            $table->string('title', 64);
            $table->unsignedInteger('start_date')->nullable();
            $table->unsignedInteger('end_date')->nullable();
            $table->integer('discount');
            $table->integer('capacity')->nullable();
            $table->unsignedInteger('order')->nullable();
            $table->integer('created_at');
            $table->integer('updated_at')->nullable();
            $table->integer('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
