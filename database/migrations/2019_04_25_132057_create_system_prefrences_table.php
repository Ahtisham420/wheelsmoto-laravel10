<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemPrefrencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_prefrences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("max_job_limit")->default(3);
            $table->integer("max_job_cancellation_time")->default(3);
            $table->integer("max_job_acception_time")->default(3);
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
        Schema::dropIfExists('system_prefrences');
    }
}
