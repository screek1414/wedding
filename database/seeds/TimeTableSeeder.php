<?php

use Illuminate\Database\Seeder;

class TimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Time::create(['time' => '10:00']);
        \App\Time::create(['time' => '12:00']);
        \App\Time::create(['time' => '14:00']);
        \App\Time::create(['time' => '16:00']);
        \App\Time::create(['time' => '18:00']);
        \App\Time::create(['time' => '20:00']);
    }
}
