@extends('layout.navbar')
@section('content')
<title>Gráficos</title>

@auth
<div class="container p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Inicio</a></li>
            <li class="breadcrumb-item" aria-current="page">Gráficos</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col p-4">
            <h3>Reportes</h3>
        </div>
        <div class="col p-4 d-flex justify-content-end">
            <button type="button" class="btn btn-success" id="btn_alta" data-bs-toggle="modal" data-bs-target="#modalalta"><i class="fa-regular fa-file-excel"></i></button>
        </div>
    </div>
    <div class="row">
        <!-- -----------------------------------------Grafica Muestra----------------------------------- -->
        <h5>Graficas de Muestra </h5>
        <div class="container p-1">
            <div id="my-div">
                <button class="btn btn-success" onclick="mostrarContenido('contenido4')">Metas asignadas por areas</button>
                <button class="btn btn-success" onclick="mostrarContenido('contenido5')">Programas Metas</button>
                <button class="btn btn-success" onclick="mostrarContenido('contenido6')">Usuarios Puestos</button>
                <button class="btn btn-success" onclick="location.reload()">Cerrar</button>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 py-3">
                <div class="card border-light mb-3" style="max-width: 34rem;">
                    <div id="contenido4" style="display:none;">
                        <!-- Aquí va el contenido 1 -->
                        <canvas id="GraficoMetasAreas" width="600" height="400"></canvas>
                        <div id="my-cerrar">
                            <center><button class="btn btn-danger" onclick="generatePDF()">Generar PDF</button></center>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 py-3">
                <div class="card border-light mb-3" style="max-width: 34rem;">
                    <div id="contenido5" style="display:none;">
                        <!-- Aquí va el contenido 1 -->
                        <canvas id="GraficaProgamasMetas" width="600" height="400"></canvas>
                        <div id="my-cerrar">
                            <center><button class="btn btn-danger" onclick="generatePMPDF()">Generar PDF</button></center>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 py-3">
                <div class="card border-light mb-3" style="max-width: 34rem;">
                    <div id="contenido6" style="display:none;">
                        <!-- Aquí va el contenido 1 -->
                        <canvas id="GraficaUsuarioPuesto" width="600" height="400"></canvas>
                        <div id="my-cerrar">
                            <center><button class="btn btn-danger" onclick="generateUPPDF()">Generar PDF</button></center>

                        </div>
                    </div>
                </div>
            </div>
            <!-- -----------------------------------------Grafica de prueba por meses Enero-Marzo ----------------------------------- -->
            <h5>Graficas de las metas por Meses y Trimestral </h5>
            <div class="container p-1">
                <div id="my-div">
                    <button class="btn btn-success" onclick="mostrarContenido('contenido0')">Enero</button>
                    <button class="btn btn-success" onclick="mostrarContenido('contenido1')">Febrero</button>
                    <button class="btn btn-success" onclick="mostrarContenido('contenido2')">Marzo</button>
                    <button class="btn btn-success" onclick="mostrarContenido('contenido3')">Trimestral</button>
                    <button class="btn btn-success" onclick="location.reload()">Cerrar</button>

                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 py-3">
                    <div class="card border-light mb-3" style="max-width: 34rem;">
                        <div id="contenido0" style="display:none;">
                            <!-- Aquí va el contenido 1 -->
                            <canvas id="Enero" width="600" height="400"></canvas>
                            <div id="my-cerrar">
                                <center><button class="btn btn-danger" onclick="generateEPDF()">Generar PDF</button></center>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 py-3">
                    <div class="card border-light mb-3" style="max-width: 34rem;">
                        <div id="contenido1" style="display:none;">
                            <!-- Aquí va el contenido 1 -->
                            <canvas id="Febrero" width="600" height="400"></canvas>
                            <div id="my-cerrar">
                                <center><button class="btn btn-danger" onclick="generateFPDF()">Generar PDF</button></center>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 py-3">
                    <div class="card border-light mb-3" style="max-width: 34rem;">
                        <div id="contenido2" style="display:none;">
                            <!-- Aquí va el contenido 1 -->
                            <canvas id="Marzo" width="600" height="400"></canvas>
                            <div id="my-cerrar">
                                <center><button class="btn btn-danger" onclick="generateMPDF()">Generar PDF</button></center>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 py-3">
                    <div class="card border-light mb-3" style="max-width: 34rem;">
                        <div id="contenido3" style="display:none;">
                            <!-- Aquí va el contenido 1 -->
                            <canvas id="Trimestral" width="600" height="400"></canvas>
                            <div id="my-cerrar">
                                <center><button class="btn btn-danger" onclick="generateTPDF()">Generar PDF</button></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endauth




@section('js')
@include('graficos.graficosjs')
@endsection

@guest
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3 text-center">
        <img src="{{ asset('img/login.png') }}" alt="Inicie Sesión para poder ver el contenido" class="img-fluid" style="width: 800px;">
        <p>Para ver el contenido <a href="{{ route('login') }}">Iniciar Sesión</a></p>
    </div>
</div>
@endguest

@endsection