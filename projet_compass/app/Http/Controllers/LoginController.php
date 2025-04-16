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
        // dd($request);
        // try {
            // $user = User::query()->where('email',$request->email)->first();

            // if ($user && Hash::check($request->password, $user->password)) {
            //    return redirect()->route('home')->with('success', 'Login successful');
            // } 
            // else {
            //     return redirect()->back()->with('error', 'Invalid credentials');
            // }
            if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
                // dd($request);
                return redirect()->route('home')->with('message', 'Connexion réussi');
            }
            else {
                return redirect()->route('login')->withErrors('message', 'Informations Invalides');
            };          
        // } catch (\Exception $e) {
        //     return response()->json([
        //         'status' => 400,
        //         'errors' => $e
        //     ]);
        // }
    }
   


}
