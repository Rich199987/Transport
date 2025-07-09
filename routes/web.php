<?php

use App\Http\Controllers\FastController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/reservations', [FastController::class, 'afficheReservation'])->name('reservations');
Route::get('/reservations', [FastController::class, 'AfficheColis'])->name('reservations.colis');
Route::get('/affiche_etapes', [FastController::class, 'AfficheEtape'])->name('affiche_etapes');
//Route::get('/affiche_etapes', [FastController::class, 'BoutonEtapes'])->name('affiche_etapes');

Route::get('/ajouter', [FastController::class, 'AjoutEtape'])->name('ajouter');
Route::post('/ajouter', [FastController::class, 'Ajouter'])->name('ajouter');

Route::get('/index', [FastController::class, 'accueil'])->name('index');
Route::post('/index', [FastController::class, 'reserver']);

Route::get('/suivi', [FastController::class, 'showTrackingForm'])->name('suivi');
Route::get('/suivi', function () {
    return view('suivi');})->name('suivi');

Route::post('/suivi', [FastController::class, 'suivre'])->name('suivi');

Route::get('/transport', [FastController::class, 'transport'])->name('transport');
Route::get('/logistiques', [FastController::class, 'logistique'])->name('logistiques');

Route::delete('/colis/{id}', [FastController::class, 'destroy'])->name('colis.destroy');
Route::delete('/etapes/{id}', [FastController::class, 'detruire'])->name('etapes.detruire');

Route::post('/etapes/{id}/updateEtape', [FastController::class, 'updateEtape'])->name('etapes.updateEtape');
Route::get('/etapes/{id}/editEtape', [FastController::class, 'editEtape'])->name('editEtape');
