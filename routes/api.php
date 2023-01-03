<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\RegistroAdopcionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register',[LoginController::class,'register']);
Route::post('login',[LoginController::class,'login']);
Route::get('mascotas',[MascotaController::class,'listarMascotas']);
Route::post('mascotas-encontrada',[MascotaController::class,'registrar']);
Route::get('mascotas-agregadas/{user_id}',[MascotaController::class,'listarAgregadas']);
Route::get('mascotas-mapa',[MascotaController::class,'listarMapa']);
Route::get('razas',[MascotaController::class,'listarRazas']);
Route::post('mascota-agregar',[MascotaController::class,'registrarMascota']);

Route::get('mascotas/{id}', [MascotaController::class, 'api_show']);
Route::post('adopciones/store', [RegistroAdopcionController::class, 'store']);
