<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSalesLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales_log', function (Blueprint $table) {
            $table->foreign(['sale_id'], 'sales_status_sale_id_foreign')->references(['id'])->on('sales')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales_log', function (Blueprint $table) {
            $table->dropForeign('sales_status_sale_id_foreign');
        });
    }
}
