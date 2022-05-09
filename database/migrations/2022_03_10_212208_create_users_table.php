<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('external_id', 250)->nullable()->comment('Id para usar en plataforma externa ERP');
            $table->string('full_name', 128)->nullable();
            $table->string('role_name', 64);
            $table->unsignedInteger('role_id');
            $table->integer('organ_id')->nullable();
            $table->string('mobile', 32)->nullable()->unique();
            $table->string('email')->nullable()->unique();
            $table->string('bio', 128)->nullable();
            $table->string('password')->nullable();
            $table->string('google_id')->nullable();
            $table->string('facebook_id')->nullable();
            $table->string('remember_token')->nullable();
            $table->boolean('verified')->default(false);
            $table->boolean('financial_approval')->default(false);
            $table->string('avatar', 128)->nullable();
            $table->string('cover_img', 128)->nullable();
            $table->string('headline', 128)->nullable();
            $table->text('about')->nullable();
            $table->string('address')->nullable();
            $table->enum('status', ['active', 'pending', 'inactive'])->default('active');
            $table->string('language')->nullable();
            $table->boolean('newsletter')->default(false);
            $table->boolean('public_message')->default(false);
            $table->string('account_type', 128)->nullable();
            $table->string('iban', 128)->nullable();
            $table->string('account_id', 128)->nullable();
            $table->string('identity_scan', 128)->nullable();
            $table->string('certificate', 128)->nullable();
            $table->unsignedInteger('commission')->nullable();
            $table->boolean('ban')->default(false);
            $table->unsignedInteger('ban_start_at')->nullable();
            $table->unsignedInteger('ban_end_at')->nullable();
            $table->boolean('offline')->default(false);
            $table->text('offline_message')->nullable();
            $table->integer('created_at');
            $table->integer('updated_at')->nullable();
            $table->integer('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
