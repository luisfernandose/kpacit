<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBecomeInstructorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('become_instructors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index('become_instructors_user_id_foreign');
            $table->string('certificate')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['pending', 'accept', 'reject'])->default('pending');
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
        Schema::dropIfExists('become_instructors');
    }
}
