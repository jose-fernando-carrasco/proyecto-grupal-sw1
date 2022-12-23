@extends('layouts.index')
@section('title', 'Creando Alerta')

@section('css')
    <link href="{{asset('css/mascotas/create.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div id ="map" class="mapita"> </div>
    <div class="busqueda">
        <form action="">
            <input type="text" class="form-control entrada" placeholder="Detalle de la mascota perdida...">
            <div class="div-button">
                <button type="submit" class="btn btn-primary botoncito">Crear Alerta</button>
            </div>
        </form>
    </div>
    
@endsection


@section('js')
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRRNRbdwAPZS6-hW33XJljIbD2228szfg&callback=initMap"></script>
    <script>
        var map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -17.795768, lng: -63.167202},
            zoom: 17
            });

            map.addListener("click", (e) => {
                placeMarkerAndPanTo(e.latLng, map);
            });

            function placeMarkerAndPanTo(latLng, map) {
                new google.maps.Marker({
                    position: latLng,
                    map: map,
                });
                map.panTo(latLng);
                console.log(latLng.lat().toFixed(6));
                console.log(latLng.lng().toFixed(6));
            }
        }
    </script>
@endsection
