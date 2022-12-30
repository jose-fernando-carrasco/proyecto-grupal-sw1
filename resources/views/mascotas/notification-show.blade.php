@extends('layouts.index')
@section('title', 'Notificaciones Show')

@section('css')
  <link rel="stylesheet" href="{{asset('css/mascotas/wanted.css')}}">
@endsection

@section('content')
  <div class="wanted row">
    <div class="col-1"></div>
    <div class="col-4">
        <img class="photo" src="https://c8.alamy.com/compes/ja6jfc/cool-boxer-perro-pug-permanente-punetazos-con-guantes-de-boxeo-de-cuero-rojo-y-shorts-aislado-sobre-fondo-blanco-ja6jfc.jpg" alt="">
    </div>
    <div class="col-1"></div>
    <div class="col-5 content">
        <h1>Alerta Mascota</h1>
        <h3>Nombre Mascota: {{$alerta->data["mascota"]["nombre"]}}</h3>
        <h3>Raza de Mascota: Boxer</h3>
        <h3>Pedigree de Mascota: Si</h3>
        <h3>Color: {{$alerta->data["mascota"]["color"]}}</h3>
        <h3>Dueño: {{$alerta->data["duenho"]["name"]}}</h3>
        <img class="photo-duenho" src="{{asset(Auth()->user()->photo)}}">
        <div></div>
        <a href="{{route('alertas.mapa-alerta')}}" class="btn btn-danger mapa">ver en mapa</a>
    </div>
    <div class="col-1"></div>
  </div>
@endsection