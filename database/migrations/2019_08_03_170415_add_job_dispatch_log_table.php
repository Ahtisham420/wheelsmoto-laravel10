<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddJobDispatchLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('job_dispatch_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('provider_id')->default(0);
            $table->integer('customer_id')->default(0);
            $table->string('provider_fcm_token',255)->nullable();
            $table->string('customer_fcm_token',255)->nullable();
            $table->integer('job_accept_status')->default(0);
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
        Schema::dropIfExists('job_dispatch_logs');
    }
}
