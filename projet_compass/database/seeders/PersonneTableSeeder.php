<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PersonneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $fake = Faker::create();

        //Tous les id des Users
        $users = DB::table('users')->pluck('id')->toArray();

        //Pour s'assurer que chaque personne n'ait que un userID
        foreach ($users as $userId){
            DB::table('personnes')->insert([
                'nom' => $fake->unique()->firstName(),
                'prenom' => $fake->unique()->lastName(),
                'statut' => $fake->randomElement(['etudiant', 'professeur']),
                'photo' => "",
                'age' => $fake->numberBetween(16, 100),
                'sexe' => $fake->randomElement(['male', 'femelle']),
                'user_id' => $userId,
                'discipline_id' => $fake->numberBetween(2, 35)
            ]);
        }
    }
}
