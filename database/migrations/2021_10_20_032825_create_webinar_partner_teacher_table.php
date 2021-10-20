<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebinarPartnerTeacherTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('webinar_partner_teacher', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('webinar_id')->unsigned()->index('webinar_partner_teacher_webinar_id_foreign');
			$table->integer('teacher_id')->unsigned()->index('webinar_partner_teacher_teacher_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('webinar_partner_teacher');
	}

}
