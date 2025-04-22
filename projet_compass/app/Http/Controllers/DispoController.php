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
 
        foreach ($disponibilites as $disponibilite) {
            $events[] = [
                'title' => 'Disponibilité',
                'start' => $disponibilite->startTime,
                'end' => $disponibilite->endTime,
            ];
        }
 
        return view('disponibilites.disponibilites', compact('events'));
    }
}
