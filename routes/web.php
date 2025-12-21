<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiplomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\ContactController;



//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware('auth')->group(function () {
    Route::get('/competences/create', [CompetenceController::class, 'create'])->name('competences.create');
    Route::post('/competences', [CompetenceController::class, 'store'])->name('competences.store');
    Route::get('/competences/{id}/edit', [CompetenceController::class, 'edit'])->name('competences.edit');
    Route::put('/competences/{id}', [CompetenceController::class, 'update'])->name('competences.update');
    Route::delete('/competences/{id}', [CompetenceController::class, 'destroy'])->name('competences.destroy');

    Route::get('/diplomes/create', [DiplomeController::class, 'create'])->name('diplomes.create');
    Route::post('/diplomes', [DiplomeController::class, 'store'])->name('diplomes.store');
    Route::get('/diplomes/{id}/edit', [DiplomeController::class, 'edit'])->name('diplomes.edit');
    Route::put('/diplomes/{id}', [DiplomeController::class, 'update'])->name('diplomes.update');
    Route::delete('/diplomes/{id}', [DiplomeController::class, 'destroy'])->name('diplomes.destroy');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/resumes', [ResumeController::class, 'index'])->name('Resume');
Route::get('/projets', [ProjetController::class, 'index'])->name('projets');
Route::get('/diplomes', [DiplomeController::class, 'index'])->name('diplomes');
Route::get('/competences', [CompetenceController::class, 'index'])->name('competences');
Route::get('/contacts', [ContactController::class, 'index'])->name('contact');