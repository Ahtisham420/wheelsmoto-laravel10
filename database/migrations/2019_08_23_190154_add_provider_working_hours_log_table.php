<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProviderWorkingHoursLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('provider_working_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('provider_id')->default(0);
            $table->integer('user_id')->default(0);
            $table->bigInteger('login_time')->default(0);
            $table->bigInteger('logout_time')->default(0);
            $table->timestamps();
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
        Schema::dropIfExists('provider_working_logs');
    }
}
