@extends('layouts.index')
@section('title', 'Perfil Usuario')

@section('css')
    <link rel="stylesheet" href="{{asset('css/users/show.css')}}">
@endsection

@section('content')

<div class="padding">
    <div class="col-md-8">
        <!-- Column -->
        <div class="card">
            {{-- <img class="card-img-top" src="{{asset('img/fondoPerfil.jpg')}}" alt="Card image cap"> --}}
            <img class="card-img-top" src="{{asset($user->fondo)}}" alt="Card image cap">
            
            <div class="subir-fondo">
                <a class="btn btn-primary" data-toggle="modal" data-target="#subir-fondo"><i class="fas fa-external-link-alt"></i>&nbsp fondo</a>
                <!-- Modal -->
                <div class="modal fade" id="subir-fondo" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="subir-fondoLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="subir-fondoLabel">Subiendo Fondo de Perfil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>

                        <form action="{{route('users.subirFoto')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <input type="file" name="file" accept="image/*">
                                <input type="hidden" name="tipo" value="fondo">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            
            <div class="card-body little-profile text-center">
                <img class="pro-img" src="{{asset($user->photo)}}" alt="user">
                <div></div>
                <a class="btn btn-primary mb-2 btn-sm" data-toggle="modal" data-target="#subir-perfil"><i class="fas fa-external-link-alt"></i>&nbsp perfil</a>
                <!-- Modal -->
                <div class="modal fade" id="subir-perfil" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="subir-perfilLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="subir-perfilLabel">Subiendo Foto de Perfil</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>

                            <form action="{{route('users.subirFoto')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <input type="file" name="file" accept="image/*">
                                    <input type="hidden" name="tipo" value="perfil">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <h3 class="m-b-0">Datos de Perfil</h3>

                <input type="text" class="form-control mb-4 mt-3" value="{{$user->name}}" readonly>
                <input type="text" class="form-control mb-4" value="{{$user->email}}" readonly>

                <!-- Button trigger modal -->
                <a href="javascript:void(0)" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" data-abc="true" data-toggle="modal" data-target="#staticBackdrop">Actualizar Datos</a>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Actualizando Datos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>

                        <form action="{{route('users.update',$user)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="modal-body">
                                <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="nombre...">
                                <input type="email" class="form-control mt-3" name="email" value="{{$user->email}}" placeholder="correo...">
                                <input type="password" class="form-control mt-3" name="password" placeholder="contraseña antigua...">
                                <input type="password" class="form-control mt-3" name="password_new" placeholder="nueva contraseña...">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('info') == 'ok')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Actualizado',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif

    @if(session('info') == 'error')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Contrañesa Incorrecta',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
    
@endsection
