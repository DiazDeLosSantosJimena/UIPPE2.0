    @extends('layout.navbar')
@section('content')
<?php
$session_id = session('session_id');
$session_name = session('session_name');
$session_tipo = session('session_tipo');
?>
<title>Gráficos</title>
<div class="container p-4">
    @if($session_id)
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Inicio</a></li>
            <li class="breadcrumb-item" aria-current="page">Gráficos</li>


        </ol>
    </nav>
    @else
    @endif
    <div class="row">
        <div class="col p-4">
            <h3>Reportes</h3>
        </div>
        @if($session_id)
        <div class="col p-4 d-flex justify-content-end">


            <button type="button" class="btn btn-success" id="btn_alta" data-bs-toggle="modal" data-bs-target="#modalalta"><i class="fa-regular fa-file-excel"></i></button>
        </div>
        @else
        @endif
    </div>
    <div class="row">
        @if($session_id)


        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 py-3">
                <div class="card border-light mb-3" style="max-width: 34rem;">
                        <!-- Aquí va el contenido 1 -->
                        <canvas id="GraficaReportes" width="600" height="400"></canvas>
                        <center><button onclick="generateRGPDF()" class="btn btn-danger">Generar PDF</button></center>
                       
<form action="{{route('buscar')}}" method="POST">
  @csrf
  <div>Mes de inicio</div>
    <td><input type="date" class="form-control" name="fecha1"></td>
    <div>Mes de fin</div>
    <td><input type="date" class="form-control" name="fecha2"></td>
    <br>
    <button type="submit" class="btn btn-success">Buscar</button>
    <a class="btn btn-primary" href="graficos" role="button">Regresar</a>
</form>
</div>
 </div>



        

        @else
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3 text-center">
                    <img src="{{ asset('img/login.png') }}" alt="Inicie Sesión para poder ver el contenido" class="img-fluid" style="width: 800px;">
                    <p>Para ver el contenido <a href="/login">Iniciar Sesión</a></p>
                </div>
                @endif
            </div>


            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js" integrity="sha512-OD9Gn6cAUQezuljS6411uRFr84pkrCtw23Hl5TYzmGyD0YcunJIPSBDzrV8EeCiFxGWWvtJOfVo5pOgB++Jsag==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>

            
    <script>
        const bgREColor = {
                    id: 'bgRETColor',
                    beforeDraw: (chart, options) => {
                        const {
                            ctx,
                            width,
                            height
                        } = chart;
                        ctx.fillStyle = 'white';
                        ctx.fillRect(0, 0, width, height)
                        ctx.restore();
                    }
                }
    new Chart(document.getElementById("GraficaReportes"), {
                    type: 'line',
                    data: {
                        labels: [

                            @foreach($resultados as $am)
                                "{{ $am -> mes }}",

                                @endforeach
                        ],
                        
                     
                        datasets: [{
                            label: "Registros de metas por mes",
                            borderColor: [
                                'rgb(0,99,0)',
                            ],
                            
                            data: [
                                @foreach($resultados as $am)
                                "{{ $am -> conteo }}",

                                @endforeach
                            ],
                            tension: 0.1,
                            fill: false
                        
                        }]
                    },
                    options: {
 
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        },
                            legend: {
                                display: true
                            },
                            
                    },
                 
                    plugins: [bgREColor],
                });

                const GraficaReportes = new Chart(
                    document.getElementById('GraficaReportes'),
                    config
                );

                function generateRGPDF() {
                    const canvas = document.getElementById('GraficaReportes');

                    const canvasImage = canvas.toDataURL('image/jpeg', 1.0);

                    let pdf = new jsPDF('landscape');

                    pdf.setFontSize(20);
                    pdf.addImage(canvasImage, 'JPEG', 15, 15, 200, 80);

                    pdf.save("GraficoReportesBuscados.pdf")

                }
</script>

@endsection