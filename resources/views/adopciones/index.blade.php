@extends('layouts.index')
@section('title', 'Creando Alerta')

@section('css')

@endsection


@section('content')
    <h1 class="d-flex flex-wrap justify-content-center">
        
        {{--  @foreach ($adopciones as $adopcion)  --}}
        @foreach(range(1,10) as $adopcion)
            <div class="card m-2" style="width: 14rem;">
                <img
                    class="img-fluid"
                    src="https://2.bp.blogspot.com/-DvqWIDQO5-k/T3dasQybrUI/AAAAAAAAAW8/yQ3h12gqCq8/s1600/20120313-_MG_8181.jpg"
                    alt="Dog"
                    {{--  width="250px"  --}}
                    {{--  height="200px"  --}}
                >                    
                <div class="card-body">
                    <h4 class="card-title">Cachuchin</h5>
                    {{--  <h6 class="card-subtitle mb-2 text-muted">raza</h6>  --}}
                    <p class="card-text h6">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, eveniet?...

                    </p>
                    {{--  <a href="" class="card-link">Ver</a>  --}}
                    <button class="btn btn-primary"> Ver más detalles</button>
                </div>
            </div>
        @endforeach

    </h1>
@endsection

@section('js')

@endsection
