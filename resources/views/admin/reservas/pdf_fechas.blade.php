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
                {{ $configuracion->nombre }}<br>
                {{ $configuracion->direccion }}<br>
                {{ $configuracion->telefono }}<br>
                {{ $configuracion->correo }}<br>
            </td>
            <td width="500"></td>
            <td>
                <center>
                    <img src="{{ url('storage/' . $configuracion->logo) }}" alt="Logo" width="150px">
                </center>
            </td>
        </tr>
    </table>

    </br>

    {{-- TITULO --}}
    <h2 style="text-align: center"><u> Lista de reservas medicas </u></h2>

    <h4> Reservas desde: {{ $fecha_inicio }} hasta: {{ $fecha_fin }}</h4>

    <table class="table table-bordered table-sm table-striped">
        <thead>
            <tr style="background-color: #e7e7e7">
                <th style="text-align: center">Nro</th>
                <th style="text-align: center">Doctor</th>
                <th style="text-align: center">Especialidad</th>
                <th style="text-align: center">Fecha reserva</th>
                <th style="text-align: center">Hora reserva</th>
            </tr>
        </thead>

        <tbody>

            <?php $contador = 1; ?>

            @foreach ($eventos as $evento)
                <tr>
                    <td style="text-align: center">{{ $contador++ }}</td>
                    <td style="text-align: center">{{ $evento->doctor->nombres . ', ' . $evento->doctor->apellidos }}</td>
                    <td style="text-align: center">{{ $evento->doctor->especialidad }}</td>
                    <td style="text-align: center">{{ \Carbon\Carbon::parse($evento->start)->format('d-m-Y') }}</td>
                    <td style="text-align: center">{{ \Carbon\Carbon::parse($evento->start)->format('H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
