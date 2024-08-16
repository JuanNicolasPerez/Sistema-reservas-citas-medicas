@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6"></div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Lista de pagos</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row" style="margin: 0">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Lista de pagos</h3>
                    <div class="card-tools">
                        {{-- CREAR --}}
                        <a type="button" class="btn btn-primary" href="{{ url('admin/pagos/create') }}">
                            Crear pago
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="thead">
                            <tr>
                                <th>Nro</th>
                                <th>Paciente</th>
                                <th>Doctor</th>
                                <th>Fecha de pago</th>
                                <th>monto</th>
                                <th>Descripcion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $contador = 1;
                            ?>
                            @foreach ($pagos as $pago)
                                <tr>
                                    <td style="text-align: center">{{ $contador++ }}</td>

                                    <td style="text-align: center">{{ $pago->paciente->apellidos.", ".$pago->paciente->nombres }}</td>
                                    <td style="text-align: center">{{ $pago->doctor->apellidos.", ".$pago->doctor->nombres }}</td>
                                    <td style="text-align: center">{{ $pago->fecha_pago }}</td>
                                    <td style="text-align: center">{{ $pago->monto }}</td>
                                    <td style="text-align: center">{{ $pago->descripcion }}</td>

                                    <td style="text-align: center;">
                                        <div class="btn-group" role="group" aria-label="Basic example">

                                            {{-- MOSTRAR --}}
                                            <a type="button" class="btn btn-info"
                                                href="{{ url('admin/pagos/' . $pago->id) }}">
                                                <i class="fa fa-fw fa-eye"></i>
                                            </a>

                                            {{-- IMPRIMIR --}}
                                            <a type="button" class="btn btn-warning"
                                            href="{{ url('/admin/pagos/pdf/' . $pago->id) }}">
                                            <i class="bi bi-printer"></i>
                                            </a>
                                            {{-- EDITAR --}}
                                            <a type="button" class="btn btn-success"
                                                href="{{ url('admin/pagos/' . $pago->id . '/edit') }}">
                                                <i class="fa fa-fw fa-edit"></i>
                                            </a>

                                            {{-- ELIMINAR --}}
                                            <a type="button" class="btn btn-danger"
                                                href="{{ url('admin/pagos/' . $pago->id . '/confirm-delete') }}">
                                                <i class="fa fa-fw fa-trash"></i>
                                            </a>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <hr>
                    <p><h4>Resumen total de monto de los pagos: {{$total_pago}}</h4></p>

                    <!-- Datatables Idioma Español-->
                    <script>
                        $(function() {
                            $("#example1").DataTable({
                                "pageLenght": 10,
                                "language": {
                                    "semptyTable": "No hay informacion.",
                                    "sInfo": "Mostrando  _START_ a _END_ de _TOTAL_ pagos",
                                    "sInfoEmpty": "Mostrando 0 a 0 de 0 pagos",
                                    "sInfoFiltered": "(filtrado de _MAX_ total pagos)",
                                    "sInfoPostFix": "",
                                    "thousands": ",",
                                    "sLengthMenu": "Mostrar _MENU_ pagos",
                                    "sLoadingRecords": "Cargando...",
                                    "sProcessing": "Procesando...",
                                    "sSearch": "Buscar:",
                                    "sZeroRecords": "No se encontraron resultados",

                                    "paginate": {
                                        "sFirst": "Primero",
                                        "sLast": "Último",
                                        "sNext": "Siguiente",
                                        "sPrevious": "Anterior"
                                    }
                                },

                                "responsive": true,
                                "lengthChange": true,
                                "autoWidth": false,
                                buttons: [{
                                        text: 'Reportes',
                                        extend: 'collection',
                                        orientation: 'landscape',

                                        buttons: [{
                                            text:'Copiar',
                                            extend: 'copy'
                                        }, {
                                            text:'<button class="btn btn-danger btn-sm btn-block"><i class="bi bi-file-earmark-pdf-fill"></i> PDF </button>',
                                            extend: 'pdf'
                                        }, {
                                            text:'<button class="btn btn-info btn-sm btn-block"><i class="bi bi-filetype-csv"></i> CSV </button>',
                                            extend: 'csv'
                                        }, {
                                            text:'<button class="btn btn-success btn-sm btn-block"><i class="bi bi-file-earmark-excel-fill"></i> EXCEL </button>',
                                            extend: 'excel'
                                        }, {
                                            text:'<button class="btn btn-warning btn-sm btn-block"><i class="bi bi-printer-fill"></i> IMPRIMIR </button>',
                                            extend: 'print'
                                        }],
                                    },
                                    {
                                        extend: 'colvis',
                                        text: 'Visor de columnas',
                                        collectionLayout: 'fidex three-column'
                                    }
                                ],
                            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                        })
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
