<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\AlertamascotaEvent;
use App\Models\Alertamascota;
use App\Models\Mascota;
use App\Models\User;
use App\Notifications\AlertamascotaNotification;

class MascotaController extends Controller
{
    public function createAlerta(){
        $mascotas = Mascota::where('duenho_id',auth()->user()->id)->get();
        return view('mascotas.createalerta',compact('mascotas'));
    }

    public function alertaStore(Request $request){
        $alerta = Alertamascota::create(['latitud' => $request->latitud,'longitud' => $request->longitud,'detalle' => $request->detalle,'mascota_id' => $request->mascota_id]);
        broadcast(new AlertamascotaEvent($alerta))->toOthers();
        return 'Creado con Exito';
    }
    
    public function notifications(){
        $cantidad = auth()->user()->unreadNotifications->count();
        $contenido = auth()->user()->notifications;
        // return $contenido->created_at->format('Y-m-d');
        if($cantidad == 0)
            return ["",$contenido];
        return [$cantidad,$contenido];
    }

}
