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
    <h1 class="d-flex flex-wrap justify-content-start">
        
        {{--  @foreach ($adopciones as $adopcion)  --}}
        @foreach($adopciones as $adopcion)
            <div class="card m-2" style="width: 14rem;">
                <img
                    class="card-img-top "
                    src="{{$adopcion->mascota->imagen}}"
                    alt="Dog"
                    {{--  width="250px"  --}}
                    height="200px"
                >                    
                <div class="card-body">
                    <h4 class="card-title">{{$adopcion->mascota->nombre}}</h5>
                    {{--  <h6 class="card-subtitle mb-2 text-muted">raza</h6>  --}}
                    <p class="card-text h6">
                        {{ substr($adopcion->descripcion, 0, 100) }}
                        ...
                    </p>
                    {{--  <a href="" class="card-link">Ver</a>  --}}
                   <a href="{{route('adopciones.show', $adopcion->id)}}"
                        class="text-white">
                        <button class="btn btn-primary">
                           Ver más detalles
                        </button>
                    </a>
                </div>
            </div>
        @endforeach

    </h1>
@endsection

@section('js')

@endsection
