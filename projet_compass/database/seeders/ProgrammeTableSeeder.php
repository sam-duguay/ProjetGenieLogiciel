<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgrammeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('programmes')->insert([
            ['noProgramme' => 'Aucun programme'],
            ['noProgramme' => 'Tremplin DEC'],
            ['noProgramme' => 'Programmes préuniversitaires'],
            ['noProgramme' => 'Sciences de la nature (200B1 pour ceux débutant à l\'automne 2024)'],
            ['noProgramme' => 'Sciences de la nature (200B0 pour ceux ayant débuté à l\'automne 2023 et les années antérieures)'],
            ['noProgramme' => 'Sciences de la nature/Musique'],
            ['noProgramme' => 'Sciences informatiques et mathématiques (200C1 pour ceux débutant à l\'automne 2024)'],
            ['noProgramme' => 'Sciences informatiques et mathématiques (200C0 pour ceux ayant débuté à l\'automne 2023 et les années antérieures)'],
            ['noProgramme' => 'Sciences humaines'],
            ['noProgramme' => 'Sciences humaines/Arts visuels'],
            ['noProgramme' => 'Sciences humaines/Musique'],
            ['noProgramme' => 'Arts, lettres et communication'],
            ['noProgramme' => 'Musique'],
            ['noProgramme' => 'Arts visuels'],
            ['noProgramme' => 'Sciences, lettres et arts'],
            ['noProgramme' => 'Histoire et civilisation'],
            ['noProgramme' => 'Programmes techniques'],
            ['noProgramme' => 'Techniques d’hygiène dentaire'],
            ['noProgramme' => 'Techniques de diététique'],
            ['noProgramme' => 'Techniques de soins infirmiers'],
            ['noProgramme' => 'Technologie de l’architecture'],
            ['noProgramme' => 'Technologie du génie civil'],
            ['noProgramme' => 'Technologie de la mécanique du bâtiment (Génie du bâtiment)'],
            ['noProgramme' => 'Technologie du génie industriel'],
            ['noProgramme' => 'Techniques du génie mécanique'],
            ['noProgramme' => 'Technologie de mécanique industrielle (maintenance)'],
            ['noProgramme' => 'Techniques de soins infirmiers destiné aux infirmières auxiliaires'],
            ['noProgramme' => 'Technologie du génie électrique – Électronique programmable'],
            ['noProgramme' => 'Technologie du genie électrique – Automatisation et contrôle'],
            ['noProgramme' => 'Technologie du génie métallurgique'],
            ['noProgramme' => 'Techniques policières'],
            ['noProgramme' => 'Techniques de travail social (388A1 pour ceux débutant à l\'automne 2024)'],
            ['noProgramme' => 'Techniques de travail social (388A0 pour ceux ayant débuté à l\'automne 2023 et les années antérieures)'],
            ['noProgramme' => 'Techniques de la documentation'],
            ['noProgramme' => 'DEC-BAC en logistique / Gestion des opérations et de la chaine logistique'],
            ['noProgramme' => 'DEC-BAC en sciences comptables / Techniques de comptabilité et de gestion (P&B)'],
            ['noProgramme' => 'DEC-BAC en marketing / Gestion de commerces'],
            ['noProgramme' => 'Techniques de l’informatique'],
            ['noProgramme' => 'Techniques de design d’intérieur'],
        ]);
    }
}