<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('certificates', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('quiz_id')->unsigned()->index('certificates_quiz_id_foreign');
			$table->integer('quiz_result_id')->unsigned()->index('certificates_quiz_result_id_foreign');
			$table->integer('student_id')->unsigned()->index('certificates_student_id_foreign');
			$table->integer('user_grade')->unsigned()->nullable();
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
		Schema::drop('certificates');
	}

}
