@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6"></div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Lista de configuración</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>



    <div class="row" style="margin: 0">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Lista de configuración</h3>
                    <div class="card-tools">
                        {{-- CREAR --}}
                        <a type="button" class="btn btn-primary" href="{{ url('admin/configuracion/create') }}">
                            Crear configuración
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="thead">
                            <tr>
                                <th>Nro</th>
                                <th>Clinica</th>
                                <th>Direccion</th>
                                <th>Telefono</th>
                                <th>Correo</th>
                                <th>Logo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $contador = 1;
                            ?>
                            @foreach ($configuraciones as $configuracion)
                                <tr>
                                    <td style="text-align: center">{{ $contador++ }}</td>

                                    <td style="text-align: center">{{ $configuracion->nombre }}</td>
                                    <td style="text-align: center">{{ $configuracion->direccion }}</td>
                                    <td style="text-align: center">{{ $configuracion->telefono }}</td>
                                    <td style="text-align: center">{{ $configuracion->correo }}</td>
                                    <td style="text-align: center">
                                        <img src="{{url('storage/'.$configuracion->logo)}}" alt="Logo" width="50px">
                                    </td>

                                    <td style="text-align: center;">
                                        <div class="btn-group" role="group" aria-label="Basic example">

                                            {{-- MOSTRAR --}}
                                            <a type="button" class="btn btn-info"
                                                href="{{ url('admin/configuracion/' . $configuracion->id) }}">
                                                <i class="fa fa-fw fa-eye"></i>
                                            </a>

                                            {{-- EDITAR --}}
                                            <a type="button" class="btn btn-success"
                                                href="{{ url('admin/configuracion/' . $configuracion->id . '/edit') }}">
                                                <i class="fa fa-fw fa-edit"></i>
                                            </a>

                                            {{-- ELIMINAR --}}
                                            <a type="button" class="btn btn-danger"
                                                href="{{ url('admin/configuracion/' . $configuracion->id . '/confirm-delete') }}">
                                                <i class="fa fa-fw fa-trash"></i>
                                            </a>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Datatables Idioma Español-->
                    <script>
                        $(function() {
                            $("#example1").DataTable({
                                "pageLenght": 10,
                                "language": {
                                    "semptyTable": "No hay informacion.",
                                    "sInfo": "Mostrando  _START_ a _END_ de _TOTAL_ configuraciones",
                                    "sInfoEmpty": "Mostrando 0 a 0 de 0 configuraciones",
                                    "sInfoFiltered": "(filtrado de _MAX_ total configuraciones)",
                                    "sInfoPostFix": "",
                                    "thousands": ",",
                                    "sLengthMenu": "Mostrar _MENU_ configuraciones",
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
                                            text: 'Copiar',
                                            extend: 'copy'
                                        }, {
                                            extend: 'pdf'
                                        }, {
                                            extend: 'csv'
                                        }, {
                                            extend: 'excel'
                                        }, {
                                            Text: 'Imprimir',
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
