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
            <form  method="POST" action="{{ $action }}"  enctype="multipart/form-data">
                @csrf
                @if($mascota->id)
                    @method("PUT")
                @endif

                <div class="mb-3 row">
                    <label for="nombre" class="col-sm-2 col-form-label">{{ __("Nombre") }} :</label><br>
                    <div class="col-sm-10">
                        <input type="text" id="nombre" name="nombre" value="{{ old("nombre", $mascota->nombre) }}" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="color" class="col-sm-12 col-form-label">{{ __("Color") }} :</label>
                        <div class="col-sm-10">
                            <input type="text" id="color" name="color" value="{{ old("color", $mascota->color) }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="edad" class="col-sm-12 col-form-label">{{ __("Edad") }} :</label>
                        <div class="col-sm-10">
                            <input type="text" id="edad" name="edad" value="{{ old("edad", $mascota->edad) }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="pedigree" class="col-sm-12 col-form-label">{{ __("Pedigree") }} :</label>
                        <div class="col-sm-10">
                            <select id="pedigree" name="pedigree" class="custom-select">
                                <option selected>Seleccione una opción</option>
                                <option {{ (int) old("pedigree", $mascota->pedigree) === 0 ? 'selected' : '' }} value="0">No</option>
                                <option {{ (int) old("pedigree", $mascota->pedigree) === 1 ? 'selected' : '' }} value="1">Si</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 custom-file">
                        <label for="imagen" class="col-sm-12 col-form-label">{{ __("Imagen") }} :</label>
                        <div class="col-sm-10">
                            <input type="file" id="imagen" name="imagen" class="form-control" >
                            <label class="custom-file-label" for="imagen">{{ $mascota->imagen }}</label>
                        </div>
                      
                    </div>
                    <div class="col-4">
                        <label for="duenho_id" class="leading-7 text-sm text-gray-600">{{ __("Dueño") }} :</label>
                        <select id="duenho_id" name="duenho_id" class="custom-select">
                            <option selected>Seleccione una opción</option>
                            @foreach(\App\Models\User::get() as $duenho)
                                <option {{ (int) old("duenho_id", $mascota->duenho_id) === $duenho->id ? 'selected' : '' }} value="{{ $duenho->id }}">{{ $duenho->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="raza_id" class="leading-7 text-sm text-gray-600">{{ __("Raza") }} :</label>
                        <select id="raza_id" name="raza_id" class="custom-select">
                            <option selected>Seleccione una opción</option>
                            @foreach(\App\Models\Raza::get() as $raza)
                                <option {{ (int) old("raza_id", $mascota->raza_id) === $raza->id ? 'selected' : '' }} value="{{ $raza->id }}">{{ $raza->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                </div>
                <button type="submit" class="btn btn-primary mb-3 mt-3">{{ $title }}</button>
            </form>
        </div>
        
        
    </div>
  </div>
    
@endsection
