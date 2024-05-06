@extends('layout.navbar')
<!-- Importacion de estilos para el select START -->
@section('css')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
@endsection
<!-- Importacion de estilos para el select END -->

@section('content')

<!-- Variables de Sesiones del usuario START -->
<?php
$session_area = session('session_area');
?>
<!-- Variables de Sesiones del usuario END -->

<title>Calendario</title>

@auth    <!-- Condición de acceso al contenido LOGGEADO -->
@if(auth()->user()->id_tipo == 1 || auth()->user()->id_tipo == 2 || auth()->user()->id_tipo == 3 || auth()->user()->id_tipo == 4)   <!-- Condición de acceso al contenido por tipo de usuario -->

<div class="container p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Inicio</a></li>
            <li class="breadcrumb-item" aria-current="page">Calendario</li>
        </ol>
    </nav>
    
    <div class="row">
        <div class="col-12 p-4">
            <h3>Calendario Metas</h3>
        </div>
            <div class="col-xs-4 col-md-4 col-xl-4 d-flex">
                <i class='bx bxs-rectangle text-success mx-3 my-1'></i>
                <p>Cantidad Propuesta</p>
            </div>
            <div class="col p-4 d-flex justify-content-end">
                <a class="btn btn-success" href="{{ route('entregaMetas') }}">Entrega Metas</a>
            </div>
        <!-- Tabla de metas completadas -->
        <div class="table-responsive my-4">
            <table class="table" id="metasComp">
                <thead class="table-light">
                    <!-- Campos en tabla metas -->
                    <tr>
                        <th class="text-center">Clave</th>
                        <th>Nombre Meta</th>
                        <th>Programa</th>
                        <th class="text-center">Cantidad Propuesta Anual</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Regitros en tabla metas -->
                    @foreach($areasconMeses as $meta)
                        @if($session_area == $meta->area_id)
                            @if($meta->meses_c >= $meta->cantidad_c)
                            <tr id="tr{{ $meta -> id_areasmetas }}" style="background-color: #dc3545; color: white;">
                                <td class="text-center">{{ $meta -> clave }}</td>
                                <td>{{$meta->nombreM}}</td>
                                <td>{{ $meta -> nombrePA }}</td>
                                <td>
                                    <p class="text-center" id="cantEntrega{{ $meta->id_areasmetas }}">{{ $meta->meses_c }}</p>
                                </td>
                                <!-- Button calendar modal -->
                                <td class="text-center">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalshow{{ $meta->id_areasmetas }}"><i class="fa-solid fa-calendar"></i></button>
                                </td>
                            </tr>
                            @endif
                        @elseif($session_area == 0)
                            @if($meta->meses_c >= $meta->cantidad_c)
                            <tr id="tr{{ $meta -> id_areasmetas }}" style="background-color: #dc3545; color: white;">
                                <td class="text-center">{{ $meta -> clave }}</td>
                                <td>{{$meta->nombreM}}</td>
                                <td>{{ $meta -> nombrePA }}</td>
                                <td>
                                    <p class="text-center" id="cantEntrega{{ $meta->id_areasmetas }}">{{ $meta->meses_c }}</p>
                                </td>
                                <!-- Button calendar modal -->
                                <td class="text-center">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalshow{{ $meta->id_areasmetas }}"><i class="fa-solid fa-calendar"></i></button>
                                </td>
                            </tr>
                            @endif
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-xs-4 col-md-4 col-xl-4 d-flex">
            <i class='bx bxs-rectangle text-warning mx-3 my-1'></i>
            <p>Cantidad por establecer</p>
        </div>
        <div class="col-xs-4 col-md-4 col-xl-4 d-flex">
            <i class='bx bxs-rectangle text-danger mx-3 my-1'></i>
            <p>Cantidad sin registro eficiente</p>
        </div>
        <!-- Tabla de metas por completar -->
        <div class="table-responsive my-4">
            <table class="table" id="metasSin">
                <thead class="table-light">
                    <!-- Campos en tabla metas -->
                    <tr>
                        <th class="text-center">Clave</th>
                        <th>Programa</th>
                        <th>Nombre Meta</th>
                        <th class="text-center">Cantidad Propuesta Anual</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Regitros en tabla metas -->
                    @foreach($areasmetas as $meta)
                        @if($session_area == $meta->area_id)
                        <tr id="tr{{ $meta -> id_areasmetas }}" style="background-color: #dc3545; color: white;">
                            <td class="text-center">{{ $meta -> clave }}</td>
                            <td>{{$meta->nombreM}}</td>
                            <td>{{ $meta -> nombrePA }}</td>
                            <td>
                                <p class="text-center" id="cantEntrega{{ $meta->id_areasmetas }}">50</p>
                            </td>
                            <!-- Button calendar modal -->
                            <td class="text-center">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalshow{{ $meta->id_areasmetas }}"><i class="fa-solid fa-calendar"></i></button>
                            </td>
                        </tr>
                        @elseif($session_area == 0)
                        <tr id="tr{{ $meta -> id_areasmetas }}" style="background-color: #dc3545; color: white;">
                            <td class="text-center">{{ $meta -> clave }}</td>
                            <td>{{$meta->nombreM}}</td>
                            <td>{{ $meta -> nombrePA }}</td>
                            <td>
                                <p class="text-center" id="cantEntrega{{ $meta->id_areasmetas }}">50</p>
                            </td>
                            <!-- Button calendar modal -->
                            <td class="text-center">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalshow{{ $meta->id_areasmetas }}"><i class="fa-solid fa-calendar"></i></button>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@else   <!-- Condición de acceso al contenido por tipo de usuario -->
