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
              <th>Id</th>
              <th>Nombre</th>
              <th>Raza</th>
              <th>Editar</th>
              <th>Edliminar</th>
            </thead>
            <tbody>
              @foreach ($mascotas as $mascota)
              <tr>
                <th >{{ $mascota->id }}</th>
                <td >{{ $mascota->nombre }}</td>
                <td >{{ $mascota->raza->nombre }}</td>
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
              </tr>
              @endforeach
              
            </tbody>
        </table>
        
    </div>
</div>
@endsection
