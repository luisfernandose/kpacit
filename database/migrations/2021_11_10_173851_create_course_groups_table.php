<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_groups', function (Blueprint $table) {

            $table->id();
            $table->unsignedInteger('webinar_id');
            $table->unsignedBigInteger('course_group_list_id');

            $table->timestamps();

			$table->foreign('webinar_id')->references('id')->on('webinars');
			$table->foreign('course_group_list_id')->references('id')->on('course_group_lists');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_groups');
    }
}
