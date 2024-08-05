<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('user_cars')) {
            Schema::create('user_cars', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users');
                $table->string('registration_no', 255);
                $table->string('mileage', 255);
                $table->string('engine_size', 255);
                $table->unsignedInteger('engine_type'); 
                $table->foreign('engine_type')->references('id')->on('car_settings');
                $table->unsignedInteger('color'); 
                $table->foreign('color')->references('id')->on('car_settings');
                $table->string('interior', 255);
                $table->string('metallic_paint', 255);
                $table->unsignedInteger('matt_paint'); 
                $table->foreign('matt_paint')->references('id')->on('car_settings');
                $table->string('safety_rating', 255)->nullable();
                $table->text('safety_rating_info')->nullable();
                $table->text('bhp')->nullable();
                $table->string('warranty', 255);
                $table->string('drivers_position', 255);
                $table->unsignedInteger('wheel_size')->nullable(); 
                $table->foreign('wheel_size')->references('id')->on('car_settings');
                $table->string('part_exchange', 255);
                $table->string('0_to_60MPH', 255)->nullable();
                $table->string('top_speed', 255)->nullable();
                $table->string('driven_wheels', 255)->nullable();
                $table->string('import', 255);
                $table->string('mot_expiry_date', 255);
                $table->string('service_history', 255);
                $table->string('boot_spoiler', 255);
                $table->unsignedInteger('parking_sensor'); 
                $table->foreign('parking_sensor')->references('id')->on('car_settings');
                $table->unsignedInteger('exhaust'); 
                $table->foreign('exhaust')->references('id')->on('car_settings');
                $table->string('title', 255)->nullable();
                $table->string('modal', 255)->nullable();
                $table->string('variant', 255)->nullable();
                $table->string('car_type', 255)->nullable();
                $table->string('car_make', 255);
                $table->string('year', 255);
                $table->string('post_code', 255);
                $table->string('body_type', 255)->nullable();
                $table->string('transmission', 255)->nullable();
                $table->string('fuel_type', 255)->nullable();
                $table->string('car_condition', 255);
                $table->text('advert_text');
                $table->string('price', 255);
                $table->string('car_availbilty', 255);
                $table->text('pic_url');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_cars');
    }
}
