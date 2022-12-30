<?php

use App\Http\Controllers\AlertaController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacunaController;

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

Route::post('users/subirFoto', [UserController::class,'subirFoto'])->name('users.subirFoto')->middleware("auth");
Route::resource('users', UserController::class)->except(['edit','destroy', 'index', 'store', 'create'])->middleware("auth");

Route::resource("razas", \App\Http\Controllers\RazaController::class)->middleware("auth");
Route::resource("mascotas", \App\Http\Controllers\MascotaController::class)->middleware("auth");
// Mascotas
Route::get('mascotas/image-download/{mascota}', [MascotaController::class, 'downloadImage'])->name('mascotas.download.image');
Route::get('vacunas/index/{mascota}', [VacunaController::class, 'index'])->name('vacunas.index');
Route::get('vacunas/create/{mascota}', [VacunaController::class, 'create'])->name('vacunas.create');
Route::post('vacunas/store/{mascota}', [VacunaController::class, 'store'])->name('vacunas.store');
Route::delete('vacunas/destroy/{vacuna}', [VacunaController::class, 'destroy'])->name('vacunas.destroy');

Route::get('alertas/notifications', [AlertaController::class,'notifications'])->name('alertas.notifications')->middleware("auth");
Route::resource('alertas', AlertaController::class)->except(['edit','destroy','update', 'show'])->middleware("auth");
