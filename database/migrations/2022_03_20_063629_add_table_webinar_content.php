<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableWebinarContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webinars_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('creator_id')->nullable();
            $table->integer('webinar_id')->nullable();
            $table->integer('module_id')->nullable();
            $table->string('resource_type')->nullable();
            $table->integer('resource_id')->nullable();
            $table->integer('order')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('webinars_contents');
    }
}
