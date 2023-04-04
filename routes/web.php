<?php

use App\Http\Controllers\GeneroController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('disco' , [\App\Http\Controllers\DiscoController::class, 'index'])
    ->name('disco.index');
Route::get('disco/{id_disco}/show' , [\App\Http\Controllers\DiscoController::class, 'show'])
    ->name('disco.show');
Route::get('disco/{id_artista}/{id_genero}/create' , [\App\Http\Controllers\DiscoController::class, 'create'])
    ->name('disco.create');
Route::post('disco/store' , [\App\Http\Controllers\DiscoController::class, 'store'])
    ->name('disco.store');
Route::get('disco/{id_disco}/{id_artista}/{id_genero}/edit' , [\App\Http\Controllers\DiscoController::class, 'edit'])
    ->name('disco.edit');
Route::patch('disco/{id_disco}/update' , [\App\Http\Controllers\DiscoController::class, 'update'])
    ->name('disco.update');

Route::get('artista' , [\App\Http\Controllers\ArtistaController::class, 'index'])
    ->name('artista.index');
Route::get('artista/create' , [\App\Http\Controllers\ArtistaController::class, 'create'])
    ->name('artista.create');
Route::post('artista/store' , [\App\Http\Controllers\ArtistaController::class, 'store'])
    ->name('artista.store');
Route::get('artista/{id_artista}/edit' , [\App\Http\Controllers\ArtistaController::class, 'edit'])
    ->name('artista.edit');
Route::patch('artista/{id_artista}/update' , [\App\Http\Controllers\ArtistaController::class, 'update'])
    ->name('artista.update');
Route::get('artista/{id_artista}/show' , [\App\Http\Controllers\ArtistaController::class, 'show'])
    ->name('artista.show');

Route::get('musica' , [\App\Http\Controllers\MusicaController::class, 'index'])
    ->name('musica.index');
Route::get('musica/{id_disco}/create' , [\App\Http\Controllers\MusicaController::class, 'create'])
    ->name('musica.create');
Route::post('musica/store' , [\App\Http\Controllers\MusicaController::class, 'store'])
    ->name('musica.store');
Route::get('musica/{id_disco}/edit' , [\App\Http\Controllers\MusicaController::class, 'edit'])
    ->name('musica.edit');
Route::patch('musica/{id_musica}/update' , [\App\Http\Controllers\MusicaController::class, 'update'])
    ->name('musica.update');
Route::get('musica/{id_musica}/show' , [\App\Http\Controllers\MusicaController::class, 'show'])
    ->name('musica.show');

Route::get('genero' , [\App\Http\Controllers\GeneroController::class, 'index'])
    ->name('genero.index');
Route::get('genero/{id_genero}/show' , [\App\Http\Controllers\GeneroController::class, 'show'])
    ->name('genero.show');
