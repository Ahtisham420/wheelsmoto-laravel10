<?php

use Illuminate\Database\Seeder;

class systemPrefrencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('system_prefrences')->insert([
            'max_job_limit' => 3,
            'max_job_cancellation_time' => 15,
            'max_job_acception_time' => 15,
        ]);
    }
}
