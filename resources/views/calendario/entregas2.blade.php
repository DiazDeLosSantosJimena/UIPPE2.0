@extends('layout.navbar')
<!-- Importación y configiración de estilos para las tablas dinamicas START -->
@section('dataTablesCss')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
@endsection
<!-- Importación y configiración de estilos para las tablas dinamicas END -->

@section('content') <!-- Contenido de la página START -->
<!-- Variables de Sesiones del usuario START -->
<?php
$session_area = session('session_area');
?>
<!-- Variables de Sesiones del usuario END -->

@auth <!-- Validacion de contenido LOGGEADO AUTENTIFICACIÓN START -->
@if(auth()->user()->id_tipo !=5 ) <!-- Validacion de contenido POR TIPO DE USUARIO IF -->
<div class="container p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('calendario') }}">Calendario</a></li>
            <li class="breadcrumb-item" aria-current="page">Entrega Metas</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-12 p-4">
            <h3>Entrega Metas</h3>
        </div>
        <div class="col-xs-4 col-md-4 col-xl-4 d-flex">
            <i class='bx bxs-rectangle mx-3 my-1' style="color: #8b67cc;"></i>
            <p>Registro en meses mayor a la cantidad propuesta</p>
        </div>
        <div class="col-xs-4 col-md-4 col-xl-4 d-flex">
            <i class='bx bxs-rectangle text-success mx-3 my-1'></i>
            <p>Meta completada</p>
        </div>
        <!-- Tabla de metas completadas -->
        <div class="table-responsive my-4">
            <table class="table" id="entregasComp">
                <thead>
                    <th class="text-center">Clave</th>
                    <th>Nombre Meta</th>
                    <th>Programa</th>
                    <th class="text-center">Cantidad Propuesta</th>
                    <th class="text-center">Cantidad Alcanzada</th>
                    <th class="text-center">Acciones</th>
                </thead>
                <!-- Registros de metas completadas -->
                <tbody>
                    @foreach($metasCompT as $meta)
                    @if($session_area == $meta->area_id || $session_area == 0)
                    <tr style="background-color: #dc3545; color: white;" class="trMetasTable">
                        <td class="text-center">{{ $meta -> clave }}</td>
                        <td>{{ $meta -> nombreM }}</td>
                        <td>{{ $meta -> nombrePA }}</td>
                        <td class="text-center td_cantidad_c">{{ $meta -> cantidad_c }}</td>
                        <td class="text-center td_cantidad_e" data-index="{{ $meta->id_meta }}" id="sumaT{{ $meta->id_areasmetas }}">{{ $meta->cantidad_c }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalshow{{ $meta->id_areasmetas }}"><i class="fa-solid fa-calendar"></i></button>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-xs-4 col-md-4 col-xl-4 d-flex">
            <i class='bx bxs-rectangle text-warning mx-3 my-1'></i>
            <p>Meta por completar</p>
        </div>
        <div class="col-xs-4 col-md-4 col-xl-4 d-flex">
            <i class='bx bxs-rectangle text-danger mx-3 my-1'></i>
            <p>Meta sin registro eficiente</p>
        </div>
        <!-- Tabla de metas por completar -->
        <div class="table-responsive my-4">
            <table class="table" id="metasTableS">
                <!-- Campos en tablas metas  -->
                <thead>
                    <th class="text-center">Clave</th>
                    <th>Nombre</th>
                    <th>Programa</th>
                    <th class="text-center">Cantidad Propuesta</th>
                    <th class="text-center">Cantidad Alcanzada</th>
                    <th class="text-center">Acciones</th>
                </thead>
                <!-- Registros de metas sin completar -->
                <tbody>
                    @foreach($metasTableS as $meta)
                    @if($session_area == $meta->area_id || $session_area == 0)
                    <tr style="background-color: #dc3545; color: white;" class="trMetasTable">
                        <td class="text-center">{{ $meta -> clave }}</td>
                        <td>{{ $meta -> nombreM }}</td>
                        <td>{{ $meta -> nombrePA }}</td>
                        <td class="text-center td_cantidad_c">{{ $meta -> cantidad_c }}</td>
                        <td class="text-center td_cantidad_e" data-index="{{ $meta->id_meta }}" id="sumaT{{ $meta->id_areasmetas }}">0</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalshow{{ $meta->id_areasmetas }}"><i class="fa-solid fa-calendar"></i></button>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

<!-- Modales entrega START -->
 @include('calendario.modalesEntrega')
<!-- Modales entrega START -->

<!-- Importación y configiración de estilos para las tablas dinamicas START -->
@section('js')
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#metasTableS').DataTable({
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
        $('#entregasComp').DataTable({
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
<!-- Importación y configiración de estilos para las tablas dinamicas END -->
 <script>
    function modal(contenido){

        //  Selector de objetos del modal
        const tabla = contenido.querySelector('table');
        const tbody = tabla.querySelector('tbody');
        const inputElements = tbody.querySelectorAll('input[type="number"]');
        const valorRecuadro = tabla.querySelector('tfoot').querySelector('#valorRecuadro');
        const sumaTotal = contenido.firstElementChild.querySelector('#sumaTotal');
        var id_areasmetas = contenido.querySelector('.modal-body').querySelector('#clave').textContent.split(':');
        id_areasmetas = String(id_areasmetas[1]).trim();
        
        inputElements.forEach( inputElement => {
            inputElement.addEventListener('input', () => {
                //  Variable que lleva la suma de las cantidades en los meses para la entrega
                let cantidad = 0;
                inputElements.forEach( inputElement => {
                    const valorActual = parseInt(inputElement.value, 10);
                    if (!isNaN(valorActual)) {
                        cantidad += valorActual;
                    }
                });
                //  Muestreo de cantidades
                valorRecuadro.textContent = `${inputElement.value}`;
                let cantidadTXT = sumaTotal.textContent.split('/'); //  Obtenemos la cantidad que se le asgino a la meta
                const cantidadXcumplir = cantidadTXT[1];    //  Asignamos la cantidad a una constante
                sumaTotal.textContent = `${cantidad} / ${cantidadXcumplir}`; //  La mostramos en la esquina superior derecha del modal
                document.querySelector(String(`#sumaT${id_areasmetas}`)).textContent = cantidad;
            });

            inputElement.addEventListener('focus', () => {
                //  Muestreo de la cantidad de los inputs en el recuadro inferior
                valorRecuadro.textContent = `${inputElement.value}`;
            });
        });

        //  Bloquear los inputs de los meses que ya pasaron
        @if(auth()->user()->id_tipo != 1 && auth()->user()->id_tipo != 2)
        var fecha = new Date();
        var mesNow = fecha.getMonth();
        inputElements.forEach( (inputElement, i) => {
            if( i < mesNow){
                inputElement.setAttribute('readOnly', 'true');
            }
        });
        @endif

    }
 </script>
 <script>
    document.addEventListener('DOMContentLoaded', () => {
        cantidadesEntrega();
        cantidadesPropuestas();
    });

    function cantidadesEntrega(){
        const registrosTabla = document.querySelectorAll('.trMetasTable');
        var datosJson = JSON.parse(@json($datosJSON));

        registrosTabla.forEach( registro => {
            //  Variables
            const meta_id = registro.querySelector('.td_cantidad_e').getAttribute('data-index');  //Obtenemos el id de la meta del registro
            const cantidad_e_td = registro.querySelector('.td_cantidad_e'); //  Obtenemos la columna donde se ingresara la cantidad que se tiene registrada en tb_entregas
            const cantidad_c = parseInt(registro.querySelector('.td_cantidad_c').textContent);  //Obtenemos la cantidad registrada en calendario
            
            datosJson.forEach( dato => {
                if(meta_id == dato.id_meta){
                    //  Impresión de cantidad registrada en tb_entregas
                    cantidad_e_td.textContent = dato.cantidad_e;
                    let cantidad_e = parseInt(dato.cantidad_e);

                    //  Coloreado de la tabla
                    if(cantidad_e > cantidad_c) {  //  Comparación de la cantidad registrada en calendario (cantidad_c) y cantidad registrada en entrega (cantidad_e)
                        registro.style.backgroundColor = "#8b67cc";
                    }else if(cantidad_c == cantidad_e) {
                        registro.style.backgroundColor = "#198754";
                    }else if(cantidad_e >= Math.floor(cantidad_c/2)) {
                        registro.style.backgroundColor = "#ffc107";
                        registro.style.color = "black";
                    }
                }
            });
        });

    }

    function cantidadesPropuestas() {
        const trs_propuestas = document.querySelectorAll('.tr_entrega'); //  Valores de calendario para metas con registro de entregas
        const registroPropuestas = JSON.parse(@json($cant_Propuestas));
        // console.log(registroPropuestas);

        trs_propuestas.forEach( registro => {
            //  Obtenemos el id_meta del modal donde van los datos
            const id_meta = parseInt(registro.getAttribute('data-index'));

            registroPropuestas.forEach( cantidades => {
                //  Obtenemos el id_meta de la consulta para ingresar los datos
                const id_metaPropuesta = parseInt(cantidades.id_areasmetas);

                if(id_meta === id_metaPropuesta) {
                    const meses = registro.querySelectorAll('td[data-info="mes"]');
                    meses[0].textContent = `${cantidades.m_enero}`;
                    meses[1].textContent = `${cantidades.m_febrero}`;
                    meses[2].textContent = `${cantidades.m_marzo}`;
                    meses[3].textContent = `${cantidades.m_abril}`;
                    meses[4].textContent = `${cantidades.m_mayo}`;
                    meses[5].textContent = `${cantidades.m_junio}`;
                    meses[6].textContent = `${cantidades.m_julio}`;
                    meses[7].textContent = `${cantidades.m_agosto}`;
                    meses[8].textContent = `${cantidades.m_septiembre}`;
                    meses[9].textContent = `${cantidades.m_octubre}`;
                    meses[10].textContent = `${cantidades.m_noviembre}`;
                    meses[11].textContent = `${cantidades.m_diciembre}`;
                }
            } );
        });
    }
 </script>
@endsection

@endauth <!-- Validacion de contenido LOGGEADO AUTENTIFICACIÓN END -->

@endsection <!-- Contenido de la página END -->