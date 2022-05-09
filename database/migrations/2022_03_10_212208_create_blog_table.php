<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id')->nullable()->index('blog_category_id_foreign');
            $table->unsignedInteger('author_id');
            $table->string('title');
            $table->string('slug');
            $table->string('image');
            $table->text('description');
            $table->text('meta_description')->nullable();
            $table->longText('content');
            $table->unsignedInteger('visit_count')->nullable()->default('0');
            $table->boolean('enable_comment')->default(true);
            $table->enum('status', ['pending', 'publish'])->default('pending');
            $table->unsignedInteger('created_at');
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
        Schema::dropIfExists('blog');
    }
}
