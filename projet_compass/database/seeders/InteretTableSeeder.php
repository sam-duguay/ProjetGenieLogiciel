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
                'nom' => 'Technologie'
            ],
            [
                'nom' => 'Voyages'
            ],
            [
                'nom' => 'Art et culture'
            ],
            [
                'nom' => 'Histoire'
            ],
            [
                'nom' => 'Sciences'
            ],
            [
                'nom' => 'Sport'
            ],
            [
                'nom' => 'Nature et environnement'
            ],
            [
                'nom' => 'Cuisine'
            ],
            [
                'nom' => 'Philosophie'
            ],
            [
                'nom' => 'Mode (Vestimentaire)'
            ],

        ]);
    }
}
