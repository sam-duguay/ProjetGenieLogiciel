<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\PersonnesController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('welcome');
});




Route::get('Accueil', [StudentsController::class, 'index'])->name('etudiant.index');
Route::get('Accueil', [PersonnesController::class, 'index'])->name('register.register');