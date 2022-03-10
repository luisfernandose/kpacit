<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToQuizzesResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quizzes_results', function (Blueprint $table) {
            $table->foreign(['quiz_id'])->references(['id'])->on('quizzes')->onDelete('CASCADE');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quizzes_results', function (Blueprint $table) {
            $table->dropForeign('quizzes_results_quiz_id_foreign');
            $table->dropForeign('quizzes_results_user_id_foreign');
        });
    }
}
