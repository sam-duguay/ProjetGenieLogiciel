<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use App\Models\User;
use App\Http\Requests\Api\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        try {

            $hashedPassword = Hash::make($request->password);

            User::insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $hashedPassword
            ]);

            return response()->json([
                'status' => 200
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 400,
                'errors' => $e
            ]);
        }
    }
}
