<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LangueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('langues')->insert([
            ['nom' => 'Français'],
            ['nom' => 'Anglais'],
            ['nom' => 'Espagnol'],
            ['nom' => 'Allemand'],
            ['nom' => 'Italien'],
            ['nom' => 'Mandarin'],
            ['nom' => 'Russe'],
            ['nom' => 'Hindi'],
            ['nom' => 'Arabe'],
            ['nom' => 'Portugais'],
        ]);
    }
}
