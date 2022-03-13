<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class UpdateUrlS3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("update users set cover_img = REPLACE(cover_img, 'https://kpacitweb.s3.amazonaws.com', '');");
        DB::statement("update certificates set file = REPLACE(file, 'https://kpacitweb.s3.amazonaws.com', '');");
        DB::statement("update badges set image = REPLACE(image, 'https://kpacitweb.s3.amazonaws.com', '');");
        DB::statement("update categories set icon = REPLACE(icon, 'https://kpacitweb.s3.amazonaws.com', '');");
        DB::statement("update files set file = REPLACE(file, 'https://kpacitweb.s3.amazonaws.com', '');");
        DB::statement("update promotions set icon = REPLACE(icon, 'https://kpacitweb.s3.amazonaws.com', '');");
        DB::statement("update support_conversations set attach = REPLACE(attach, 'https://kpacitweb.s3.amazonaws.com', '');");
        DB::statement("update trend_categories set icon = REPLACE(icon, 'https://kpacitweb.s3.amazonaws.com', '');");
        DB::statement("update webinars set thumbnail = REPLACE(thumbnail, 'https://kpacitweb.s3.amazonaws.com', '');");
        DB::statement("update webinars set image_cover = REPLACE(image_cover, 'https://kpacitweb.s3.amazonaws.com', '');");
        DB::statement("update webinars set video_demo = REPLACE(video_demo, 'https://kpacitweb.s3.amazonaws.com', '');");
        DB::statement("update quizzes_questions_answers set image = REPLACE(image, 'https://kpacitweb.s3.amazonaws.com', '');");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
