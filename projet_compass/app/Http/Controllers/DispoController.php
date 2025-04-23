<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disponibilite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\Personne;
use Faker\Factory as Faker;

class DispoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $fake = Faker::create();

        $events = [];
        
        $user = Auth::user();

        $personne = Personne::where('user_id', $user->id)->get();

        // $personne_match = Personne::find($request->user_id);
        $personne_match = Personne::find(10);
        $disposMatch = $personne_match->disponibilites;
        
        foreach ($disposMatch as $disponibilite) {
            $events[] = [
                'title' => 'Disponibilité',
                'start' => $disponibilite->startTime,
                'end' => $disponibilite->endTime,
                'id' => $disponibilite->id,
                'url' => '/creer_rencontre'
            ];
        }
        
        $dispoChoisi = 2;

        return view('disponibilites.disponibilites', compact('user', 'events', 'personne', 'disposMatch', 'dispoChoisi'));
    }
}
