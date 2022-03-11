<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_offers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('creator_id')->index('special_offers_creator_id_foreign');
            $table->unsignedInteger('webinar_id')->index('special_offers_webinar_id_foreign');
            $table->string('name', 64)->nullable();
            $table->unsignedInteger('percent');
            $table->enum('status', ['active', 'inactive']);
            $table->unsignedInteger('created_at');
            $table->unsignedInteger('from_date');
            $table->unsignedInteger('to_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('special_offers');
    }
}
