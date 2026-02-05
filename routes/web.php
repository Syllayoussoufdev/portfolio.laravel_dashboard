<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\DiplomeController;
use App\Http\Controllers\Admin\CompetenceController;
use App\Http\Controllers\Admin\MessagesController;  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\ResumeController;    
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
    
});
// Ce groupe garantit que SEUL l'admin connecté accède à ces routes
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('Competences', CompetenceController::class);
    // Cette ligne unique crée les 7 routes pour le CRUD des expériences !
    Route::resource('experiences', ExperienceController::class);
    Route::resource('/messages', MessagesController::class);
     // Cette ligne unique crée les 7 routes pour le CRUD des projets !
    Route::resource('projects', ProjetController::class);
    
    // Tu feras la même chose pour diplômes plus tard
    Route::resource('diplomes', DiplomeController::class);
});

Route::view('/', 'portfolio.Home')->name('home');
//Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/resumes', [ResumeController::class, 'index'])->name('Resume');
Route::get('/projets', [ProjetController::class, 'index'])->name('projets');
Route::get('/projects/{slug}', [ProjetController::class, 'show'])->name('projects.show');
//Route::get('/diplomes', [Diplome::class, 'index'])->name('diplomes');
//Route::get('/competences', [CompetenceController::class, 'index'])->name('competences');
Route::get('/contacts', [ContactController::class, 'index'])->name('contact');
Route::post('/contacts', [ContactController::class, 'store'])->name('Mesage.store');