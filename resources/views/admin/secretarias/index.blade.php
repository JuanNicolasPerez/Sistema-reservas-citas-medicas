@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Lista de secretarias</h1>

                    <br>

                    <div class="row">
                        {{-- CREAR --}}
                        <a type="button" class="btn btn-primary" href="{{ url('admin/secretarias/create') }}">
                            Crear Secretaria
                            <i class="fa fa-fw bi bi-person-circle"></i>
                        </a>
                    </div>
                </div><!-- /.col -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Lista de secretarias</li>
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
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>DNI</th>
                    <th>Celular</th>
                    <th>Fecha de nacimiento</th>
                    <th>Direccion</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $contador = 0;
                ?>
                @foreach ($secretarias as $secretaria)
                    <?php
                    $contador = $contador + 1;
                    ?>
                    <tr>
                        <td><?php echo $contador; ?></td>

                        <td>{{ $secretaria->nombres }}</td>
                        <td>{{ $secretaria->apellidos }}</td>
                        <td>{{ $secretaria->dni}}</td>
                        <td>{{ $secretaria->celular}}</td>
                        <td style="text-align: center;">{{ $secretaria->fecha_nacimiento}}</td>
                        <td>{{ $secretaria->direccion}}</td>

                        {{-- REALIZAMOS LA RELACION PARA TRAER EL EMAIL DE USERS--}}
                        <td>{{ $secretaria->user->email}}</td>

                        <td style="text-align: center;">
                            <div class="btn-group" role="group" aria-label="Basic example">

                                {{-- MOSTRAR --}}
                                <a type="button" class="btn btn-info" href="{{ url('admin/secretarias/'.$secretaria->id) }}">
                                    <i class="fa fa-fw fa-eye"></i>
                                </a>

                                {{-- EDITAR --}}
                                <a type="button" class="btn btn-success" href="{{ url('admin/secretarias/'.$secretaria->id.'/edit') }}">
                                    <i class="fa fa-fw fa-edit"></i>
                                </a>

                                {{-- ELIMINAR --}}
                                <a type="button" class="btn btn-danger" href="{{ url('admin/secretarias/'.$secretaria->id.'/confirm-delete') }}">
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
                        "sInfo": "Mostrando  _START_ a _END_ de _TOTAL_ secretarias",
                        "sInfoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
                        "sInfoFiltered": "(filtrado de _MAX_ total secretarias)",
                        "sInfoPostFix": "",
                        "thousands": ",",
                        "sLengthMenu": "Mostrar _MENU_ secretarias",
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
