<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUsersBadgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_badges', function (Blueprint $table) {
            $table->foreign(['badge_id'])->references(['id'])->on('badges')->onDelete('CASCADE');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_badges', function (Blueprint $table) {
            $table->dropForeign('users_badges_badge_id_foreign');
            $table->dropForeign('users_badges_user_id_foreign');
        });
    }
}
