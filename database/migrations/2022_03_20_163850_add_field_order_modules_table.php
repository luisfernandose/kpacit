<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldOrderModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('modules', function (Blueprint $table) {
            $table->integer('order')->nullable()->after('webinar_id');
            $table->integer('creator_id')->nullable()->after('webinar_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('modules', function (Blueprint $table) {
            $table->dropColumn('order');
            $table->dropColumn('creator_id');
        });
    }
}
