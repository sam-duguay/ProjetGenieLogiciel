<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PersonneRequest;
use App\Models\Discipline;
use App\Models\Hobby;
use App\Models\Interet;
use App\Models\Langue;
use Illuminate\Support\Facades\Log;
use App\Models\Personne;
use Illuminate\Support\Facades\Auth;
use Faker\Factory as Faker;

class PersonnesController extends Controller
{
    public function profilpersonne($id)
    {
        $match = Personne::find($id);
        $events = [];
        $user = Auth::user();
        $personneConnecte = Personne::where('user_id', $user->id)->get();

        // $personne_match = Personne::find($request->user_id);
        // $personne_match = Personne::find(10);
        $disposMatch = $match->disponibilites;
        
        foreach ($disposMatch as $disponibilite) {
            $events[] = [
                'title' => 'Disponibilité',
                'start' => $disponibilite->startTime,
                'end' => $disponibilite->endTime,
                'id' => $disponibilite->id,
                'url' => '/creer_rencontre'
            ];
        }
        
        // dd($match->bio);
        $dispoChoisi = 2;

        return view ('profilpersonne.profilpersonne', compact('match', 'events'));
    }
    public function fillprofile($id) {
        $disciplines = Discipline::all();
        $personne = Personne::find($id);
        $hobbies = Hobby::all();
        $interets = Interet::all();
        $langues = Langue::all();
        
        return view('fillprofile.fillprofile', compact('id', 'disciplines','personne', 'hobbies', 'interets', 'langues'));
    }
    public function update(PersonneRequest $request, Personne $personne, $id) 
    {
        // dd($request->all());
        try
        {
            $personne = Personne::find($id);

            if($personne) 
            {
                $personne->nom = $request->nom;
                $personne->prenom = $request->prenom;
                $personne->statut = $request->statut;
                $personne->age = $request->age;
                $personne->sexe  = $request->sexe;
                $personne->discipline_id = $request->discipline_id;
    
                if ($request->hasFile('photo')) 
                {
                    $fichier = $request->file('photo');
                    $nomFichier = 'photo_' . uniqid() . '.' . $fichier->getClientOriginalExtension();
        
                    try 
                    {
                        $fichier->move(public_path('img/personnes'), $nomFichier);
                        $personne->photo = $nomFichier;
                    } 
                    catch(\Symfony\Component\HttpFoundation\File\Exception\FileException $e) 
                    {
                        Log::error('Erreur lors du téléversement du fichier : ', [$e]);
                    }
                }
                elseif (!$personne->photo) 
                {
                    $personne->photo = 'default.png';
                }
        
                $personne->save();

           
                //if($request->filled('hobbie_nom.*') && $request->filled('hobbie_description.*')) {
                //$listNom = $request->input('hobbie_nom.*');
                //$listDescription = $request->input('hobbie_description.*');

                //for($index = 0; $index < count($listNom); $index++) {
                ///* $hobby = new Hobby();
                //$hobby->nom = $listNom[$index];
                //$hobby->description = $listDescription[$index];
                //$hobby->save();*/
                //$hobby = Hobby::create([
                //'nom' => $listNom[$index],
                //'description' => $listDescription[$index],
                //]);

                //// DB::table('hobby_personne')->insert([
                ////     'hobby_id' => $hobby->id,
                ////     'personne_id' => $personne->id,
                //// ]);

                //$personne->hobbies()->syncWithoutDetaching([$hobby->id]);
                //}
                //}
                $hobbies = $request->input('hobbies', []);
                $personne->hobbies()->syncWithoutDetaching($hobbies);

                $interets = $request->input('interets', []);
                $personne->interets()->syncWithoutDetaching($interets);

                $langues = $request->input('langues', []);
                $personne->langues()->syncWithoutDetaching($langues);
                //$personne->hobbies()->sync($hobbies);
                return redirect()->route('home')->with('message', 'Enregistrement réussi : ' . $personne->nom);
            }
            
        }catch (\Throwable $e)
        {
            Log::debug($e);
            return redirect()->back()->withErrors(['Une erreur est survenue lors de la mise à jour.']);

        }


    }

}
