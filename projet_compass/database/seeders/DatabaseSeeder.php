<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Personne;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'email' => 'test@example.com',
        ]);

        


        //Seeder pour table ayant aucune dépendances
        $this->call(DisciplineTableSeeder::class);
        $this->call(ProgrammeTableSeeder::class);
        $this->call(LangueTableSeeder::class);
        $this->call(HobbyTableSeeder::class);
        $this->call(InteretTableSeeder::class);


        //TRouver un moyen d'implémenter un id unique à chaque personne qui n'a pas été pris auparavant
        //Personne::factory(10)->create();
    }
}
