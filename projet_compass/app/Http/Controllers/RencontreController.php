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
    public function rencontre(Request $request, $personne_id, $disponibilite_id)
    {
        dd( $request, $personne_id, $disponibilite_id);
        $rencontre = new Rencontre();
        $rencontre->personne_id = $request->personne_id;
        $rencontre->disponibilite_id = $request->disponibilite_id;
            
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
