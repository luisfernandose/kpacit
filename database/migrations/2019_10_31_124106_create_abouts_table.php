<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('one_enable');
            $table->string('one_heading');
            $table->string('one_image');
            $table->text('one_text');
            $table->integer('two_enable');
            $table->string('two_heading');
            $table->text('two_text');
            $table->string('two_imageone');
            $table->string('two_imagetwo');
            $table->string('two_imagethree');
            $table->string('two_imagefour');
            $table->string('two_txtone');
            $table->string('two_txttwo');
            $table->string('two_txtthree');
            $table->string('two_txtfour');
            $table->text('two_imagetext');
            $table->integer('three_enable');
            $table->string('three_heading');
            $table->text('three_text');
            $table->string('three_countone');
            $table->string('three_counttwo');
            $table->string('three_countthree');
            $table->string('three_countfour');
            $table->string('three_countfive');
            $table->string('three_countsix');
            $table->string('three_txtone');
            $table->string('three_txttwo');
            $table->string('three_txtthree');
            $table->string('three_txtfour');
            $table->string('three_txtfive');
            $table->string('three_txtsix');
            $table->integer('four_enable');
            $table->string('four_heading');
            $table->text('four_text');
            $table->string('four_btntext');
            $table->string('four_imageone');
            $table->string('four_imagetwo');
            $table->string('four_txtone');
            $table->string('four_txttwo');
            $table->string('four_icon');
            $table->integer('five_enable');
            $table->string('five_heading');
            $table->text('five_text');
            $table->string('five_btntext');
            $table->string('five_imageone');
            $table->string('five_imagetwo');
            $table->string('five_imagethree');
            $table->integer('six_enable');
            $table->string('six_heading');
            $table->string('six_txtone');
            $table->string('six_txttwo');
            $table->string('six_txtthree');
            $table->text('six_deatilone');
            $table->text('six_deatiltwo');
            $table->text('six_deatilthree');
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
        Schema::dropIfExists('abouts');
    }
}
