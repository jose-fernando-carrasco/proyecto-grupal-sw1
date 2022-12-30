@extends('layouts.index')
@section('title', 'Vacunas')

@section('css')
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        {{ __('Vacunas de ') .$mascota->nombre}}
    </div>
    <div class="card-body">
        <a href="{{ route("vacunas.create",$mascota) }}" class="btn btn-primary">
            {{ __("Crear un nueva vacuna") }}
        </a>
            @if (session()->has("success"))
                <div class="alert alert-success" role="alert">
                    {{ session("success") }}
                </div>
            @endif
        <table class="table">
            <thead>
              <th>Id</th>
              <th>Tipo Vacuna</th>
              <th>Detalle</th>
              <th>Eliminar</th>
            </thead>
            <tbody>
              @foreach ($vacunas as $vacuna)
              <tr>
                
                <th >{{ $vacuna->id }}</th>
                <td >{{ $vacuna->tipo_vacuna }}</td>
                <td >{{ $vacuna->detalle }}</td>
                
                <td>
                    <form class="inline" method="POST" action="{{ route("vacunas.destroy", ["vacuna" => $vacuna]) }}">
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
