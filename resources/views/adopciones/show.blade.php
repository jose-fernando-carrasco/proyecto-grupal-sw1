@extends('layouts.index')
@section('title', 'Mascota en adopción')

@section('css')
    <style>
        img {
            object-fit: cover;
        }

        #map {
            height: 400px;
        }
    </style>
@endsection


@section('content')
    <div id="show" class="ml-3 mr-3">
        <div class="row justify-content-center">
            <h1>
                {{ $adopcion->mascota->nombre }}
            </h1>
        </div>
        <div class="row align-items-center">
            <div class="col-12 col-md-4 col-sm-4">
                <img class="card-img-top " src="{{ $adopcion->mascota->imagen }}" alt="Dog" {{-- width="250px" --}}
                    height="400px">
            </div>
            <div class="col-12 col-md-8 col-sm-8">
                <div class="row">
                    <div class="col">
                        <div class="card bg-light">
                            <div class="card-header font-weight-bold">Descripción</div>
                            <div class="card-body">
                                <p class="card-text">{{ $adopcion->descripcion }}</p>
                            </div>

                            <div class="card-header font-weight-bold ">Más Información y Detalles</div>
                            <div class="card-body">
                                <div class="row ml-2 mr-2">
                                    <label for="duenho"><Strong>{{ __('Dueño: ') }} </Strong></label>
                                    <span id="duenho">{{ $adopcion->duenho->name }}</span>
                                </div>
                                <div class="row ml-2 mr-2">
                                    <label for="duenho"><Strong>{{ __('Raza: ') }} </Strong></label>
                                    <span id="duenho">{{ $adopcion->mascota->razaMascota->nombre }}</span>
                                </div>
                                <div class="row ml-2 mr-2">
                                    <label for="duenho"><Strong>{{ __('Edad: ') }} </Strong></label>
                                    <span id="duenho">{{ $adopcion->mascota->edad . ' años' }}</span>
                                </div>
                                <div class="row ml-2 mr-2">
                                    <label for="duenho"><Strong>{{ __('Color: ') }} </Strong></label>
                                    <span id="duenho">{{ $adopcion->mascota->color }}</span>
                                </div>
                                <div class="row ml-2 mr-2">
                                    <label for="duenho"><Strong>{{ __('Pedigree: ') }} </Strong></label>
                                    <span id="duenho">{{ $adopcion->mascota->pedigree ? 'Sí' : 'No' }}</span>
                                </div>
                                <div class="row ml-2 mr-2">
                                    <label for="duenho"><Strong>{{ __('Dirección: ') }} </Strong></label>
                                    <span id="duenho">{{ $adopcion->domicilio }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <div class="card">
                    <div class="card-header font-weight-bold text-center">Ubicación</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div id="map" class="map"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <span id="lat_dom"> {{ $adopcion->latitudDom }}</span>
            <span id="lng_dom"> {{ $adopcion->longitudDom }}</span>
        </div>
    </div>
@endsection

@section('js')
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRRNRbdwAPZS6-hW33XJljIbD2228szfg&callback=initMap"></script>

    <script src="{{ asset('js/adopciones/show.js') }}"></script>
@endsection
