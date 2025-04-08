<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use App\Models\User;
use App\Models\Personne;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function getRegisterForm() {
        return view('register.register');
    }

    public function register(Request $request)
    {
        // dd($request);
        try {
            $hashedPassword = Hash::make($request->mdp);

            User::insert([
                'email' => $request->email,
                'password' => $hashedPassword
            ]);

            Personne::insert(
                [
                    'nom' => $request->nom,
                    'prenom' => $request->nom,
                    'statut' => 'etudiant',
                    'photo' => '',
                    'age' => 0,
                    'sexe' => '',
                    'discipline_id' => 0,
                    'programme_id' => 0
                ]
                );
            // return response()->json([q
                return redirect()->route('fillprofile')->with('message', 'Ajout avec succès, veuillez remplir votre profil');
            // ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 400,
                'errors' => $e
            ]);
        }
    }
}
