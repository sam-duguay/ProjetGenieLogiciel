<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class InteretTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('interets')->insert([
            [
                'nom' => 'Technologie',
                'photo' => 'asset/img/interets/technologie.jpg'
            ],
            [
                'nom' => 'Voyages',
                'photo' => 'asset/img/interets/voyages.jpg'
            ],
            [
                'nom' => 'Art et culture',
                'photo' => 'asset/img/interets/arts.jpg'
            ],
            [
                'nom' => 'Histoire',
                'photo' => 'asset/img/interets/histoire.jpg'
            ],
            [
                'nom' => 'Sciences',
                'photo' => 'asset/img/interets/sciences.jpg'
            ],
            [
                'nom' => 'Sport',
                'photo' => 'asset/img/interets/sports.jpg'
            ],
            [
                'nom' => 'Nature et environnement',
                'photo' => 'asset/img/interets/nature2.jpg'
            ],
            [
                'nom' => 'Cuisine',
                'photo' => 'asset/img/interets/cuisine.jpg'
            ],
            [
                'nom' => 'Philosophie',
                'photo' => 'asset/img/interets/philo.jpg'
            ],
            [
                'nom' => 'Mode (Vestimentaire)',
                'photo' => 'asset/img/interets/mode.jpg'
            ],

        ]);
    }
}
