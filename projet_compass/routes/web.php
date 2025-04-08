<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\PersonnesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SuggestionController;
// Route::get('Accueil', [StudentsController::class, 'index'])->name('etudiant.index');

Route::get('Accueil', [StudentsController::class, 'index'])->name('home');
Route::get('/', [StudentsController::class, 'index'])->name('home');


Route::get('/inscription', function () {
    return view('register.register');
});

// afficher page d'inscription
Route::get('/inscription', 
[RegisterController::class, 'getRegisterForm'])->name('register');

//envoyer le formulaire d'inscription
Route::post('register', 
[RegisterController::class, 'register'])->name('register');

Route::get('/connexion', 
[LoginController::class, 'getLoginForm'])->name('login');
Route::post('login',
[LoginController::class, 'login']);


Route::get('/suggestions', [SuggestionController::class, 'index'])->name('suggestion.indexNotification');