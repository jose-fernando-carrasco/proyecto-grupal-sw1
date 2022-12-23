@extends('layouts.index')
@section('title', 'Creando Alerta')

@section('css')
    <link href="{{asset('css/mascotas/create.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div id ="map" class="mapita"> </div>
    <div class="busqueda">
        <form class="formulario" method="POST">
            @csrf
            <input type="text" class="form-control entrada" placeholder="Detalle de la mascota perdida...">
            <div class="div-button">
                <button type="submit" class="btn btn-primary botoncito">Crear Alerta</button>
            </div>
        </form>
    </div>
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRRNRbdwAPZS6-hW33XJljIbD2228szfg&callback=initMap"></script>
    <script  src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/mascotas/create.js')}}"></script>
@endsection