<script>
        window.location.replace("{{ route('dashboard')}}");
</script>
@endif

<!-- Modales de las tablas -->
@include('calendario.modalesMetas')

@section('js')
<!-- Importacion y configuracion para las tablas dinamicas START -->
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#metasSin').DataTable({
            "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todo"]],
            ordering: false,
            info: false,
            language:{
                "search": "Buscar:",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "zeroRecords": "Sin resultados encontrados",
            }
        });
        $('#metasComp').DataTable({
            "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todo"]],
            ordering: false,
            info: false,
            language:{
                "search": "Buscar:",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "zeroRecords": "Sin resultados encontrados",
            }
        });
    });
</script>
<!-- Importacion y configuracion para las tablas dinamicas END -->
@endsection

@endauth
<!-- Condición de acceso al contenido LOGGEADO IF -->
@guest
<div class="container p-4">
    <div class="row">
        <div class="col p-4">
            <h3>Calendario</h3>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3 text-center">
            <img src="{{ asset('img/login.png') }}" alt="Inicie Sesión para poder ver el contenido" class="img-fluid" style="width: 800px;">
            <p>Para ver el contenido <a href="{{ route('login') }}">Iniciar Sesión</a></p>
        </div>
    </div>
</div>
@endguest

<script>
    //======================================================
    //Para consulta de id_areasmetas con registros en meses
    //======================================================
    
    window.addEventListener('DOMContentLoaded', () => {
    @foreach($areasconMeses as $areas)
    @if($session_area == $areas->area_id)
        document.querySelector("#cantEntrega{{ $areas->id_areasmetas }}").setAttribute('value', '{{ $areas -> meses_c }}');
        document.getElementById("cantidad{{ $areas->id_areasmetas }}").value = {{ $areas -> meses_c }};
        document.querySelector("#cantEntrega{{ $areas->id_areasmetas }}").innerHTML = "{{ $areas -> meses_c }}";

        var sumaI{{ $areas->id_areasmetas }} = 0;
        var input{{ $areas->id_areasmetas }} = new Array;

        for(var i=0; i<12; i++){
            input{{ $areas->id_areasmetas }}.push(document.querySelector(".sum"+i+"{{ $areas->id_areasmetas }}").value || 0);
            sumaI{{ $areas->id_areasmetas }} = parseInt(sumaI{{ $areas->id_areasmetas }})+parseInt(input{{ $areas->id_areasmetas }}[i]);
        }

        var tr = document.querySelector("#tr{{$areas -> id_areasmetas}}");

        if({{ $areas->meses_c }} > {{ $areas->cantidad_c }}){
            $("#tr{{$areas -> id_areasmetas}}").css("background-color","#8b67cc");
        }else if({{ $areas -> cantidad_c }} == sumaI{{ $areas->id_areasmetas }}){
            $("#tr{{$areas -> id_areasmetas}}").css("background-color","#198754");
        }else if(sumaI{{ $areas->id_areasmetas }} >= Math.floor({{ $areas -> cantidad_c }}/2)){
            $("#tr{{$areas -> id_areasmetas}}").css("background-color","#ffc107");
            $("#tr{{$areas -> id_areasmetas}}").css("color","black");
        }else{

        }

        document.getElementById("sumaTotal{{ $areas->id_areasmetas }}").innerHTML = "";
        document.getElementById("sumaTotal{{ $areas->id_areasmetas }}").innerHTML = sumaI{{ $areas->id_areasmetas }};
    @elseif($session_area == 0)
    document.querySelector("#cantEntrega{{ $areas->id_areasmetas }}").setAttribute('value', '{{ $areas -> meses_c }}');
        document.getElementById("cantidad{{ $areas->id_areasmetas }}").value = {{ $areas -> meses_c }};
        document.querySelector("#cantEntrega{{ $areas->id_areasmetas }}").innerHTML = "{{ $areas -> meses_c }}";

        var sumaI{{ $areas->id_areasmetas }} = 0;
        var input{{ $areas->id_areasmetas }} = new Array;

        for(var i=0; i<12; i++){
            input{{ $areas->id_areasmetas }}.push(document.querySelector(".sum"+i+"{{ $areas->id_areasmetas }}").value || 0);
            sumaI{{ $areas->id_areasmetas }} = parseInt(sumaI{{ $areas->id_areasmetas }})+parseInt(input{{ $areas->id_areasmetas }}[i]);
        }

        var tr = document.querySelector("#tr{{$areas -> id_areasmetas}}");

        if({{ $areas->meses_c }} > {{ $areas->cantidad_c }}){
            $("#tr{{$areas -> id_areasmetas}}").css("background-color","#8b67cc");
        }else if({{ $areas -> cantidad_c }} == sumaI{{ $areas->id_areasmetas }}){
            $("#tr{{$areas -> id_areasmetas}}").css("background-color","#198754");
        }else if(sumaI{{ $areas->id_areasmetas }} >= Math.floor({{ $areas -> cantidad_c }}/2)){
            $("#tr{{$areas -> id_areasmetas}}").css("background-color","#ffc107");
            $("#tr{{$areas -> id_areasmetas}}").css("color","black");
        }else{

        }

        document.getElementById("sumaTotal{{ $areas->id_areasmetas }}").innerHTML = "";
        document.getElementById("sumaTotal{{ $areas->id_areasmetas }}").innerHTML = sumaI{{ $areas->id_areasmetas }};
    @endif
    @endforeach
    });

</script>

@endsection    <!-- // ENDSECTION DE CONTENIDO = @section('content') -->
