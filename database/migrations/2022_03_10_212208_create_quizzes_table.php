<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('webinar_id')->nullable()->index('quizzes_webinar_id_foreign');
            $table->unsignedInteger('creator_id')->index('quizzes_creator_id_foreign');
            $table->string('title');
            $table->string('webinar_title', 64)->nullable();
            $table->integer('time')->nullable()->default(0);
            $table->integer('attempt')->nullable();
            $table->integer('pass_mark');
            $table->boolean('certificate');
            $table->enum('status', ['active', 'inactive']);
            $table->unsignedInteger('total_mark')->nullable();
            $table->integer('created_at');
            $table->integer('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quizzes');
    }
}
