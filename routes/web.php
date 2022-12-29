<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VacunaController;
use App\Http\Controllers\MascotaController;

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

Route::get('/', function () { return view('auth.login-personalizado'); });
Route::get('/dashboard', function () { return view('layouts.index'); })->middleware(['auth'])->name('dashboard');
require __DIR__.'/auth.php';

// Usuarios
Route::prefix('users')->controller(UserController::class)->group(function () {
    Route::get('show/{user}', 'show')->name('users.show');
    Route::put('update', 'update')->name('users.update');
    Route::post('subirFoto', 'subirFoto')->name('users.subirFoto');
});

Route::resource("razas", \App\Http\Controllers\RazaController::class)->middleware("auth");
Route::resource("mascotas", \App\Http\Controllers\MascotaController::class)->middleware("auth");
// Mascotas
Route::prefix('mascotas')->controller(MascotaController::class)->group(function () {
    Route::get('createAlerta', 'createAlerta')->name('mascotas.createAlerta');
    Route::post('alertaStore', 'alertaStore')->name('mascotas.alertaStore');
    Route::get('notifications', 'notifications')->name('mascotas.notifications');
});
Route::get('mascotas/image-download/{mascota}', [MascotaController::class, 'downloadImage'])->name('mascotas.download.image');
Route::get('vacunas/index/{mascota}', [VacunaController::class, 'index'])->name('vacunas.index');
Route::get('vacunas/create/{mascota}', [VacunaController::class, 'create'])->name('vacunas.create');
Route::post('vacunas/store/{mascota}', [VacunaController::class, 'store'])->name('vacunas.store');
Route::delete('vacunas/destroy/{vacuna}', [VacunaController::class, 'destroy'])->name('vacunas.destroy');