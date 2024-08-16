@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Lista de usuarios</h1>

                    <br>

                    <div class="row">
                        {{-- CREAR --}}
                        <a type="button" class="btn btn-primary" href="{{ url('admin/usuarios/create') }}">
                            Crear Usuario
                            <i class="fa fa-fw bi bi-person-add"></i>
                        </a>
                    </div>

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Lista de usuarios</li>
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
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $contador = 0;
                ?>
                @foreach ($usuario as $usu)
                    <?php
                    $contador = $contador + 1;
                    $id = $usu->id;
                    ?>
                    <tr>
                        <td><?php echo $contador; ?></td>

                        <td>{{ $usu->name }}</td>
                        <td>{{ $usu->email }}</td>

                        <td style="text-align: center;">
                            <div class="btn-group" role="group" aria-label="Basic example">

                                {{-- MOSTRAR --}}
                                <a type="button" class="btn btn-info" href="{{ url('admin/usuarios/'.$usu->id) }}">
                                    <i class="fa fa-fw fa-eye"></i>
                                </a>

                                {{-- EDITAR --}}
                                <a type="button" class="btn btn-success" href="{{ url('admin/usuarios/'.$usu->id.'/edit') }}">
                                    <i class="fa fa-fw fa-edit"></i>
                                </a>

                                {{-- ELIMINAR --}}
                                <a type="button" class="btn btn-danger" href="{{ url('admin/usuarios/'.$usu->id.'/confirm-delete') }}">
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
                        "sInfo": "Mostrando  _START_ a _END_ de _TOTAL_ usuarios",
                        "sInfoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
                        "sInfoFiltered": "(filtrado de _MAX_ total usuarios)",
                        "sInfoPostFix": "",
                        "thousands": ",",
                        "sLengthMenu": "Mostrar _MENU_ usuarios",
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
