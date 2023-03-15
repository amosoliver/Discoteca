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
Route::get('disco/{id_artista}/create' , [\App\Http\Controllers\ArtistaController::class, 'create'])
    ->name('disco.create');
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
Route::get('genero' , [\App\Http\Controllers\GeneroController::class, 'index'])
    ->name('genero.index');
