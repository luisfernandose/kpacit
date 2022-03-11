<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('certificates', function (Blueprint $table) {
            $table->foreign(['quiz_id'])->references(['id'])->on('quizzes')->onDelete('CASCADE');
            $table->foreign(['quiz_result_id'])->references(['id'])->on('quizzes_results')->onDelete('CASCADE');
            $table->foreign(['student_id'])->references(['id'])->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('certificates', function (Blueprint $table) {
            $table->dropForeign('certificates_quiz_id_foreign');
            $table->dropForeign('certificates_quiz_result_id_foreign');
            $table->dropForeign('certificates_student_id_foreign');
        });
    }
}
