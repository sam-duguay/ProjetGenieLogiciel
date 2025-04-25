<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('biographies')->insert([
                [
                    'personne_id' => '1',
                    'bio' => 'Salut ! Moi c’est Shay, et je suis ici pour élargir mon cercle d’amis et partager de bons moments avec des personnes sympas et bienveillantes. 😊
                            Je suis quelqu’un de sociable, curieux(se) et toujours partant(e) pour une balade, un resto, un ciné ou un simple café en bonne compagnie. J’adore [tes centres d’intérêt – ex : les jeux de société, la randonnée, les séries, les brunchs entre amis], et je suis toujours ouvert(e) à découvrir de nouvelles activités.
                            Si tu cherches à créer des liens sans prise de tête, papoter autour d’un verre ou organiser des sorties à plusieurs, n’hésite pas à me contacter. À très vite j’espère !'
                ]
            ]
        );
    }
}
