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
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\MessagesController;

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

Route::get('/connexion', 
[LoginController::class, 'getLoginForm'])->name('login');

Route::post('login',
[LoginController::class, 'login'])->name('connexion');

Route::get('/logout',
[LogOutController::class, 'logout'])->name('logout');

Route::middleware(Authenticate::class)->group(function(){
    Route::get('fillprofile/{id}', 
    [PersonnesController::class, 'fillprofile'])->name('fillprofile');

    Route::patch('/personnes/{id}/update', 
    [PersonnesController::class, 'update'])->name('update');

    Route::get('/profilpersonne/{id}/', 
    [PersonnesController::class, 'profilpersonne'])->name('profilpersonne');

    //Route::get('/disponibilites', DispoController::class)->name('disponibilites'); 

    // Route::get('/creerrencontre/{id}', 
    // [RencontreController::class, 'creerrencontre'])->name('creerrencontre'); 

    Route::post('/rencontre/{disponibilite}', 
    [RencontreController::class, 'rencontre'])->name('rencontre'); 

    Route::get('/suggestions', [SuggestionController::class, 'index'])->name('suggestion.index');

    route::middleware(Authenticate::class)->group(function(){
        // Route::get('/messenger', [MessagesController::class, 'index'])->name('messenger');
        Route::get('/messages', [MessagesController::class, 'index'])->name('messages');
        Route::get('/messages/create', [MessagesController::class, 'create'])->name('messages.create');
        Route::get('/messages/create/{match}', [MessagesController::class, 'create_personne'])->name('messages.create.personne');
        Route::post('/messages/create/{match}', [MessagesController::class, 'store'])->name('messages.store');
        Route::get('/messenger/{id}', [MessagesController::class, 'show'])->name('messages.show');
        Route::put('/messenger/{id}', [MessagesController::class, 'update'])->name('messages.update');
    });
});