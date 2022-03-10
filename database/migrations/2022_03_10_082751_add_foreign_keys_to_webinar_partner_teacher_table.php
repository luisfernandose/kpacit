<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToWebinarPartnerTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('webinar_partner_teacher', function (Blueprint $table) {
            $table->foreign(['teacher_id'])->references(['id'])->on('users')->onDelete('CASCADE');
            $table->foreign(['webinar_id'])->references(['id'])->on('webinars')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('webinar_partner_teacher', function (Blueprint $table) {
            $table->dropForeign('webinar_partner_teacher_teacher_id_foreign');
            $table->dropForeign('webinar_partner_teacher_webinar_id_foreign');
        });
    }
}
