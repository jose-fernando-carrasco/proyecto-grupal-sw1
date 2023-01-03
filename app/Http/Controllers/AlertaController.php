<?php

namespace App\Http\Controllers;

use App\Events\AlertamascotaEvent;
use App\Models\Alertamascota;
use App\Models\Mascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class AlertaController extends Controller
{
    public function index(){
        auth()->user()->unreadNotifications->markAsRead();
        $notifications = auth()->user()->notifications;
        // return $notifications;
        return view('mascotas.notifications',compact('notifications'));
    }

    public function update2(Request $request){
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
        $contenido = auth()->user()->unreadNotifications;
        if($cantidad == 0)
            return ["",$contenido];
        return [$cantidad,$contenido];
    }

    public function show($alerta_id){
        // return $alerta_id; 4fc38815-718c-4017-963e-be70f39a139f
        $alerta = auth()->user()->notifications->where('id',$alerta_id)->first();
        $alerta->markAsRead();
        // return $alerta;
        return view('mascotas.notification-show',compact('alerta'));
    }


    public function mapa_alerta($alerta_id){
        $alerta = auth()->user()->notifications->where('id',$alerta_id)->first();
        return view('mascotas.mapa-alerta',compact('alerta'));
    }

}
