@extends('layouts.index')
@section('title', 'Notificaciones')

@section('css')
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        {{ __('Alertas de Mascotas') }}
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
              <th>Tipo</th>
              <th>Mascota</th>
              <th>Dueño</th>
              <th>Ver</th>
              <th>Edliminar</th>
            </thead>
            <tbody>
              @foreach ($notifications as $notification)
                <tr>
                    <th>{{auth()->user()->getTipo($notification->type)}}</th>
                    <td>{{$notification->data["mascota"]["nombre"]}}</td>
                    <td>{{$notification->data["duenho"]["name"]}}</td>
                    <td>
                        <a href="{{route('alertas.show',$notification->id)}}" class="btn btn-info">{{__("ver")}}</a>
                    </td>
                    <td>
                        {{-- <form class="inline" method="POST" action="">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">{{ __("Eliminar") }}
                            </button>
                        </form> --}}
                    </td>
                </tr>
              @endforeach
              
            </tbody>
        </table>
        
    </div>
</div>
@endsection