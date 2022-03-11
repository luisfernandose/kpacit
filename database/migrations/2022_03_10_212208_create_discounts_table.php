<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('creator_id')->index('discounts_creator_id_foreign');
            $table->string('title');
            $table->string('code', 64)->unique();
            $table->unsignedInteger('percent')->nullable();
            $table->unsignedInteger('amount')->nullable();
            $table->integer('count')->default(1);
            $table->enum('type', ['all_users', 'special_users']);
            $table->enum('status', ['active', 'disable'])->default('active');
            $table->unsignedInteger('expired_at');
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
        Schema::dropIfExists('discounts');
    }
}
