<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Personne;

class PersonnesController extends Controller
{
    public function fillprofile($id) {
        
        return view('personne.registerPersonne', compact('id'));
    }

   

    public function update(Request $request, $id) {
        try{            // dd($request);
            $personne = Personne::find($id);

            if($personne)
            {
                $personne->nom = $request->nom;
                $personne->prenom = $request->prenom;
                $personne->statut = $request->statut;
                $personne->photo = $request->photo;
                $personne->age = $request->age;
                $personne->sexe  = $request->sexe;
                $personne->discipline_id = $request->discipline_id;
                $personne->programme_id  = $request->programme_id;
            }
            // $fichier = $request->file('image');
            // $nomFichier = str_replace(' ', '_', $jeu->nom) . '-' . uniqid() . '-' . $fichier->extension(); 

            // try {
            //     $request->image->move(public_path('img/jeux'), $nomFichier);
            // }
            // catch(\Symfony\Component\HttpFoundation\File\Exception\FileException $e) {
            //     Log::error('Erreur lors du téléversement du fichier. ', [$e]);
            // }

            // $jeu->image = $nomFichier;

            $personne->save();
            return redirect()->route('/')->with('message', 'Enregistrement réussi');            
        }
        catch (\Throwable $e){
            // dd($request);

            // storage/logs
            Log::debug($e);
        }
    }

}
