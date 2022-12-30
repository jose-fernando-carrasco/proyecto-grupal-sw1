@extends('layouts.index')
@section('title', 'Mapa Alerta')

@section('css')
<style> 
    #map {
      height: 100%;
      }
  </style> 
@endsection

@section('content')
    <div id ="map"> </div>
@endsection

@section('js')
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRRNRbdwAPZS6-hW33XJljIbD2228szfg&callback=initMap"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/mascotas/mapa-alerta.js')}}"></script>
@endsection