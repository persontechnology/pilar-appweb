<?php

use App\Http\Controllers\CartaController;
use App\Http\Controllers\ComunidadController;
use App\Http\Controllers\GestorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MisNiniosController;
use App\Http\Controllers\NinioController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ResponderCartaController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // Artisan::call('cache:clear');
    // Artisan::call('config:clear');
    // Artisan::call('config:cache');
    // Artisan::call('storage:link');
    // Artisan::call('key:generate');
    // Artisan::call('migrate:fresh --seed');
    return view('welcome');
});




Auth::routes(['register' => false]);




Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::post('validarec', [HomeController::class, 'validarec'])->name('validarec');

    // usuarios
    Route::resource('usuarios', UserController::class);
    // tipos
    Route::resource('tipos', TipoController::class);
    Route::resource('ubicaciones', UbicacionController::class);
    Route::resource('registro', RegistroController::class);
   
    Route::get('registros/obtener-ubicaciones/{id}', [RegistroController::class, 'obtenerUbicaciones'])->name('registros.obtener-ubicaciones');

});