<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiplomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\ResumeController;



// Remplacez par la nouvelle route
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/projets', [ProjetController::class, 'index'])->name('projets');

Route::get('/resume', [App\Http\Controllers\ResumeController::class, 'index'])->name('Resume');

// Routes pour les diplomes
Route::get('/diplomes', [App\Http\Controllers\DiplomeController::class, 'index'])->name('diplomes.index');
Route::get('/diplomes/create', [App\Http\Controllers\DiplomeController::class, 'create'])->name('diplomes.create');
Route::post('/diplomes', [App\Http\Controllers\DiplomeController::class, 'store'])->name('diplomes.store');
Route::get('/diplomes/{id}', [App\Http\Controllers\DiplomeController::class, 'show'])->name('diplomes.show');
// Routes pour les autres actions (edit, update, destroy) peuvent être ajoutées ici
Route::get('/diplomes/{id}/edit', [App\Http\Controllers\DiplomeController::class, 'edit'])->name('diplomes.edit');
Route::put('/diplomes/{id}', [App\Http\Controllers\DiplomeController::class, 'update'])->name('diplomes.update');
Route::delete('/diplomes/{id}', [App\Http\Controllers\DiplomeController::class, 'destroy'])->name('diplomes.destroy');
// Vous pouvez ajouter des routes pour les compétences de manière similaire utilisable pour CRD sortir en API
/*Route::resource('/competences', App\Http\Controllers\CompetenceController::class);
Route::resource('/diplomes', App\Http\Controllers\DiplomeController::class);// Utilisation de resource pour générer toutes les routes CRUD automatiquement
Route::resource('/projets', Appdestroy\Http\Controllers\ProjetController::class);
*/
// Vous pouvez ajouter des routes pour les compétences de manière similaire
Route::get('/diplomes/asign-competences/{id}', [App\Http\Controllers\DiplomeController::class, 'assignCompetencesForm'])->name('diplomes.assignCompetencesForm');
Route::post('/diplomes/asign-competences/{id}', [App\Http\Controllers\DiplomeController::class, 'assignCompetences'])->name('diplomes.assignCompetences');

// Routes pour les compétences
Route::get('/competences', [App\Http\Controllers\CompetenceController::class, 'index'])->name('competence');
Route::get('/competences/create', [App\Http\Controllers\CompetenceController::class, 'create'])->name('competences.create');
Route::post('/competences', [App\Http\Controllers\CompetenceController::class, 'store'])->name('competences.store');
Route::get('/competences/{id}', [App\Http\Controllers\CompetenceController::class, 'show'])->name('competences.show');
Route::get('/competences/{id}/edit', [App\Http\Controllers\CompetenceController::class, 'edit'])->name('competences.edit');
Route::put('/competences/{id}', [App\Http\Controllers\CompetenceController::class, 'update'])->name('competences.update');
Route::delete('/competences/{id}', [App\Http\Controllers\CompetenceController::class, 'destroy'])->name('competences.destroy'); 
// Vous pouvez ajouter des routes pour les autres entités de manière similaire
Route::get('/competences/asign-diplomes/{id}', [App\Http\Controllers\CompetenceController::class, 'assignDiplomesForm'])->name('competences.assignDiplomesForm');
Route::post('/competences/asign-diplomes/{id}', [App\Http\Controllers\CompetenceController::class, 'assignDiplomes'])->name('competences.assignDiplomes');
