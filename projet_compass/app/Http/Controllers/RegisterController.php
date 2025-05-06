<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use App\Models\User;
use App\Models\Personne;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function getRegisterForm() {
        return view('register.register', [
            'show_sidebar' => false
        ]);
    }

    public function register(RegisterRequest $request)
    {
        // dd($request);
        try {
            $hashedPassword = Hash::make($request->password);

            $user = new User();
            $user->name = $request->nom;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->save();

            $personne = new Personne();
            $personne->user_id = $user->id;
            $personne->nom = $request->nom;
            $personne->prenom = $request->prenom;
            $personne->statut = 'etudiant';
            $personne->photo = '';
            $personne->age = 0;
            $personne->sexe = '';
            $personne->discipline_id = 1;

            $personne->save();

            return redirect()->route('fillprofile', $personne->id)->with('message', 'Ajout avec succès, veuillez remplir votre profil');
        } catch (Exception $e) {
            Log::debug($e);
            return redirect()->back()->withErrors(['Une erreur est survenue lors de la mise à jour.']);
        }
    }
}