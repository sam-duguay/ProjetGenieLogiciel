<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisciplineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('disciplines')->insert([
            ['nom' => '00000'],
            ['nom' => '200B1'],
            ['nom' => '200B0'],
            ['nom' => '20011'],
            ['nom' => '200C1'],
            ['nom' => '200C0'],
            ['nom' => '300A0'],
            ['nom' => '30013'],
            ['nom' => '30021'],
            ['nom' => '500A1'],
            ['nom' => '501A0'],
            ['nom' => '510A0'],
            ['nom' => '700A0'],
            ['nom' => '700B0'],
            ['nom' => '111A0'],
            ['nom' => '120A0'],
            ['nom' => '180A0'],
            ['nom' => '221A0'],
            ['nom' => '221B0'],
            ['nom' => '221C0'],
            ['nom' => '235B0'],
            ['nom' => '241A0'],
            ['nom' => '241D0'],
            ['nom' => '180B0'],
            ['nom' => '243G0'],
            ['nom' => '243D0'],
            ['nom' => '270A0'],
            ['nom' => '310A0'],
            ['nom' => '388A1'],
            ['nom' => '388A0'],
            ['nom' => '393B0'],
            ['nom' => '410A1'],
            ['nom' => '410B0'],
            ['nom' => '410D0'],
            ['nom' => '420B0'],
            ['nom' => '570E0'],
        ]);
    }
}