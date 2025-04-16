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

     //test pour utiliser l'usager authentifier

     
    //  public function index(Request $request)
    // {
    //     // Récupérer les suggestions basées sur les hobbies
    //     $suggestedPersonnes = $this->getSuggestions($request);
    
    //     // Vérifier si aucune suggestion n'est trouvée
    //     if ($suggestedPersonnes === null) {
    //         $message = 'Aucune suggestion de personne basée sur les hobbies disponible.';
    //         $suggestedPersonnes = [];  // Initialiser avec un tableau vide pour éviter une erreur
    //     }
    
    //     // Récupérer les suggestions d'intérêts
    //     $suggestedPersonnesInterets = $this->getSuggestionsInteret($request);
    
    //     // Vérifier si aucune suggestion d'intérêts n'est trouvée
    //     if ($suggestedPersonnesInterets === null) {
    //         $messageInterets = 'Aucune suggestion de personne basée sur les intérêts disponible.';
    //         $suggestedPersonnesInterets = [];  // Initialiser avec un tableau vide pour éviter une erreur
    //     }
    
    //     return view('suggestion.index', [
    //         'suggestedPersonnes' => $suggestedPersonnes,
    //         'suggestedPersonnesInterets' => $suggestedPersonnesInterets,
    //         'message' => isset($message) ? $message : null,  // Passer le message d'erreur si nécessaire
    //         'messageInterets' => isset($messageInterets) ? $messageInterets : null  // Passer le message d'erreur si nécessaire
    //     ]);
    // }

    public function index(Request $request)
    {
        // return $this->getSuggestions($request);

        $suggestedPersonnes = $this->getSuggestions($request);

        $suggestedPersonnesInterets = $this->getSuggestionsInteret($request);

        return view('suggestion.index', [
            'suggestedPersonnes' => $suggestedPersonnes,
            'suggestedPersonnesInterets' => $suggestedPersonnesInterets,
        ]);
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
        
        return $suggestedPersonnes;
     

    }

    //test pour utiliser l'usager authentifier

    // public function getSuggestions(Request $request)
    // {
        
    //     $user = Auth::user();

    //     if (!$user || !$user->personne) {
    //         return null;  // Retourner null si l'utilisateur ou la personne est manquant
    //     }
    
    //     // Récupérer les hobbies de la personne associée à l'utilisateur
    //     $personne = $user->personne;
    //     $hobbies = $personne->hobbies;

       
    //     if ($hobbies->isEmpty()) {
    //         return view('suggestion.index')->with('message', 'Vous n\'avez pas encore de hobbies associés.');
    //     }

    //     //whereHas vérifie dans personnes la relation "hobbies"
    //     $suggestedPersonnes = Personne::whereHas('hobbies', function ($query) use ($hobbies) {
    //         $query->whereIn('hobby_personne.hobby_id', $hobbies->pluck('id'));
    //     })
    //     ->where('id', '!=', $personne->id) 
    //     ->get();

    //     foreach ($suggestedPersonnes as $suggestedPersonne) {
    //         $suggestedPersonne->common_hobbies = $suggestedPersonne->hobbies->intersect($hobbies);
    //     }
        
    //     return $suggestedPersonnes;
     

    // }


    public function getSuggestionsInteret(Request $request)
    {
        
        // $user = Auth::user();

        // $personne = $user->personne;

        $user = User::first(); 
        $personne = $user ? $user->personne : null;

    
        
        if (!$personne) {
            return view('suggestion.index')->with('message', 'Vous n\'avez pas encore d\'interet associés.');
        }

        
        $interets = $personne->interets;

        

        if ($interets->isEmpty()) {
            return view('suggestion.index')->with('message', 'Vous n\'avez pas encore d\'interet associés.');
        }

        //whereHas vérifie dans personnes la relation "hobbies"
        $suggestedPersonnesInterets = Personne::whereHas('interets', function ($query) use ($interets) {
            $query->whereIn('interet_personne.interet_id', $interets->pluck('id'));
        })
        ->where('id', '!=', $personne->id) 
        ->get();

        
        foreach ($suggestedPersonnesInterets as $suggestedPersonneInteret) {
            $suggestedPersonneInteret->common_interets = $suggestedPersonneInteret->interets->intersect($interets);
        }

       
        return $suggestedPersonnesInterets; // Retourne les suggestions
     
    }


    //test pour utiliser l'usager authentifier

    // public function getSuggestionsInteret(Request $request)
    // {
        
    //      $user = Auth::user();

    // // Vérifier si l'utilisateur est bien connecté et si la personne existe
    // if (!$user || !$user->personne) {
    //     return null;  // Retourner null si pas de personne associée à l'utilisateur
    // }

    // // Récupérer les intérêts de la personne associée à l'utilisateur
    // $personne = $user->personne;
    // $interets = $personne->interets;

    //     if ($interets->isEmpty()) {
    //         return view('suggestion.index')->with('message', 'Vous n\'avez pas encore d\'interet associés.');
    //     }

    //     //whereHas vérifie dans personnes la relation "hobbies"
    //     $suggestedPersonnesInterets = Personne::whereHas('interets', function ($query) use ($interets) {
    //         $query->whereIn('interet_personne.interet_id', $interets->pluck('id'));
    //     })
    //     ->where('id', '!=', $personne->id) 
    //     ->get();

        
    //     foreach ($suggestedPersonnesInterets as $suggestedPersonneInteret) {
    //         $suggestedPersonneInteret->common_interets = $suggestedPersonneInteret->interets->intersect($interets);
    //     }

       
    //     return $suggestedPersonnesInterets; // Retourne les suggestions
     
    // }

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
