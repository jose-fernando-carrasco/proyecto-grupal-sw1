<?php

use App\Http\Controllers\MascotaController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () { return view('auth.login-personalizado'); });
Route::get('/dashboard', function () { return view('layouts.index'); })->middleware(['auth'])->name('dashboard');
require __DIR__.'/auth.php';

// Usuarios
Route::prefix('users')->controller(UserController::class)->group(function () {
    Route::get('show/{user}', 'show')->name('users.show');
    Route::put('update', 'update')->name('users.update');
    Route::post('subirFoto', 'subirFoto')->name('users.subirFoto');
});

// Mascotas
Route::prefix('mascotas')->controller(MascotaController::class)->group(function () {
    Route::get('createAlerta', 'createAlerta')->name('mascotas.createAlerta');
    Route::post('alertaStore', 'alertaStore')->name('mascotas.alertaStore');
    Route::get('notifications', 'notifications')->name('mascotas.notifications');
});