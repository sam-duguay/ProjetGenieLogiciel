<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PersonneRequest;
use App\Models\Discipline;
use App\Models\Programme;
use Illuminate\Support\Facades\Log;
use App\Models\Personne;

class PersonnesController extends Controller
{
    public function fillprofile($id) {
        $disciplines = Discipline::all();
        $programmes = Programme::all();
        return view('fillprofile.fillprofile', compact('id', 'disciplines', 'programmes'));
    }

    public function update(PersonneRequest $request, $id) {
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
            $fichier = $request->file('image');
            $nomFichier = str_replace(' ', '_', $request->photo) . '-' . uniqid() . '-' . $fichier->extension(); 

            try {
                $request->photo->move(public_path('img/personnes'), $nomFichier);
            }
            catch(\Symfony\Component\HttpFoundation\File\Exception\FileException $e) {
                Log::error('Erreur lors du téléversement du fichier. ', [$e]);
            }

            $request->photo = $nomFichier;

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
