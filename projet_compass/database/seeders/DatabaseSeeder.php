<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Personne;
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
            'password' => 123456
        ]);


        //Seeder pour table ayant aucune dépendances
        $this->call(DisciplineTableSeeder::class);
        $this->call(ProgrammeTableSeeder::class);
        $this->call(LangueTableSeeder::class);
        $this->call(HobbyTableSeeder::class);
        $this->call(InteretTableSeeder::class);
        $this->call(PersonneTableSeeder::class);

        //Les tables de liaisons doivent être après les tables sans liaisons
        $this->call(HobbyPersonneTableSeeder::class);
        $this->call(InteretPersonneTableSeeder::class);
        $this->call(LanguePersonneTableSeeder::class);
        $this->call(DisponibiliteTableSeeder::class);


    }
}
