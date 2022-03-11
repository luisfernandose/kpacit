<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisingBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertising_banners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->enum('position', ['home1', 'home2', 'course', 'course_sidebar']);
            $table->string('image');
            $table->unsignedInteger('size')->default('12');
            $table->string('link');
            $table->boolean('published')->default(false);
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
        Schema::dropIfExists('advertising_banners');
    }
}
