@extends('layout.navbar')

@section('css') <!-- Importacion de estilos para el select START -->
<link rel="stylesheet" href="{{ asset('css/virtual-select.min.css') }}">
@endsection <!-- Importacion de estilos para el select END -->


@section('content') <!-- Contenido de la página START -->

<?php
/*
    Variables de Sesiones del usuario START
*/
$session_area = session('session_area');
?>

<!-- SCRIPT QUE FUNCIONA COMO MIDDLEWARE START -->
<!-- {{-- @if(auth()->user()->id_tipo == 5)
<script>
    window.location.replace("{{ route('dashboard')}}");
</script>
@endif --}} -->
<!-- SCRIPT QUE FUNCIONA COMO MIDDLEWARE END -->

<title>Registros</title>
@auth <!-- Contenido con sesión iniciada START -->
<div class="container p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
            <li class="breadcrumb-item">Registros</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3">
            <h3 class="text-bold">Registros</h3>
            <p>En este apartado se muestra la cantidad de registros de datos.</p>
        </div>
        <div class="col-md-12">
            <ul class="nav nav-pills nav-fill gap-2 p-1 small rounded-5 shadow-sm" id="pillNav2" role="tablist" style="--bs-nav-link-color: var(--bs-white); --bs-nav-pills-link-active-color: var(--bs-black); --bs-nav-pills-link-active-bg: var(--bs-white); background-color: cadetblue;">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active rounded-5" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">#1 Área</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-5" id="nav-registroUsuarios-tab" data-bs-toggle="tab" data-bs-target="#nav-registroUsuarios" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">#2 Usuarios</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-5" id="nav-Metas-tab" data-bs-toggle="tab" data-bs-target="#nav-Metas" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">3# Metas</button>
                </li>
            </ul>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                    <div class="container">
                        <div class="row justify-content-md-center mb-5">
                            <div class="col-12 text-center">
                                <br><br>
                                <h3 style="color: black;">{{ $areas -> clave. ' | ' .$areas -> nombre }}</h3>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4 text-center align-items-center">
                                <p style="color: black;">{{ $areas -> descripcion }}</p>
                            </div>
                            <div class="col-xl-12 col-md-12 text-center align-items-center">
                                <img src="{{ asset('/img/post/'.$areas->foto) }}" alt="{{ $areas->foto }}" class="img-fluid">
                            </div>
                            <div class="col-xl-12 col-md-12 text-center align-items-center my-5">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $session_area }}">Editar datos del área</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-registroUsuarios" role="tabpanel" aria-labelledby="nav-registroUsuarios-tab" tabindex="0">
                    <div class="row my-5">
                        <div class="col-12 text-center" style="color: black;">
                            <h3>Usuarios</h3>
                            <p>Usuarios que pertenecen al área</p>
                        </div>
                        @if(auth()->user()->id_tipo == 4 || auth()->user()->id_tipo == 5)
                        @else
                        <div class="col p-4 d-flex justify-content-end">
                            <button type="button" class="btn btn-success mx-1 my-1" id="btn_alta" data-bs-toggle="modal" data-bs-target="#modalalta"><i class="fa-solid fa-plus"></i></button>
                        </div>
                        @endif
                        <div class="col-12 my-2">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th class="text-center">Foto</th>
                                            <th>Nombre</th>
                                            <th>Correo</th>
                                            <th>Area</th>
                                            <th>Activo</th>
                                            @if(auth()->user()->id_tipo == 4 || auth()->user()->id_tipo == 5)
                                            <th class="text-center">Acciones</th>
                                            @else
                                            <th colspan="2" class="text-center">Acciones</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($asig as $info)
                                        <tr>
                                            <td>{{ $info->id_area}}</td>
                                            <td class="text-center"><img src="{{ asset('img/post/'.$info-> foto) }}" alt="{{ $info->foto }}" style="width: 45px; border-radius: 15px;"></td>
                                            <td>{{ $info->nombreU .' '. $info->app .' '. $info->apm}}</td>
                                            <td>{{ $info->email }}</td>
                                            <td>{{ $info->nombre}}</td>
                                            <td>
                                                @if($info -> activo > 0)
                                                <p style="color: green;">Activo</p>
                                                @else
                                                <p style="color: red;">Inactivo</p>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <!-- Button show modal -->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalshow{{ $info->id }}"><i class="fa-solid fa-eye"></i></button>
                                            </td>
                                            @if(auth()->user()->id_tipo == 4 || auth()->user()->id_tipo == 5)
                                            @else
                                            <td>
                                                <!-- Button edit modal -->
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $info->id }}"><i class="fa-solid fa-pen-to-square"></i></button>
                                            </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-Metas" role="tabpanel" aria-labelledby="nav-metas-tab" tabindex="0">
                    <div class="row my-5">
                        <div class="col-12 text-center" style="color: black;">
                            <h3>Metas</h3>
                            <p>Metas que pertenecen al área</p>
                        </div>
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <!-- Campos en tabla metas -->
                                        <tr>
                                            <th class="text-center">Clave</th>
                                            <th>Nombre</th>
                                            <th>Programa</th>
                                            <th class="text-center">Activo</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Regitros en tabla metas -->
                                        @foreach($metas as $meta)
                                        @if(auth()->user()->id != 3)
                                        <tr>
                                            <td class="text-center">{{ $meta -> clave }}</td>
                                            <td>{{ $meta -> nombreM }}</td>
                                            <td>{{$meta->nombrePA}}</td>
                                            <td class="text-center">
                                                @if($meta -> activo > 0)
                                                <p style="color: green;">Activo</p>
                                                @else
                                                <p style="color: red;">Inactivo</p>
                                                @endif
                                            </td>
                                        </tr>
                                        @elseif($meta->activo > 0)
                                        <tr>
                                            <td class="text-center">{{ $meta -> clave }}</td>
                                            <td>{{ $meta -> nombreM }}</td>
                                            <td>{{$meta->nombrePA}}</td>
                                            <td class="text-center">
                                                @if($meta -> activo > 0)
                                                <p style="color: green;">Activo</p>
                                                @else
                                                <p style="color: red;">Inactivo</p>
                                                @endif
                                            </td>
                                        </tr>
                                        @else
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('dashboard.modales.modalesRegistrosA')

@section('js')
<script>
    $(function() {
        $('#modalmod').modal('show')
    });
</script>
<script>
    $(function() {
        $('#modalshow').modal('show')
    });
    $(function() {
        $('#modalver').modal('show')
    });
    $(function() {
        $('#eliminarmodal').modal('show')
    });
</script>
<!-- SCRIPT PARA MULTISELECT START -->
<script type="text/javascript" src="{{ asset('js/virtual-select.min.js') }}"></script>
<script type="text/javascript">
    VirtualSelect.init({
        ele: '#usuariosSelect'
    });
</script>
<!-- SCRIPT PARA MULTISELECT END -->
@endsection
@endauth    <!-- Contenido con sesión iniciada END -->

@guest
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3 text-center">
        <img src="{{ asset('img/logos/login.png') }}" alt="Inicie Sesión para poder ver el contenido" class="img-fluid" style="width: 800px;">
        <p>Para ver el contenido <a href="{{ route('login') }}">Iniciar Sesión</a></p>
    </div>
</div>
@endguest

@endsection <!-- Contenido de la página END -->