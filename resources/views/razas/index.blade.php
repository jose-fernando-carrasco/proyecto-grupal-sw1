@extends('layouts.index')
@section('title', 'Perfil Usuario')

@section('css')
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        {{ __('Razas') }}
    </div>
    <div class="card-body">
        <a href="{{ route("razas.create") }}" class="btn btn-primary">
            {{ __("Crear un nuevo raza") }}
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
              <th>Editar</th>
              <th>Edliminar</th>
            </thead>
            <tbody>
              @foreach ($razas as $raza)
              <tr>
                <th >{{ $raza->id }}</th>
                <td >{{ $raza->nombre }}</td>
                <td>
                    <a href="{{ route("razas.edit", ["raza" => $raza]) }}" class="btn btn-info">{{ __("Editar") }}
                    </a>
                </td>
                <td>
                    <form class="inline" method="POST" action="{{ route("razas.destroy", ["raza" => $raza]) }}">
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
