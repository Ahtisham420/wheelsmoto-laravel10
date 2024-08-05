<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('phone',20)->nullable();
            $table->string('avatar',255)->nullable();
            $table->text('address')->nullable();
            $table->text('fcm_token')->nullable();
            $table->text('socket_token')->nullable();
            $table->string('social_id',255)->nullable();
            $table->double('lat')->default(0.00);
            $table->double('lng')->default(0.00);
            $table->integer('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('phone',20);
        });
    }
}
