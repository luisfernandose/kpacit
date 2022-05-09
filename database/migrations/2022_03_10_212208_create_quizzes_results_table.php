<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes_results', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('quiz_id')->index('quizzes_results_quiz_id_foreign');
            $table->unsignedInteger('user_id')->index('quizzes_results_user_id_foreign');
            $table->text('results')->nullable();
            $table->integer('user_grade')->nullable();
            $table->enum('status', ['passed', 'failed', 'waiting']);
            $table->integer('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quizzes_results');
    }
}
