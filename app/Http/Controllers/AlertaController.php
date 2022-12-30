<?php

namespace App\Http\Controllers;

use App\Events\AlertamascotaEvent;
use App\Models\Alertamascota;
use App\Models\Mascota;
use Illuminate\Http\Request;

class AlertaController extends Controller
{
    public function index(){
        $notifications = auth()->user()->notifications;
        // return $notificacions;
        return view('mascotas.notifications',compact('notifications'));
    }

    public function store(Request $request){
        $alerta = Alertamascota::create(['latitud' => $request->latitud,'longitud' => $request->longitud,'detalle' => $request->detalle,'mascota_id' => $request->mascota_id]);
        broadcast(new AlertamascotaEvent($alerta))->toOthers();
        return 'Creado con Exito';
    }

    public function create(){
        $mascotas = Mascota::where('duenho_id',auth()->user()->id)->get();
        return view('mascotas.createalerta',compact('mascotas'));
    }
    
    public function notifications(){
        $cantidad = auth()->user()->unreadNotifications->count();
        $contenido = auth()->user()->notifications;
        if($cantidad == 0)
            return ["",$contenido];
        return [$cantidad,$contenido];
    }
}
