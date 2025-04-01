<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;

Route::get('/', function () {
    return view('welcome');
});




Route::get('Accueil', [StudentsController::class, 'index'])->name('etudiant.index');