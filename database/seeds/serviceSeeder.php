<?php

use Illuminate\Database\Seeder;

class serviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            ['title' => '1 Car Lane']
        ,
            ['title' => '2 Car Lanes']
        ,
            ['title' => '3 Car Lanes'],
        ]);
    }
}
