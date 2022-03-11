<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeatureWebinarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_webinars', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('webinar_id')->index();
            $table->enum('page', ['categories', 'home', 'home_categories']);
            $table->text('description')->nullable();
            $table->enum('status', ['publish', 'pending']);
            $table->unsignedInteger('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feature_webinars');
    }
}
