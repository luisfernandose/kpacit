<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supports', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index('supports_user_id_foreign');
            $table->unsignedInteger('webinar_id')->nullable()->index('supports_webinar_id_foreign');
            $table->unsignedInteger('department_id')->nullable()->index('supports_department_id_foreign');
            $table->string('title');
            $table->enum('status', ['open', 'close', 'replied', 'supporter_replied'])->default('open');
            $table->unsignedInteger('created_at')->nullable();
            $table->unsignedInteger('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supports');
    }
}
