<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index('comments_user_id_foreign');
            $table->unsignedInteger('review_id')->nullable()->index('comments_review_id_foreign');
            $table->unsignedInteger('webinar_id')->nullable()->index('comments_webinar_id_foreign');
            $table->unsignedInteger('blog_id')->nullable();
            $table->unsignedInteger('reply_id')->nullable()->index('comments_reply_id_foreign');
            $table->text('comment')->nullable();
            $table->enum('status', ['pending', 'active']);
            $table->boolean('report')->default(false);
            $table->boolean('disabled')->default(false);
            $table->integer('created_at');
            $table->unsignedInteger('viewed_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
