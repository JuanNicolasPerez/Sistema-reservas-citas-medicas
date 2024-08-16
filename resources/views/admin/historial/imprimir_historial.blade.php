<?php

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado reservas</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    {{-- ENCABEZADO --}}
    <table style="font-size: 10pt">
        <tr>
            <td style="text-align: center">
                {{$configuracion->nombre}}<br>
                {{$configuracion->direccion}}<br>
                {{$configuracion->telefono}}<br>
                {{$configuracion->correo}}<br>
            </td>
            <td width="500"></td>
            <td>
                <center>
                    <img src="{{url('storage/'.$configuracion->logo)}}" alt="Logo" width="150px">
                </center>
            </td>
        </tr>
    </table>

    </br>

    {{-- TITULO --}}
    <h2 style="text-align: center"><u>Historial Clinico</u></h2>

    <br>

    <h4><u>Datos del paciente: </u></h4>

    <table class="table table-bordered table-sm table-striped">
        <tr>
            <td><b>Paciente: </b></td>
            <td>{{$paciente->apellidos.", ".$paciente->nombres}}</td>
        </tr>

        <tr>
            <td><b>Documento: </b></td>
            <td>{{$paciente->dni}}</td>
        </tr>

        <tr>
            <td><b>Nro Obra Social: </b></td>
            <td>{{$paciente->numero_seguro}}</td>
        </tr>

        <tr>
            <td><b>Fecha de nacimiento: </b></td>
            <td>{{$paciente->fecha_nacimiento}}</td>
        </tr>

        <tr>
            <td><b>Celular: </b></td>
            <td>{{$paciente->celular}}</td>
        </tr>
    </table>

    <br>

    {{-- SUB-TITULO --}}
    <h2 style="text-align: center"><u>Resultado Clinico</u></h2>

    @foreach ($historiales as $historial)
        <table class="table table-bordered table-sm table-striped">
            <tr>
                <td><b>Fecha: </b></td>
                <td>{{$historial->fecha_visita}}</td>
            </tr>
        </table>

        <br>

        {{-- TITULO --}}
        <h4 style="text-align: center"><u>Resultado</u></h3>
        <p>
            {!!$historial->detalle!!}
        </p>
    @endforeach

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
