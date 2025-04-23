<?php

namespace App\Http\Controllers;
    
use App\Models\Rencontre;
use Illuminate\Http\Request;
use App\Models\Disponibilite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\Personne;

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
        dd( $request, $disponibilite);
        $rencontre = new Rencontre();
        // $rencontre->personne_id = $request->personne_id;
        // $rencontre->disponibilite_id = $request->disponibilite_id;
            
        // try{
        //     $equipe = new Equipe ($request->all());
        //     $equipe->save();
        // }
        // catch (\Throwable $e){
            
            // dump and die
            // dd($request);

            // storage/logs
            // Log::debug($e);
        // }
        // return redirect()->route('jeux.index');        
    }    
}
