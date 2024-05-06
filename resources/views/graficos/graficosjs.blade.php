<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js" integrity="sha512-OD9Gn6cAUQezuljS6411uRFr84pkrCtw23Hl5TYzmGyD0YcunJIPSBDzrV8EeCiFxGWWvtJOfVo5pOgB++Jsag==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>


<!-- ------------------------Mostar el contenido de las tablas Enero,Febrero,Marzo y Trimestral-------------------------- -->
<script>
    function mostrarContenido(id) {
        // Ocultar todos los contenidos
        document.getElementById('contenido0').style.display = 'none';
        document.getElementById('contenido1').style.display = 'none';
        document.getElementById('contenido2').style.display = 'none';
        document.getElementById('contenido3').style.display = 'none';
        document.getElementById('contenido4').style.display = 'none';
        document.getElementById('contenido5').style.display = 'none';
        document.getElementById('contenido6').style.display = 'none';

        // Mostrar el contenido correspondiente al botón presionado
        document.getElementById(id).style.display = 'block';
    }
</script>
<!-- -----------------------------------------------------Mostrar contenido de graficas Muestra------------------- -->


<!-- -----------------------------------------------Script para modificar la grafica de trimestral------------------------------------------------ -->
<script>
    const bgTColor = {
        id: 'bgTColor',
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

    new Chart(document.getElementById("Trimestral"), {
        type: 'line',
        data: {
            labels: [
                "Enero",
                "Febrero",
                "Marzo"
            ],
            datasets: [{

                borderColor: [
                    'rgb(0,99,0)',
                ],
                data: [
                    @foreach($trimestral as $trimestral)
                    "{{ $trimestral  -> total }}",
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
                display: false
            },
            title: {
                display: true,
                text: 'Metas registradas por mes'
            }

        },
        plugins: [bgTColor],

    });

    const GraficoTrimestral = new Chart(
        document.getElementById('Trimestral'),
        config
    );

    function generateTPDF() {
        const canvas = document.getElementById('Trimestral');

        const canvasImage = canvas.toDataURL('image/jpeg', 1.0);

        let pdf = new jsPDF('landscape');

        pdf.setFontSize(20);
        pdf.addImage(canvasImage, 'JPEG', 15, 15, 280, 150);

        pdf.save("GraficoTrimestral.pdf")

    }
</script>

<!-- ------------------------------------------------Script para la grafica de el mes de enero----------------------------------------------------------- -->
<script>
    const bgsColor = {
        id: 'bgsColor',
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
    new Chart(document.getElementById("Enero"), {
        type: 'bar',
        data: {
            labels: [
                @foreach($eneroDias as $dias)
                "{{ "
                Dia: " .$dias  -> dia  }}",
                @endforeach
            ],
            datasets: [{

                backgroundColor: [
                    @foreach($eneroDias as $dias)
                    '#' + Math.floor(Math.random() * 16777215).toString(16),
                    @endforeach
                ],
                data: [
                    @foreach($eneroactivos as $activo)
                    "{{ $activo -> total}}",
                    @endforeach
                ]
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
                display: false
            },
            title: {
                display: true,
                text: 'Programas registrados en Enero (Por Dia)'
            }

        },
        plugins: [bgsColor],

    });

    const GraficoEnero = new Chart(
        document.getElementById('Enero'),
        config
    );

    function generateEPDF() {
        const canvas = document.getElementById('Enero');

        const canvasImage = canvas.toDataURL('image/jpeg', 1.0);

        let pdf = new jsPDF('landscape');

        pdf.setFontSize(20);
        pdf.addImage(canvasImage, 'JPEG', 15, 15, 280, 150);

        pdf.save("GraficoEnero.pdf")

    }
</script>
<!-- ------------------------------------------------Script para la grafica de el mes de febrero----------------------------------------------------------- -->
<script>
    const bgFColor = {
        id: 'bgFColor',
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
    new Chart(document.getElementById("Febrero"), {
        type: 'bar',
        data: {
            labels: [
                @foreach($febreroDias as $dias)
                "{{ "
                Dia: ". $dias  -> dia }}",
                @endforeach
            ],
            datasets: [{
                backgroundColor: [
                    @foreach($febreroDias as $dias)
                    '#' + Math.floor(Math.random() * 16777215).toString(16),
                    @endforeach
                ],
                data: [
                    @foreach($febreroactivos as $activo)
                    "{{ $activo -> total}}",
                    @endforeach
                ]
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
                display: false
            },
            title: {
                display: true,
                text: 'Programas registrados en Febrero (Por Dia)'
            }

        },
        plugins: [bgFColor],

    });
    const GraficoFebrero = new Chart(
        document.getElementById('Febrero'),
        config
    );

    function generateFPDF() {
        const canvas = document.getElementById('Febrero');

        const canvasImage = canvas.toDataURL('image/jpeg', 1.0);

        let pdf = new jsPDF('landscape');

        pdf.setFontSize(20);
        pdf.addImage(canvasImage, 'JPEG', 15, 15, 280, 150);

        pdf.save("GraficoFebrero.pdf")

    }
</script>
<!-- ------------------------------------------------Script para la grafica de el mes de Marzo----------------------------------------------------------- -->
<script>
    const bgMColor = {
        id: 'bgMColor',
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
    new Chart(document.getElementById("Marzo"), {
        type: 'bar',
        data: {
            labels: [
                @foreach($marzoDias as $dias)
                "{{ "
                Dia: " . $dias  -> dia }}",
                @endforeach
            ],
            datasets: [{

                backgroundColor: [
                    @foreach($marzoDias as $dias)
                    '#' + Math.floor(Math.random() * 16777215).toString(16),
                    @endforeach
                ],
                data: [
                    @foreach($marzoactivos as $activo)
                    "{{ $activo -> total}}",
                    @endforeach
                ]
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
                display: false
            },
            title: {
                display: true,
                text: 'Programas registrados en Marzo (Por Dia)'
            }

        },
        plugins: [bgMColor],

    });

    const GraficoMarzo = new Chart(
        document.getElementById('Marzo'),
        config
    );

    function generateMPDF() {
        const canvas = document.getElementById('Marzo');

        const canvasImage = canvas.toDataURL('image/jpeg', 1.0);

        let pdf = new jsPDF('landscape');

        pdf.setFontSize(20);
        pdf.addImage(canvasImage, 'JPEG', 15, 15, 280, 150);

        pdf.save("GraficoMarzo.pdf")

    }
</script>


<!-- -----------------------------------------------Script para modificar la grafica de areas------------------------------------------------ -->

<script>
    const bgColor = {
        id: 'bgColor',
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
    new Chart(document.getElementById("GraficoMetasAreas"), {
        type: 'pie',
        data: {
            labels: [

                @foreach($areasmetas as $am)

                "{{ $am -> nombre. " | " .$am ->meta. "
                Metas " }}",


                @endforeach
            ],
            datasets: [{
                backgroundColor: [
                    @foreach($areasmetas as $am)
                    "#" + Math.floor(Math.random() * 16777215).toString(16),
                    @endforeach
                ],
                data: [
                    @foreach($areasmetas as $am)
                    "{{ $am -> meta }}",

                    @endforeach
                ]
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        },
        plugins: [bgColor],

    });
    const GraficoMetasAreas = new Chart(
        document.getElementById('GraficoMetasAreas'),
        config
    );

    function generatePDF() {
        const canvas = document.getElementById('GraficoMetasAreas');

        const canvasImage = canvas.toDataURL('image/jpeg', 1.0);

        let pdf = new jsPDF('landscape');

        pdf.setFontSize(20);
        pdf.addImage(canvasImage, 'JPEG', 15, 15, 280, 150);

        pdf.save("GraficoMetasAreas.pdf")

    }
</script>

<!-- -----------------------------------------------Script para modificar la grafica de programas|metas------------------------------------------------ -->
<script>
    new Chart(document.getElementById("GraficaProgamasMetas"), {
        type: 'bar',
        data: {
            labels: [
                @foreach($programas as $programa)
                "{{ $programa -> abreviatura }}",
                @endforeach
            ],
            datasets: [{
                label: "Numero de metas que tiene el programa",
                backgroundColor: [
                    @foreach($programas as $programa)
                    "#" + Math.floor(Math.random() * 16777215).toString(16),
                    @endforeach
                ],
                data: [
                    @foreach($metas as $metas)
                    "{{ $metas -> conteo}}",

                    @endforeach
                ]
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
                display: false
            },
            title: {
                display: true,
                text: 'Programas y sus metas'
            }

        }

    });
</script>

<!-- -----------------------------------------------Script para modificar la grafica de Usuarios|Puestos----------------------------------------------- -->
<script>
    const bgUPColor = {
        id: 'bgUPColor',
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
    new Chart(document.getElementById("GraficaUsuarioPuesto"), {
        type: 'pie',
        data: {
            labels: [

                @foreach($puesto as $pue)
                "{{ $pue -> nombre . " | " . "
                Total: " .$pue -> id_tipo    }}",

                @endforeach
            ],
            datasets: [{

                backgroundColor: [
                    @foreach($puesto as $pue)
                    "#" + Math.floor(Math.random() * 16777215).toString(16),
                    @endforeach
                ],
                data: [
                    @foreach($puesto as $pue)
                    "{{ $pue -> id_tipo}}",

                    @endforeach
                ]
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        },
        plugins: [bgTColor],

    });



    const GraficoUsuarioPuesto = new Chart(
        document.getElementById('GraficaUsuarioPuesto'),
        config
    );

    function generateUPPDF() {
        const canvas = document.getElementById('GraficaUsuarioPuesto');

        const canvasImage = canvas.toDataURL('image/jpeg', 1.0);

        let pdf = new jsPDF('landscape');

        pdf.setFontSize(20);
        pdf.addImage(canvasImage, 'JPEG', 15, 15, 280, 150);

        pdf.save("GraficaUsuarioPuesto.pdf")

    }
</script>