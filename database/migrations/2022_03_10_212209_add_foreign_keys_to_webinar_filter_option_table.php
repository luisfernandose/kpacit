<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToWebinarFilterOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('webinar_filter_option', function (Blueprint $table) {
            $table->foreign(['filter_option_id'])->references(['id'])->on('filter_options')->onDelete('CASCADE');
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
        Schema::table('webinar_filter_option', function (Blueprint $table) {
            $table->dropForeign('webinar_filter_option_filter_option_id_foreign');
            $table->dropForeign('webinar_filter_option_webinar_id_foreign');
        });
    }
}
