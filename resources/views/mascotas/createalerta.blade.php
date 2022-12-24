@extends('layouts.index')
@section('title', 'Creando Alerta')

@section('css')
    <link href="{{asset('css/mascotas/createalerta.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div id ="map" class="mapita"> </div>
    <div class="busqueda">
        <form class="formulario" method="POST">
            @csrf
            <input type="text" class="form-control entrada" placeholder="Detalle de la mascota perdida...">
            <div class="div-opciones">
                <select id="elegido" class="custom-select opciones" name="select">
                    <option value="" disabled selected>Seleccione a su mascota perdida...</option>
                    @foreach ($mascotas as $mascota)
                        <option value="{{$mascota->id}}">{{$mascota->nombre}}</option>
                    @endforeach
                </select>
            </div>
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
    <script src="{{asset('js/mascotas/createalerta.js')}}"></script>
@endsection
