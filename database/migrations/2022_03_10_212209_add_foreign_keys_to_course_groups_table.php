<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCourseGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_groups', function (Blueprint $table) {
            $table->foreign(['course_group_list_id'])->references(['id'])->on('course_group_lists');
            $table->foreign(['webinar_id'])->references(['id'])->on('webinars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_groups', function (Blueprint $table) {
            $table->dropForeign('course_groups_course_group_list_id_foreign');
            $table->dropForeign('course_groups_webinar_id_foreign');
        });
    }
}
