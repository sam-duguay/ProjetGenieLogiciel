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
            ['noProgramme' => '200B1', 'nom' => 'Sciences de la nature (200B1 pour ceux débutant à l\'automne 2024)'],
            ['noProgramme' => '200B0', 'nom' => 'Sciences de la nature (200B0 pour ceux ayant débuté à l\'automne 2023 et les années antérieures)'],
            ['noProgramme' => '20011', 'nom' => 'Sciences de la nature (200B0 pour ceux ayant débuté à l\'automne 2023 et les années antérieures)'],
            ['noProgramme' => '200C1', 'nom' => 'Sciences informatiques et mathématiques (200C1 pour ceux débutant à l\'automne 2024)'],
            ['noProgramme' => '200C0', 'nom' => 'Sciences informatiques et mathématiques (200C0 pour ceux ayant débuté à l\'automne 2023 et les années antérieures)'],
            ['noProgramme' => '300A0', 'nom' => 'Sciences humaines'],
            ['noProgramme' => '30013', 'nom' => 'Sciences humaines'],
            ['noProgramme' => '30021', 'nom' => 'Sciences humaines'],
            ['noProgramme' => '500A1', 'nom' => 'Musique'],
            ['noProgramme' => '501A0', 'nom' => 'Musique'],
            ['noProgramme' => '510A0', 'nom' => 'Musique'],
            ['noProgramme' => '700A0', 'nom' => 'Arts visuels'],
            ['noProgramme' => '700B0', 'nom' => 'Arts visuels'],
            ['noProgramme' => '111A0', 'nom' => 'Arts visuels'],
            ['noProgramme' => '120A0', 'nom' => 'Sciences, lettres et arts'],
            ['noProgramme' => '180A0', 'nom' => 'Sciences, lettres et arts'],
            ['noProgramme' => '221A0', 'nom' => 'Sciences, lettres et arts'],
            ['noProgramme' => '221B0', 'nom' => 'Sciences, lettres et arts'],
            ['noProgramme' => '221C0', 'nom' => 'Sciences, lettres et arts'],
            ['noProgramme' => '235B0', 'nom' => 'Sciences, lettres et arts'],
            ['noProgramme' => '241A0', 'nom' => 'Sciences, lettres et arts'],
            ['noProgramme' => '241D0', 'nom' => 'Sciences, lettres et arts'],
            ['noProgramme' => '180B0', 'nom' => 'Histoire et civilisation'],
            ['noProgramme' => '243G0', 'nom' => 'Histoire et civilisation'],
            ['noProgramme' => '243D0', 'nom' => 'Histoire et civilisation'],
            ['noProgramme' => '270A0', 'nom' => 'Techniques d\'hygiène dentaire'],
            ['noProgramme' => '310A0', 'nom' => 'Techniques de soins infirmiers'],
            ['noProgramme' => '388A1', 'nom' => 'Techniques de travail social (388A1 pour ceux débutant à l\'automne 2024)'],
            ['noProgramme' => '388A0', 'nom' => 'Techniques de travail social (388A0 pour ceux ayant débuté à l\'automne 2023 et les années antérieures)'],
            ['noProgramme' => '393B0', 'nom' => 'Techniques de la documentation'],
            ['noProgramme' => '410A1', 'nom' => 'DEC-BAC en logistique / Gestion des opérations et de la chaine logistique'],
            ['noProgramme' => '410B0', 'nom' => 'DEC-BAC en sciences comptables / Techniques de comptabilité et de gestion (P&B)'],
            ['noProgramme' => '410D0', 'nom' => 'DEC-BAC en marketing / Gestion de commerces'],
            ['noProgramme' => '420B0', 'nom' => 'Techniques de l\'informatique'],
            ['noProgramme' => '570E0', 'nom' => 'Techniques de design d\'intérieur'],
        ]);
    }
}