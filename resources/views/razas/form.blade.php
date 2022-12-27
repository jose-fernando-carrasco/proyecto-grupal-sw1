@extends('layouts.index')
@section('title', 'Perfil Usuario')

@section('css')
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        {{ $title }}
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
            <form  method="POST" action="{{ $action }}">
                @csrf
                @if($raza->id)
                    @method("PUT")
                @endif
                <div class="mb-3 row">
                    <label for="nombre" class="col-sm-2 col-form-label">{{ __("Nombre") }}</label><br>
                    <div class="col-sm-10">
                        <input type="text" id="nombre" name="nombre" value="{{ old("nombre", $raza->nombre) }}" class="form-control">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-3">{{ $title }}</button>
            </form>
        </div>
        
        
    </div>
  </div>
    
@endsection
