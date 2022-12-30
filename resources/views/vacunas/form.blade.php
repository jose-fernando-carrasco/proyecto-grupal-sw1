@extends('layouts.index')
@section('title', 'Vacunas')

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
                <input type="hidden" name="mascota_id" id="mascota_id" value="{{ $mascota->id }}">
                <div class="row">
                    
                    <div class="col-4">
                        <label for="tipo_vacuna" class="leading-7 text-sm text-gray-600">{{ __("Raza") }} :</label>
                        <select id="tipo_vacuna" name="tipo_vacuna" class="custom-select">
                            <option selected>Seleccione una opción</option>
                            <option {{ (int) old("tipo_vacuna") === "Vacuna contra el distemper" ? 'selected' : '' }} value="Vacuna contra el distemper">Vacuna contra el distemper</option>
                            <option {{ (int) old("tipo_vacuna") === "Vacuna contra parvovirus" ? 'selected' : '' }} value="Vacuna contra parvovirus">Vacuna contra parvovirus</option>
                            <option {{ (int) old("tipo_vacuna") === "Vacuna contra la hepatitis infecciosa canina o adenovirus canino 2 (AVC-2)" ? 'selected' : '' }} value="Vacuna contra la hepatitis infecciosa canina o adenovirus canino 2 (AVC-2)">Vacuna contra la hepatitis infecciosa canina o adenovirus canino 2 (AVC-2)</option>
                            <option {{ (int) old("tipo_vacuna") === "Vacuna contra la leptospirosis" ? 'selected' : '' }} value="Vacuna contra la leptospirosis">Vacuna contra la leptospirosis</option>
                            <option {{ (int) old("tipo_vacuna") === "Vacuna contra la rabia" ? 'selected' : '' }} value="Vacuna contra la rabia">Vacuna contra la rabia</option>
                        </select>
                    </div>
                    <div class="col-8">
                        <label for="detalle" class="col-sm-12 col-form-label">{{ __("Detalle") }} :</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="detalle" name="detalle" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-3 mt-3">{{ $title }}</button>
            </form>
        </div>
    </div>
  </div>
    
@endsection
