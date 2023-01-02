@extends('layouts.index')
@section('title', 'mascotas en adopcione')

@section('css')
<script async defer src="https://unpkg.com/alpinejs@3.10.5/dist/cdn.min.js"></script>

<style>
    #map {
        height: 90%;
    }


    img {
        object-fit: cover !important;
    }

</style>
@endsection


@section('content')
<div
  x-data="adopciones"
  {{--  x-init="$watch('id_mascota', value => {
        setMascota(value)
  })"  --}}
  id="adopciones"
  class="card"
>
    
    <div class="card-header">
        {{ __("Poner en Adopción") }}
    </div>
    <div  class="card-body p-2" >
        
        @if ($errors->any())
                <div class="alert alert-danger" >
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
        @endif
        <div class="m-4">
            <form  @submit.prevent="sendForm" method="POST" action="#"  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-4">
                        {{--  <span x-text="id_mascota"></span>
                        <span x-text="mascota.nombre"></span>  --}}
                        <div class="col-sm-10">
                            <label for="mascota" class="col-sm-12 col-form-label"><strong>{{ __("Mascotas:") }}</strong> </label>
                            <select x-model="id_mascota" id="mascota" name="mascota" class="custom-select">
                                <option selected>Seleccione una opción</option>
                                @foreach ($mascotas as $mascota)
                                    <option value="{{ $mascota->id }}">{{ $mascota->nombre }}</option>
                                @endforeach
                            </select>
                            <div class="card m-2" style="width: 17rem;">
                                <img
                                    class="card-img-top"
                                    {{--  src="https://2.bp.blogspot.com/-DvqWIDQO5-k/T3dasQybrUI/AAAAAAAAAW8/yQ3h12gqCq8/s1600/20120313-_MG_8181.jpg"  --}}
                                    :src="mascota.photo"
                                    alt="Dog"
                                    {{--  width="250px"  --}}
                                    height="200px"
                                >                    
                                <div class="card-body">
                                    <h4 x-text="mascota.nombre" class="card-title"></h5>
                                    {{--  <h6 class="card-subtitle mb-2 text-muted">raza</h6>  --}}
                                  
                                    <p id="duenho" class="card-text h6">  
                                        Dueño: <span x-text="mascota.duenho" for="duenho"></span>
                                    </p>
                                    <p id="raza" class="card-text h6">  
                                        Raza: <span x-text="mascota.raza" for="raza"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-8">
                        <label for="map"><strong>Seleccione la ubicación de la mascota: </strong></label>
                        {{--  mapa de google maps  --}}
                        <div id="map" class="map"></div>
                    </div>
                    {{--  <div class="col-4">
                        <label for="color" class="col-sm-12 col-form-label">{{ __("Color") }} :</label>
                        <div class="col-sm-10">
                            <input type="color" id="color" name="color" value="{{ old("color", $mascota->color) }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="edad" class="col-sm-12 col-form-label">{{ __("Edad") }} :</label>
                        <div class="col-sm-10">
                            <input type="text" id="edad" name="edad" value="{{ old("edad", $mascota->edad) }}" class="form-control">
                        </div>
                    </div>  --}}
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="descripcion" class="col-sm-12 col-form-label"><strong>{{ __("Descripción de la mascota") }} :</strong></label>
                        <div class="col-sm-10">
                            <textarea x-model="description" id="descripcion" name="descripcion" class="form-control" required>{{ old("descripcion", '') }}</textarea>
                        </div>
                    </div>
                    <div class="col-8">
                        <label for="domicilio" class="col-sm-12 col-form-label"><strong>{{ __("Dirección y detalles") }} :</strong></label>
                        <div class="">
                            <textarea x-model="direction" id="domicilio" name="domicilio" class="form-control" required>{{ old("domicilio", '') }}</textarea>
                        </div>
                    </div>
             
                </div>
                <button type="submit" class="btn btn-primary mb-3 mt-3">{{__("Poner en adopción")}}</button>
            </form>
        </div>
        
        
    </div>
  </div>
@endsection

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRRNRbdwAPZS6-hW33XJljIbD2228szfg&callback=initMap"></script>
<script  src="{{asset('js/adopciones/crear.js')}}"></script>

@endsection
