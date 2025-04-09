<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personne;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;




class SuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $this->getSuggestions($request);
    }



    public function getSuggestions(Request $request)
    {
        
        // $user = Auth::user();

        // $personne = $user->personne;

        $user = User::first(); 
        $personne = $user ? $user->personne : null;

      
        
        if (!$personne) {
            return view('suggestion.index')->with('message', 'Vous n\'avez pas encore de hobbies associés.');
        }

        
        $hobbies = $personne->hobbies;

       
        if ($hobbies->isEmpty()) {
            return view('suggestion.index')->with('message', 'Vous n\'avez pas encore de hobbies associés.');
        }

        //whereHas vérifie dans personnes la relation "hobbies"
        $suggestedPersonnes = Personne::whereHas('hobbies', function ($query) use ($hobbies) {
            $query->whereIn('hobby_personne.hobby_id', $hobbies->pluck('id'));
        })
        ->where('id', '!=', $personne->id) 
        ->get();

        foreach ($suggestedPersonnes as $suggestedPersonne) {
            $suggestedPersonne->common_hobbies = $suggestedPersonne->hobbies->intersect($hobbies);
        }
       
        return view('suggestion.index', ['suggestedPersonnes' => $suggestedPersonnes]);

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
