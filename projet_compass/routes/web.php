<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\PersonnesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

// Route::get('Accueil', [StudentsController::class, 'index'])->name('etudiant.index');

Route::get('Accueil', [StudentsController::class, 'index'])->name('home');
Route::get('/', [StudentsController::class, 'index'])->name('home');


Route::get('/inscription', function () {
    return view('register.register');
});

// afficher page d'inscription
Route::get('/inscription', 
[RegisterController::class, 'getRegisterForm'])->name('register');

Route::get('/connexion', 
[LoginController::class, 'getLoginForm'])->name('login');
