<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PersonneRequest;
use App\Models\Discipline;
use App\Models\Programme;
use Illuminate\Support\Facades\Log;
use App\Models\Personne;
use Faker\Provider\ar_EG\Person;

class PersonnesController extends Controller
{
    public function fillprofile($id) {
        $disciplines = Discipline::all();
        $personne = Personne::find($id);
        return view('fillprofile.fillprofile', compact('id', 'disciplines','personne'));
    }
    public function update(PersonneRequest $request, Personne $personne, $id) 
    {
        
       $personne = Personne::find($id);

    //    try{
        if($personne) {
            $personne->nom = $request->nom;
            $personne->prenom = $request->prenom;
            $personne->statut = $request->statut;
            $personne->age = $request->age;
            $personne->sexe  = $request->sexe;
            $personne->discipline_id = $request->discipline_id;
    
            if ($request->hasFile('photo')) {
                $fichier = $request->file('photo');
                $nomFichier = 'photo_' . uniqid() . '.' . $fichier->getClientOriginalExtension();
    
                try {
                    $fichier->move(public_path('img/personnes'), $nomFichier);
                    $personne->photo = $nomFichier;
                } catch(\Symfony\Component\HttpFoundation\File\Exception\FileException $e) {
                    Log::error('Erreur lors du téléversement du fichier : ', [$e]);
                }
            }elseif (!$personne->photo) {
                $personne->photo = 'default.png';
            }
    
            $personne->save();
    
            return redirect()->route('home')->with('message', 'Enregistrement réussi : ' . $personne->nom);
    }

    //    }catch (\Throwable $e){

    //    }


    }

}
