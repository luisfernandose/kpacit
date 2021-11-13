<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseGroupUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_group_users', function (Blueprint $table) {

            $table->id();
            $table->unsignedInteger('user_id');
            $table->unsignedBigInteger('course_group_list_id');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('course_group_users');
    }
}
