<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->text('license')->nullable();
            $table->integer('radius')->default(5);
            $table->boolean('approval_status')->default(0);
            $table->boolean('job_status')->default(0);
            $table->boolean('withdraw_status')->default(0);
            $table->double('total_earning')->default(0);
            $table->double('weekly_earning')->default(0);
            $table->double('overall_rating')->default(0.00);
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
        Schema::dropIfExists('providers');
    }
}
