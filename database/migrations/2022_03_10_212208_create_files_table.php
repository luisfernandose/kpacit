<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('creator_id')->index('files_creator_id_foreign');
            $table->unsignedInteger('webinar_id')->index('files_webinar_id_foreign');
            $table->string('title', 64);
            $table->enum('accessibility', ['free', 'paid']);
            $table->boolean('downloadable')->nullable()->default(false);
            $table->enum('storage', ['local', 'online']);
            $table->string('file');
            $table->string('volume', 64);
            $table->string('file_type', 64);
            $table->string('description', 1000)->nullable();
            $table->unsignedInteger('order')->nullable();
            $table->integer('created_at');
            $table->integer('updated_at')->nullable();
            $table->integer('deleted_at')->nullable();
            $table->unsignedBigInteger('module_id')->nullable()->index('module_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
