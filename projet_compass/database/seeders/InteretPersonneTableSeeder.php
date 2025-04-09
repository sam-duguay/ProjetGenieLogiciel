<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class InteretPersonneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fake = Faker::create();

        // Récupérer tous les id des intérêts et des personnes
        $interets = DB::table('interets')->pluck('id')->toArray();
        $personnes = DB::table('personnes')->pluck('id')->toArray();
    
        // Insérer 30 entrées dans la table interet_personne
        foreach (range(1, 30) as $index) {
            DB::table('interet_personne')->insert([
                'interet_id' => $fake->randomElement($interets),
                'personne_id' => $fake->randomElement($personnes),
            ]);
        }
    }
}
