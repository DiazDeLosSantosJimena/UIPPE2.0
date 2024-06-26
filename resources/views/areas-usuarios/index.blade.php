@extends('layout.navbar')

<!-- Importacion de estilos para el select START -->
@section('css')
<link rel="stylesheet" href="css/virtual-select.min.css">
@endsection
<!-- Importacion de estilos para el select END -->

@section('content')

@auth    <!-- Condición de acceso al contenido LOGGEADO IF -->
<div class="container p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Inicio</a></li>
            <li class="breadcrumb-item"><a href="registros">Registros</a></li>
            <li class="breadcrumb-item" aria-current="page">Áreas-Usuarios</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col p-4">
            <h3>Áreas | Usuarios</h3>
        </div>
        <div class="col p-4 d-flex justify-content-end">
            <a href="{{route('pdfau')}}"><button type="button" class="btn btn-danger mx-1 my-1"><i class="fa-solid fa-file-pdf"></i></button></a>
            <a class="btn btn-success float-end mx-1 my-1" href="{{ route('areasusuarios.export') }}"><i class="fa-sharp fa-solid fa-file-excel"></i></a>
            <button type="button" class="btn btn-success mx-1 my-1" id="btn_alta" data-bs-toggle="modal" data-bs-target="#modalalta"><i class="fa-solid fa-plus"></i></button>
        </div>
        <div class="table-responsive">
            <table class="table" id="areas-usuarios">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Area</th>
                        <th>Usuario</th>
                        <th class="text-center">Acción</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($asig as $info)
                    <tr>
                        <td>{{ $info->id_area}}</td>
                        <td>{{ $info->nombre}}</td>
                        <td>{{ $info->nombreU .' '. $info->app .' '. $info->apm}}</td>
                        <td class="text-center">
                            <!-- Button show modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalshow{{ $info->id_areasusuarios }}"><i class="fa-solid fa-eye"></i></button>
                        </td>
                        <td class="text-center">
                            <!-- Button delete modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $info->id_areasusuarios }}"><i class="fa-solid fa-trash"></i></button>
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

@include('areas-usuarios.modales')

@endauth   <!-- Condición de acceso al contenido LOGGEADO ELSE -->
@guest
<div class="container p-4">
    <div class="row">
        <div class="col p-4">
            <h3>Áreas - Usuarios</h3>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3 text-center">
            <img src="img/logos/login.png" alt="Inicie Sesión para poder ver el contenido" class="img-fluid" style="width: 800px;">
            <p>Para ver el contenido <a href="{{ route('login') }}">Iniciar Sesión</a></p>
        </div>
    </div>
</div>
@endguest

@section('js')
<!-- SCRIPT MODAL START -->
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
<!-- SCRIPT MODAL END -->

<!-- SCRIPT PARA MULTISELECT START -->
<script type="text/javascript" src="js/virtual-select.min.js"></script>
<script type="text/javascript">
    VirtualSelect.init({
        ele: 'select'
    });
</script>
<!-- SCRIPT PARA MULTISELECT END -->
<!-- Importacion y configuracion para las tablas dinamicas START -->
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#areas-usuarios').DataTable({
            "lengthMenu": [
                [5, 10, 50, -1],
                [5, 10, 50, "Todo"]
            ],
            ordering: false,
            info: false,
            language: {
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

@endsection
