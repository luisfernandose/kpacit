<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounting', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable()->index('accounting_user_id_foreign');
            $table->integer('creator_id')->nullable();
            $table->unsignedInteger('webinar_id')->nullable()->index('accounting_webinar_id_foreign');
            $table->unsignedInteger('meeting_time_id')->nullable()->index('accounting_meeting_time_id_foreign');
            $table->unsignedInteger('subscribe_id')->nullable();
            $table->unsignedInteger('promotion_id')->nullable()->index('accounting_promotion_id_foreign');
            $table->boolean('system')->default(false);
            $table->boolean('tax')->default(false);
            $table->decimal('amount', 13)->nullable();
            $table->enum('type', ['addiction', 'deduction']);
            $table->enum('type_account', ['income', 'asset', 'subscribe', 'promotion'])->nullable();
            $table->enum('store_type', ['automatic', 'manual'])->default('automatic');
            $table->text('description')->nullable();
            $table->integer('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounting');
    }
}
