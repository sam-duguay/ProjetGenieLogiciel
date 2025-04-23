<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\PersonnesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\DispoController;
use App\Http\Controllers\RencontreController;

// Route::get('Accueil', [StudentsController::class, 'index'])->name('etudiant.index');

//Route::get('Accueil', [StudentsController::class, 'index'])->name('home');
Route::get('/', [StudentsController::class, 'index'])->name('home');


Route::get('/inscription', function () {
    return view('register.register');
});

// afficher page d'inscription
Route::get('/inscription', 
[RegisterController::class, 'getRegisterForm'])->name('inscription');

//envoyer le formulaire d'inscription
Route::post('register', 
[RegisterController::class, 'register'])->name('register');

Route::get('fillprofile/{id}', 
[PersonnesController::class, 'fillprofile'])->name('fillprofile');

Route::patch('/personnes/{id}/update', 
[PersonnesController::class, 'update'])->name('update');

Route::get('/connexion', 
[LoginController::class, 'getLoginForm'])->name('login');

Route::post('login',
[LoginController::class, 'login'])->name('connexion');

Route::get('/suggestions', [SuggestionController::class, 'index'])->name('suggestion.index');

Route::get('/logout',
[LogOutController::class, 'logout'])->name('logout');

Route::get('/disponibilites', DispoController::class)->name('disponibilites'); 

Route::post('/rencontre', 
[RencontreController::class, 'rencontre'])->name('rencontre'); 
