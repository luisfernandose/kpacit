<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebinarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webinars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('external_id', 250)->nullable()->comment('Id para usar en plataforma externa ERP');
            $table->unsignedInteger('teacher_id')->index('webinars_teacher_id_foreign');
            $table->unsignedInteger('creator_id')->index('webinars_creator_id_foreign');
            $table->unsignedInteger('category_id')->nullable()->index('webinars_category_id_foreign');
            $table->enum('type', ['webinar', 'course', 'text_lesson']);
            $table->boolean('private')->default(false);
            $table->string('title');
            $table->string('slug')->unique();
            $table->integer('start_date')->nullable();
            $table->unsignedInteger('duration')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('thumbnail');
            $table->string('image_cover');
            $table->string('video_demo')->nullable();
            $table->unsignedInteger('capacity')->nullable();
            $table->decimal('price', 13)->unsigned()->nullable();
            $table->text('description')->nullable();
            $table->boolean('support')->nullable()->default(false);
            $table->boolean('downloadable')->nullable()->default(false);
            $table->boolean('partner_instructor')->nullable()->default(false);
            $table->boolean('subscribe')->nullable()->default(false);
            $table->text('message_for_reviewer')->nullable();
            $table->enum('status', ['active', 'pending', 'is_draft', 'inactive']);
            $table->integer('created_at');
            $table->integer('updated_at')->nullable();
            $table->integer('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('webinars');
    }
}
