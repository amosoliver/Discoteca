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
    return view('layout.welcome');
});

Route::get('user/create' , [\App\Http\Controllers\AuthController::class, 'create'])
    ->name('user.create');
Route::post('user/store' , [\App\Http\Controllers\AuthController::class, 'store'])
    ->name('user.store');
Route::get('user/login' , [\App\Http\Controllers\AuthController::class, 'login'])
    ->name('user.login');
Route::post('user/autenticar' , [\App\Http\Controllers\AuthController::class, 'autenticar'])
    ->name('user.autenticar');
    Route::get('user/logout' , [\App\Http\Controllers\AuthController::class, 'logout'])
    ->name('user.logout');

    Route::get('trocar-senha/{id}', [\App\Http\Controllers\AuthController::class, 'trocarSenhaForm'])->name('user.trocar.senha.get');

    Route::post('/trocar-senha/{id}', [\App\Http\Controllers\AuthController::class,'trocarSenha'])->name('user.trocar.senha.post');

    Route::get('enviar-email', [\App\Http\Controllers\AuthController::class,'enviarEmailForm'])->name('user.enviar_email');

    Route::post('enviar-email', [\App\Http\Controllers\AuthController::class, 'enviarEmail'])->name('user.store_email');




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
Route::delete('artista/{id_artista}/destroy' , [\App\Http\Controllers\ArtistaController::class, 'destroy'])
    ->name('artista.destroy');

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
    Route::get('genero/{id_genero}/edit' , [\App\Http\Controllers\GeneroController::class, 'edit'])
    ->name('genero.edit');
    Route::get('genero/create' , [\App\Http\Controllers\GeneroController::class, 'create'])
    ->name('genero.create');
    Route::get('genero/create' , [\App\Http\Controllers\GeneroController::class, 'create'])
    ->name('genero.create');
Route::post('genero/store' , [\App\Http\Controllers\GeneroController::class, 'store'])
    ->name('genero.store');
Route::patch('genero/{id_genero}/update' , [\App\Http\Controllers\GeneroController::class, 'update'])
    ->name('genero.update');
