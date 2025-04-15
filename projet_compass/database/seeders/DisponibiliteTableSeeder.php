<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DisponibiliteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fake = Faker::create();


        // Récupérer des personnes
        $personnes = DB::table('personnes')->pluck('id')->toArray();
    
        // Insérer 30 entrées dans la table disponibilites
        foreach (range(1, 30) as $index) {
            DB::table('disponibilites')->insert([
                'date' => $fake->dateTimeBetween('now', '+1 month'),
                'heure' => $fake->randomElement([
                    '8h00',
                    '9h00',
                    '10h00',
                    '11h00',
                    '12h00',
                    '13h00',
                    '14h00',
                    '15h00',
                    '16h00',
                    '17h00',
                    '18h00',
                    '19h00',
                    '20h00',
                    '21h00',
                    '22h00'
                ]),
                'personne_id' => $fake->randomElement($personnes),
            ]);
        }
    }
}
