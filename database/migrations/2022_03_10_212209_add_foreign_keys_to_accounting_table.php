<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAccountingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounting', function (Blueprint $table) {
            $table->foreign(['meeting_time_id'])->references(['id'])->on('meeting_times')->onDelete('CASCADE');
            $table->foreign(['promotion_id'])->references(['id'])->on('promotions')->onDelete('CASCADE');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onDelete('CASCADE');
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
        Schema::table('accounting', function (Blueprint $table) {
            $table->dropForeign('accounting_meeting_time_id_foreign');
            $table->dropForeign('accounting_promotion_id_foreign');
            $table->dropForeign('accounting_user_id_foreign');
            $table->dropForeign('accounting_webinar_id_foreign');
        });
    }
}
