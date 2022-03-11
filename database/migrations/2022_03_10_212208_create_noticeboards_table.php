<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticeboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticeboards', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('organ_id')->nullable()->index('noticeboards_organ_id_foreign');
            $table->unsignedInteger('user_id')->nullable()->index('noticeboards_user_id_foreign');
            $table->enum('type', ['all', 'organizations', 'students', 'instructors', 'students_and_instructors']);
            $table->string('sender')->nullable();
            $table->string('title');
            $table->text('message');
            $table->unsignedInteger('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('noticeboards');
    }
}
