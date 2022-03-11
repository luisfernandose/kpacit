<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('quiz_id')->index('certificates_quiz_id_foreign');
            $table->unsignedInteger('quiz_result_id')->index('certificates_quiz_result_id_foreign');
            $table->unsignedInteger('student_id')->index('certificates_student_id_foreign');
            $table->unsignedInteger('user_grade')->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('certificates');
    }
}
