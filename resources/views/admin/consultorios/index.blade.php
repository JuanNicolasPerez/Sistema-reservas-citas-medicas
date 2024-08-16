@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Lista de consultorios</h1>

                    <br>

                    <div class="row">
                        {{-- CREAR --}}
                        <a type="button" class="btn btn-primary" href="{{ url('admin/consultorios/create') }}">
                            Crear consultorio
                            <i class="fa fa-fw bi bi-building-fill-add"></i>
                        </a>
                    </div>

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Lista de consultorios</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- content -->
    <div class="container-fluid">
        <!-- Datatables -->
        <table id="example1" class="table table-bordered table-striped">
            <thead class="thead">
                <tr>
                    <th>Nro</th>
                    <th>Nombre</th>
                    <th>Ubicacion</th>
                    <th>Capacidad</th>
                    <th>Celular</th>
                    <th>Especialidad</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $contador = 0;
                ?>
                @foreach ($consultorios as $consul)
                    <?php
                    $contador = $contador + 1;
                    ?>
                    <tr>
                        <td style="text-align: center"><?php echo $contador; ?></td>

                        <td style="text-align: center">{{ $consul->nombre }}</td>
                        <td style="text-align: center">{{ $consul->ubicacion }}</td>
                        <td style="text-align: center">{{ $consul->capacidad}}</td>
                        <td style="text-align: center">{{ $consul->telefono}}</td>
                        <td style="text-align: center">{{ $consul->especialidad}}</td>
                        <td style="text-align: center">{{ $consul->estado}}</td>

                        <td style="text-align: center;">
                            <div class="btn-group" role="group" aria-label="Basic example">

                                {{-- MOSTRAR --}}
                                <a type="button" class="btn btn-info" href="{{ url('admin/consultorios/'.$consul->id) }}">
                                    <i class="fa fa-fw fa-eye"></i>
                                </a>

                                {{-- EDITAR --}}
                                <a type="button" class="btn btn-success" href="{{ url('admin/consultorios/'.$consul->id.'/edit') }}">
                                    <i class="fa fa-fw fa-edit"></i>
                                </a>

                                {{-- ELIMINAR --}}
                                <a type="button" class="btn btn-danger" href="{{ url('admin/consultorios/'.$consul->id.'/confirm-delete') }}">
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
                        "sInfo": "Mostrando  _START_ a _END_ de _TOTAL_ consultorios",
                        "sInfoEmpty": "Mostrando 0 a 0 de 0 consultorios",
                        "sInfoFiltered": "(filtrado de _MAX_ total consultorios)",
                        "sInfoPostFix": "",
                        "thousands": ",",
                        "sLengthMenu": "Mostrar _MENU_ consultorios",
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
    <!-- /.content -->
@endsection
