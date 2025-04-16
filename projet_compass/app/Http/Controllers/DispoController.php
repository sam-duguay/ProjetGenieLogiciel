<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disponibilite;

class DispoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $events = [];
 
        $disponibilites = Disponibilite::all();
 
        // foreach ($disponibilites as $disponibilite) {
        //     $events[] = [
        //         'date' => $disponibilite->date,
        //         'heure' => $disponibilite->heure
        //     ];
        // }
 
        return view('disponibilites.disponibilites', compact('disponibilites'));
    }
}
