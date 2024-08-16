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
    <h2 style="text-align: center"><u>Comprobante de Pago - Original</u></h2>

    <br>

    <table margin="5px">
        <tr>
            <td width="120px"><b>Sr(es): </b></td>
            <td>{{ $pago->paciente->apellidos . ', ' . $pago->paciente->nombres }}</td>
            <td width="100px"></td>
            <td rowspan="4">
                <div>
                    {{-- <img src="data:image/png;base64,{{$qrCodeBase64}}" alt="Codigo Barra" width="150px"> --}}
                </div>
            </td>
        </tr>

        <tr>
            <td><b>Fecha: </b></td>
            <td>{{ $pago->fecha_pago }}</td>
        </tr>

        <tr>
            <td><b>Consultorio: </b></td>
            <td> {{ $pago->doctor->especialidad }} </td>
        </tr>

        <tr>
            <td><b>Monto: </b></td>
            <td>$ {{ $pago->monto }}</td>
        </tr>

    </table>

    <br><br><br><br>

    <table>
        <tr>
            <td width="210px">
                <p style="text-align: center">
                    ------------------------------ <br>
                        <b>Secretaria</b><br>
                    {{Auth::user()->secretarias->apellidos.", ".Auth::user()->secretarias->nombres}}
                </p>
            </td>

            <td width="210px">
                <p style="text-align: center">
                    <br>
                        <b></b>
                    <br>
                </p>
            </td>

            <td width="210px">
                <p style="text-align: center">
                    ------------------------------ <br>
                        <b>Recibi comforme</b><br>  
                        <br>                  
                </p>
            </td>
        </tr>
    </table>

    <p>--------------------------------------------------------------------------------------------------------------------------------------
    </p>

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
    <h2 style="text-align: center"><u>Comprobante de Pago - Copia</u></h2>

    <br>

    <table margin="5px">
        <tr>
            <td width="120px"><b>Sr(es): </b></td>
            <td>{{ $pago->paciente->apellidos . ', ' . $pago->paciente->nombres }}</td>
            <td width="100px"></td>
            <td rowspan="4">
                <div>
                    {{-- <img src="data:image/png;base64,{{$qrCodeBase64}}" alt="Codigo Barra" width="150px"> --}}
                </div>
            </td>
        </tr>

        <tr>
            <td><b>Fecha: </b></td>
            <td>{{ $pago->fecha_pago }}</td>
        </tr>

        <tr>
            <td><b>Consultorio: </b></td>
            <td> {{ $pago->doctor->especialidad }} </td>
        </tr>

        <tr>
            <td><b>Monto: </b></td>
            <td>$ {{ $pago->monto }}</td>
        </tr>

    </table>

    <br><br><br><br>

    <table>
        <tr>
            <td width="210px">
                <p style="text-align: center">
                    ------------------------------ <br>
                        <b>Secretaria</b><br>
                    {{Auth::user()->secretarias->apellidos.", ".Auth::user()->secretarias->nombres}}
                </p>
            </td>

            <td width="210px">
                <p style="text-align: center">
                    <br>
                        <b></b>
                    <br>
                </p>
            </td>

            <td width="210px">
                <p style="text-align: center">
                    ------------------------------ <br>
                        <b>Recibi comforme</b><br>  
                        <br>                  
                </p>
            </td>
        </tr>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>

</html>
