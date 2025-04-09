<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HobbyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hobbies')->insert([
            [
                'nom' => 'Lecture',
                'description' => 'Explorer des livres, des articles ou des romans pour développer son imaginaire, acquérir des connaissances ou simplement se détendre.'
            ],
            [
                'nom' => 'Jardinage',
                'description' => 'Cultiver des plantes, fleurs, légumes ou herbes pour se reconnecter avec la nature et créer un espace agréable.'
            ],
            [
                'nom' => 'Photographie',
                'description' => 'Capturer des moments, des paysages ou des objets pour exprimer sa créativité à travers l\'image.'
            ],
            [
                'nom' => 'Cuisine',
                'description' => 'Préparer des plats, expérimenter avec de nouvelles recettes, ou perfectionner des techniques culinaires.'
            ],
            [
                'nom' => 'Gaming',
                'description' => 'Jouer à des jeux vidéos.'
            ],
            [
                'nom' => 'Musique',
                'description' => 'Jouer d\'un instrument, chanter ou écouter de la musique pour se détendre, s\'exprimer ou développer ses talents.'
            ],
            [
                'nom' => 'Peinture/Dessin',
                'description' => 'Créer des œuvres d\'art à partir de différents médiums pour exprimer ses émotions ou développer ses compétences artistiques.'
            ],
            [
                'nom' => 'Yoga/Méditation',
                'description' => 'Pratiquer des exercices de relaxation, de respiration et de mouvement pour améliorer son bien-être physique et mental.'
            ],
            [
                'nom' => 'Basketball',
                'description' => 'Joueur au Basketball dans une équipe ou de façon récréationnelle.'
            ],
        ]);
    }
}
