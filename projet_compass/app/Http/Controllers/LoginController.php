<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth as Auth;

class LoginController extends Controller
{
    public function getLoginForm() {
        return view('login.login');
    }

    public function login(LoginRequest $request)
    {
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password], $request->connexion)) {
            return redirect()->route('home')->with('message', 'Connexion réussi');
        }
        else {
            // dd($request);
            return redirect()->route('login')->withErrors('Informations Invalides');
        };
       
    }
   


}
