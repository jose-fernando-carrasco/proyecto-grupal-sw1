<?php

use App\Http\Controllers\AlertaController;
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

Route::post('users/subirFoto', [UserController::class,'subirFoto'])->name('users.subirFoto')->middleware("auth");
Route::resource('users', UserController::class)->except(['edit','destroy', 'index', 'store', 'create'])->middleware("auth");

Route::resource("razas", \App\Http\Controllers\RazaController::class)->middleware("auth");
Route::resource("mascotas", \App\Http\Controllers\MascotaController::class)->middleware("auth");

Route::get('alertas/notifications', [AlertaController::class,'notifications'])->name('alertas.notifications')->middleware("auth");
Route::resource('alertas', AlertaController::class)->except(['edit','destroy','update', 'show'])->middleware("auth");
