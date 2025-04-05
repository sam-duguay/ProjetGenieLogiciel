<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use App\Models\User;
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

            // return response()->json([q
                return redirect()->route('login')->with('message', 'Ajout avec succès, veuillez vous connecter');
            // ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 400,
                'errors' => $e
            ]);
        }
    }
}
