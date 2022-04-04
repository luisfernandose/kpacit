<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebinarReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webinar_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('webinar_id')->index('webinar_reviews_webinar_id_foreign');
            $table->unsignedInteger('creator_id')->index('webinar_reviews_creator_id_foreign');
            $table->unsignedInteger('content_quality');
            $table->unsignedInteger('instructor_skills');
            $table->unsignedInteger('purchase_worth');
            $table->unsignedInteger('support_quality');
            $table->char('rates', 10);
            $table->text('description')->nullable();
            $table->unsignedInteger('created_at');
            $table->enum('status', ['pending', 'active']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('webinar_reviews');
    }
}
