<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disponibilite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\Personne;

class DispoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $events = [];
        
        $user = Auth::user();

        $personne = Personne::where('user_id', $user->id)->get();

        // $personne_match = Personne::find($request->user_id);
        $personne_match = Personne::find(10);
        $dispos_match = $personne_match->disponibilites;
        
        foreach ($dispos_match as $disponibilite) {
            $events[] = [
                'title' => 'Disponibilité',
                'start' => $disponibilite->startTime,
                'end' => $disponibilite->endTime,
            ];
        }
        
        return view('disponibilites.disponibilites', compact('user', 'events', 'personne', 'dispos_match'));
    }
}
