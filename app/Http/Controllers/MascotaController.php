<?php

namespace App\Http\Controllers;

use App\Models\Alertamascota;
use App\Models\Mascota;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    public function create(){
        return view('mascotas.create');
    }

    public function alertaStore(Request $request){
        // return $request;
        Alertamascota::create([
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
            'detalle' => $request->detalle,
            'mascota_id' => $request->mascota_id,
        ]);
        return 'Creado con Exito';
    }
}
