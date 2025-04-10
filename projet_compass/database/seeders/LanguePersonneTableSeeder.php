<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LanguePersonneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fake = Faker::create();

        // Récupérer tous les id des intérêts et des personnes
        $langues = DB::table('langues')->pluck('id')->toArray();
        $personnes = DB::table('personnes')->pluck('id')->toArray();
    
        // Insérer 30 entrées dans la table interet_personne
        foreach (range(1, 30) as $index) {
            DB::table('langue_personne')->insert([
                'langue_id' => $fake->randomElement($langues),
                'personne_id' => $fake->randomElement($personnes),
            ]);
        }
    }
}
