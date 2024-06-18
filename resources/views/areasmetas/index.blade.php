@extends('layout.navbar')
<!-- Importacion de estilos para el select START -->
@section('css')
<link rel="stylesheet" href="{{ asset('css/virtual-select.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
@endsection
<!-- Importacion de estilos para el select START -->

@section('content')

<!-- Variables de Sesiones del usuario START -->
<?php
$session_area = session('session_area');
?>
<!-- Variables de Sesiones del usuario END -->
<!-- SCRIPT de petición para el multi-select START -->
<head>
    <script src="{{ asset('js\jquery-3.6.4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // --------Programas =-> Metas---------------------------------------------------
            $("#programa").on('change', function() {
                var id_programa = $(this).find(":selected").val();
                console.log(id_programa);
                if (id_programa == 0) {
                    $("#metas").html('<option value="0">-- Seleccione un programa antes --</option>');
                    $("#multimetas").html('<select multiple data-search="true" data-silent-initial-value-set="true" name="id_area[]" id="multimetas"></select');
                    VirtualSelect.init({
                        ele: '#multimetas'
                    });
                } else {
                    $("#metas").load('js_metas?id_programa=' + id_programa);
                }
            });

            $("#metas").on('change', function() {
                var id_meta = $(this).find(":selected").val();
                console.log(id_meta);
                if (id_meta == 0) {
                    $("#multimetas").html('<select multiple data-search="true" data-silent-initial-value-set="true" name="id_area[]" id="multimetas"></select');
                    VirtualSelect.init({
                        ele: '#multimetas'
                    });
                } else {
                    $("#multimetas").load('js_areas?id_metas=' + id_meta);
                }
            });
        });
    </script>
</head>
<!-- SCRIPT de petición para el multi-select END -->

@auth    <!-- Condición de acceso al contenido LOGGEADO -->
<div class="container p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Inicio</a></li>
            <li class="breadcrumb-item"><a href="registros">Registros</a></li>
            <li class="breadcrumb-item" aria-current="page">Áreas-Metas</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col p-4">
            <h3>Áreas | Metas</h3>
        </div>
        <div class="col p-4 d-flex justify-content-end">
            <a href="{{route('pdfam')}}"><button type="button" class="btn btn-danger mx-1 my-1"><i class="fa-solid fa-file-pdf"></i></button></a>
            <a class="btn btn-success float-end mx-1 my-1" href="{{ route('areasmetas.export') }}"><i class="fa-sharp fa-solid fa-file-excel"></i></a>
            <button type="button" class="btn btn-success mx-1 my-1" id="btn_alta" data-bs-toggle="modal" data-bs-target="#modalalta"><i class="fa-solid fa-plus"></i></button>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
            <table class="table mt-3" id="areasMetas">
                <thead class="table-striped">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Área</th>
                        <th scope="col">Programa</th>
                        <th scope="col">Meta</th>
                        <th scope="col">Objetivo</th>
                        <th class="text-center">Editar</th>
                        <th class="text-center">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($areasmetas as $info)
                    <tr>
                        <td>{{ $info->id_areasmetas }}</td>
                        <td>{{ $info->area }}</td>
                        <td>{{ $info->pnombre }}</td>
                        <td>{{ $info->nmeta }}</td>
                        <td>{{ $info->objetivo }}</td>
                        <td class="text-center">
                            <!-- Button edit modal -->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $info->id_areasmetas }}"><i class="fa-solid fa-pen-to-square"></i></button>
                        </td>
                        <td class="text-center">
                            <!-- Button delete modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $info->id_areasmetas }}"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Condición de acceso al contenido AREA ELSE -->
{{--
<script>
    window.location.replace("{{ route('registrosA', ['id' => $session_area]) }}");
</script>
--}}

@include('areasmetas.modales')

@section('js')
<!-- SCRIPT MODAL START -->
<script>
    $(function() {
        $('#modalmod').modal('show')
    });
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
<script type="text/javascript" src="js/virtual-select.min.js"></script>
<script type="text/javascript">
    VirtualSelect.init({
        ele: '#multimetas'
    });
</script>
<!-- SCRIPT PARA MULTISELECT END -->
<!-- Importacion y configuracion para las tablas dinamicas START -->
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#areasMetas').DataTable({
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
<!-- Condición de acceso al contenido LOGGEADO ELSE -->
@guest
<div class="container p-4">
    <div class="row">
        <div class="col p-4">
            <h3>Áreas | Metas</h3>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3 text-center">
            <img src="{{ asset('img/logos/login.png') }}" alt="Inicie Sesión para poder ver el contenido" class="img-fluid" style="width: 800px;">
            <p>Para ver el contenido <a href="{{ route('login') }}">Iniciar Sesión</a></p>
        </div>
    </div>
</div>
@endguest

@endsection     <!-- ENDSECTION DE CONTENIDO = @section('content') -->
