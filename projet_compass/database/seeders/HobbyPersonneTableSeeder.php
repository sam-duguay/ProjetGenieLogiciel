<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class HobbyPersonneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fake = Faker::create();

        // Récupérer tous les id des hobbies et des personnes
        $hobbies = DB::table('hobbies')->pluck('id')->toArray();
        $personnes = DB::table('personnes')->pluck('id')->toArray();
    
        // Insérer 30 entrées dans la table hobby_personne
        foreach (range(1, 30) as $index) {
            DB::table('hobby_personne')->insert([
                'hobby_id' => $fake->randomElement($hobbies),
                'personne_id' => $fake->randomElement($personnes),
            ]);
        }
    }
}
