<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCourseGroupListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_group_lists', function (Blueprint $table) {
            $table->foreign(['creator_id'])->references(['id'])->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_group_lists', function (Blueprint $table) {
            $table->dropForeign('course_group_lists_creator_id_foreign');
        });
    }
}
