<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth as Auth;
use Exception;

class LogOutController extends Controller
{
    public function logout(Request $request) {
        try {
            return redirect('connexion')->with(Auth::logout());
        } catch (Exception $e) {
            return response()->json([
                'status'=>400,
                'errors'=>$e
            ]);
        }
    }

}
