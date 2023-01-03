<?php

namespace App\Http\Controllers;

use App\Events\AlertamascotaEvent;
use App\Models\Alertamascota;
use App\Models\Mascota;
use App\Models\PushNotification;
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

        $mascota = Mascota::where('id',$request->mascota_id)->first();
        $comment = new PushNotification();
        $comment->title = 'Mascota Perdida';
        $comment->body = $mascota->nombre.' raza '.$mascota->razaMascota->nombre;
        $comment->img = $mascota->imagen;
        $comment->save();

        // return $comment;

        $url = 'https://fcm.googleapis.com/fcm/send';
        $dataArr = array('click_action' => 'FLUTTER_NOTIFICATION_CLICK', 'id' => $request->id,'status'=>"done");
        $notification = array('title' =>$comment->title, 'body' => $comment->body, 'image'=> $comment->img, 'sound' => 'default', 'badge' => '1',);
        $arrayToSend = array('to' => "/topics/all", 'notification' => $notification, 'data' => $dataArr, 'priority'=>'high');
        $fields = json_encode ($arrayToSend);
        $headers = array (
            'Authorization: key=' . "AAAAAPFo8fE:APA91bEBx29a68ogz_3MGz-ARdHbe9Qe1_zm1m_6jxdv4ESqjHGWRbcM23kkCC1N9W8nDW3z30klPP_katydeKqvxd3duef8jETq85NWRuApx9aeAbjOwMddqXfMrIhNheHwUEUck1VB",
            'Content-Type: application/json'
        );

        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, true );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

        $result = curl_exec ( $ch );
        //var_dump($result);
        curl_close ( $ch );
        
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
