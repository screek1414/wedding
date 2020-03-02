<?php

use Illuminate\Database\Seeder;

class PlaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Place::create(['address' => 'Таганрог, Чехова 270']);
        \App\Place::create(['address' => 'Таганрог, Дзержинского 16']);
        \App\Place::create(['address' => 'Ростов-на-Дону, Гоголя 122']);
        \App\Place::create(['address' => 'Ростов-на-Дону, Малиновского 342']);
        \App\Place::create(['address' => 'Таганрог, Лизы Чайкиной 160']);
    }
}
