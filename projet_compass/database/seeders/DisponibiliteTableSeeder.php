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
            $date = $fake->dateTimeBetween('now', '+1 month');

            DB::table('disponibilites')->insert([
                'startTime' => $date,
                'endTime' => $fake->dateTime($date),
                'personne_id' => $fake->randomElement($personnes),
            ]);
        }
    }
}
