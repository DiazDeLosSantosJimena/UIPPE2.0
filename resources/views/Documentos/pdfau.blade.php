<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .image-right {
            float: right;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios PDF</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!--<link href="{{ public_path('/css/app.css') }}" rel="stylesheet" type="text/css">-->
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <img src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('/img/logos/SIPPyEM.png'))) }}" height="40px">
    <img src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('/img/logos/logotipoutvt.png'))) }}" height="60px" class="image-right">
</head>
<br><br>

<body>
    <div class="row">
        <div class="col-12 tex-center">
            <h3>Áreas|Usuarios registradas en el sistema</h3>
        </div>
    </div>
    <br>
    <b>Fecha: @php echo date('d/m/Y'); @endphp</b>
    <br>
    <table class="table table-bordered table-sm">
        <thead>
            <tr class="table-success">
                <td>ID</td>
                <td>Áreas</td>
                <td>Usuarios</td>
            </tr>
        </thead>
        @foreach($areausuario as $a )
        <tr>
            </td>
            <td>{{ $a->id_areasusuarios }}</td>
            <td>{{ $a->area_id}}</td>
            <td>{{ $a->usuario_id}}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>