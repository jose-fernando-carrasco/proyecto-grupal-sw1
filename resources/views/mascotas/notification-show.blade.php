@extends('layouts.index')
@section('title', 'Notificaciones Show')

@section('css')
  <link rel="stylesheet" href="{{asset('css/mascotas/wanted.css')}}">
@endsection

@section('content')
  <div class="wanted row">
    <div class="col-1"></div>
    <div class="col-4">
        @if ($alerta->data["mascota"]["imagen"] == null)
            <img class="photo" src="{{asset('img/sin-fondo.png')}}" alt="">
        @else
            <img class="photo" src="{{asset($alerta->data["mascota"]["imagen"])}}" alt="">
        @endif
    </div>
    <div class="col-1"></div>
    <div class="col-5 content">
        <h1>Alerta Mascota</h1>
        <h3>Nombre Mascota: {{$alerta->data["mascota"]["nombre"]}}</h3>
        <h3>Raza de Mascota: {{$alerta->data["mascota"]["raza_mascota"]["nombre"]}}</h3>
        @if ($alerta->data["mascota"]["pedigree"])
          <h3>Pedigree de Mascota: Si</h3>
        @else
          <h3>Pedigree de Mascota: No</h3>
        @endif
        <h3>Color: {{$alerta->data["mascota"]["color"]}}</h3>
        <h3>Dueño: {{$alerta->data["duenho"]["name"]}}</h3>
        <img class="photo-duenho" src="{{asset(Auth()->user()->photo)}}">
        <div></div>
        <a href="{{route('alertas.mapa-alerta',$alerta->id)}}" class="btn btn-danger mapa">ver en mapa</a>
    </div>
    <div class="col-1"></div>
  </div>
@endsection