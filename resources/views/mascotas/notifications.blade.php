@extends('layouts.index')
@section('title', 'Notificaciones')

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
              <th>Tipo</th>
              <th>Mascota</th>
              <th>Dueño</th>
              <th>Editar</th>
              <th>Edliminar</th>
            </thead>
            <tbody>
              @foreach ($notifications as $notification)
              <tr>
                <th>{{ auth()->user()->getTipo($notification->type) }}</th>
                <td>{{ $notification->data["mascota"]->mascota["id"]}}</td>
                <td>Hola</td>
                <td>
                    <a href="" class="btn btn-info">{{ __("Editar") }}</a>
                </td>
                <td>
                    <form class="inline" method="POST" action="">
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