<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCourseGroupUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_group_users', function (Blueprint $table) {
            $table->foreign(['course_group_list_id'])->references(['id'])->on('course_group_lists');
            $table->foreign(['user_id'])->references(['id'])->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_group_users', function (Blueprint $table) {
            $table->dropForeign('course_group_users_course_group_list_id_foreign');
            $table->dropForeign('course_group_users_user_id_foreign');
        });
    }
}
