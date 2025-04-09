<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HobbyPersonneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hobby_personne')->insert([
            [
                'hobby_id' => 'Lecture',
                'personne_id' => 'Explorer des livres, des articles ou des romans pour développer son imaginaire, acquérir des connaissances ou simplement se détendre.'
            ],
        ]);
    }
}
