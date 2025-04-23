<?php

namespace App\Http\Controllers;
    
use App\Models\Rencontre;
use Illuminate\Http\Request;
use App\Models\Disponibilite;
use Illuminate\Support\Facades\Auth;
use App\Models\Personne;
use Illuminate\Support\Facades\Log;

class RencontreController extends Controller
{
    public function creer_rencontre(Request $request, $disponibilite_id)
    {
        $user = Auth::user();
        $disponibilite = Disponibilite::find($disponibilite_id);
        $personne = Personne::where('user_id', $user->id)->get();

        return view('rencontre.rencontre', compact('disponibilite', 'user', 'personne'));
    }    
    public function rencontre(Request $request, $disponibilite)
    {
        try{
            $rencontre = new Rencontre();
            $user = Auth::user();
            $personne = Personne::where('user_id', $user->id)->get();
            $dispo = Disponibilite::find($disponibilite);
            $rencontre->personne_id = $personne[0]->id;
            $rencontre->disponibilite_id = $dispo->id;
            
            // dd($rencontre);
            $rencontre->save();    
            return redirect()->route('home')->with('message', 'Rencontre créer avec succès');        

        }
        catch (\Throwable $e){
            
            // dd($request);

            Log::debug($e);
        }
        // return redirect()->route('jeux.index')->with('message', 'Rencontre créer avec succès');        
    }    
}
