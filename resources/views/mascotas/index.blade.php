@extends('layouts.index')
@section('title', 'Mascotas')

@section('css')
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        {{ __('Mascotas') }}
    </div>
    <div class="card-body">
        <a href="{{ route("mascotas.create") }}" class="btn btn-primary">
            {{ __("Crear un nueva mascota") }}
        </a>
            @if (session()->has("success"))
                <div class="alert alert-success" role="alert">
                    {{ session("success") }}
                </div>
            @endif
        <table class="table">
            <thead>
                <th>Imagen</th>
              <th>Id</th>
              <th>Nombre</th>
              <th>Raza</th>
              <th>Pedigree</th>
              <th>Editar</th>
              <th>Eliminar</th>
              <th>Vacuna</th>
            </thead>
            <tbody>
              @foreach ($mascotas as $mascota)
              <tr>
                <th>
                    <figure class="figure">
                        <img  src="{{asset($mascota->imagen)}}" class="figure-img img-fluid rounded" alt="..."  style="width: 70px; height: 70px;">
                        <figcaption class="figure-caption">{{ $mascota->nombre }}</figcaption>
                      </figure>
                </th>
                <th >{{ $mascota->id }}</th>
                <td >{{ $mascota->nombre }}</td>
                <td >{{ $mascota->razaMascota->nombre }}</td>
                <td>
                    {{ $mascota->pedigree == 1 ? 'Si' : 'No'}}
                </td>
                <td>
                    <a href="{{ route("mascotas.edit", ["mascota" => $mascota]) }}" class="btn btn-info">{{ __("Editar") }}
                    </a>
                </td>
                <td>
                    <form class="inline" method="POST" action="{{ route("mascotas.destroy", ["mascota" => $mascota]) }}">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger">{{ __("Eliminar") }}
                        </button>
                    </form>
                </td>
                <td>
                    <a href="{{ route("vacunas.index", ["mascota" => $mascota]) }}" class="btn btn-info">{{ __("Vacunas") }}
                    </a>
                </td>
              </tr>
              @endforeach
              
            </tbody>
        </table>
        
    </div>
</div>
@endsection
