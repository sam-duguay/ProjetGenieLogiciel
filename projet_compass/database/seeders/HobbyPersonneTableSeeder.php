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
                // 'hobby_id' => 
                // 'personne_id' => 
            ],
        ]);
    }
}
