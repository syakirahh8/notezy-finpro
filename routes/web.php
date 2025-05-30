<?php

use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Notess
Route::middleware('auth')->group(function () {
   Route::controller(NoteController::class)->group(function() {
     Route::get('/dashboard', 'index')->name('dashboard');
     Route::get('/noteszy/create', 'create')->name('notes.create'); // buat catatan baru
     Route::post('/noteszy/store', 'store')->name('notes.store'); // simpan data note store

     Route::get('/noteszy/{note}', 'show')->name('notes.show'); // lihat detail 1 catatan
     Route::get('/noteszy/{note}/edit', 'edit')->name('notes.edit'); // form edit data
     Route::put('/noteszy/{note}', 'update')->name('notes.update'); // simpan hasil edit

     Route::delete('/noteszy/destroy/{id}', 'destroy')->name('notes.destroy'); // hapus data

     Route::get('/trash', 'trash')->name('notes.trash'); // buang ke trash nya
     Route::get('/notezy/restore/{id}', 'restore')->name('notes.restore'); // untuk restore note yg ga jadi di buang
     Route::delete('/notezy/forceDelete/{id}', 'forceDelete')->name('notes.forceDelete'); // untuk hapus permanen
    
    // Toggle Favorite (POST)
    Route::post('/notezy/{note}/toggle-favorite', 'toggleFavorite')->name('notes.toggleFavorite');

    // Favorites page (GET)
    Route::get('/notezy/favorites', 'favorites')->name('notes.favorites');

}); 
});

