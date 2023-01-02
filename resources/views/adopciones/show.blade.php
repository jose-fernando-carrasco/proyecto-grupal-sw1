@extends('layouts.index')
@section('title', 'Creando Alerta')

@section('css')
    <style>
        img {
            object-fit: cover;
        }	
    </style>
@endsection


@section('content')
   <div class="ml-3 mr-3">
        <div class="row justify-content-center">
            <h1>
                {{$adopcion->mascota->nombre}}
            </h1>
        </div>
        <div class="row align-items-center">
            <div class="col-12 col-md-8 col-sm-8">
                <img
                    class="card-img-top "
                    src="{{$adopcion->mascota->imagen}}"
                    alt="Dog"
                    {{--  width="250px"  --}}
                    height="400px"
                >
            </div>
            <div class="col-12 col-md-8 col-sm-8">
                <div class="row">
                    <div class="card bg-light">
                        <div class="card-header font-weight-bold">Descripción</div>
                        <div class="card-body">
                          <p class="card-text">{{$adopcion->descripcion}}</p>
                        </div>

                        <div class="card-header font-weight-bold ">Más Información y Detalles</div>
                        <div class="card-body">
                            <div class="row ml-2 mr-2">
                                <label for="duenho"><Strong>{{__("Dueño: ")}} </Strong></label>
                                <span id="duenho">{{$adopcion->duenho->name}}</span>
                            </div>
                            <div class="row ml-2 mr-2">
                                <label for="duenho"><Strong>{{__("Raza: ")}} </Strong></label>
                                <span id="duenho">{{$adopcion->mascota->razaMascota->nombre}}</span>
                            </div>
                            <div class="row ml-2 mr-2">
                                <label for="duenho"><Strong>{{__("Edad: ")}} </Strong></label>
                                <span id="duenho">{{$adopcion->mascota->edad.' años' }}</span>
                            </div>
                            <div class="row ml-2 mr-2">
                                <label for="duenho"><Strong>{{__("Color: ")}} </Strong></label>
                                <span id="duenho">{{$adopcion->mascota->color }}</span>
                            </div>
                            <div class="row ml-2 mr-2">
                                <label for="duenho"><Strong>{{__("Pedigree: ")}} </Strong></label>
                                <span id="duenho">{{$adopcion->mascota->pedigree?'Sí':'No' }}</span>
                            </div>
                            <div class="row ml-2 mr-2">
                                <label for="duenho"><Strong>{{__("Dirección: ")}} </Strong></label>
                                <span id="duenho">{{$adopcion->domicilio}}</span>
                            </div>
                          </div>
                      </div>
                </div>
              
            </div>
        </div>
   </div>
@endsection

@section('js')

@endsection
