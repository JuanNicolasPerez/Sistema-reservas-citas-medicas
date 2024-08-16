@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6"></div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Lista de reservas</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>



    <div class="row" style="margin: 0">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Lista de reservas</h3>
                </div>

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="thead">
                            <tr>
                                <th>Nro</th>
                                <th>Doctor</th>
                                <th>Especialidad</th>
                                <th>Fecha de reserva</th>
                                <th>Hora de reserva</th>
                                <th>Fecha y hora de registros</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $contador = 0;
                            ?>
                            @foreach ($eventos as $evento)
                                <?php
                                $contador = $contador + 1;
                                ?>
                                <tr>
                                    <td style="text-align: center"><?php echo $contador; ?></td>
                                    <td style="text-align: center">
                                        {{ $evento->doctor->nombres . ', ' . $evento->doctor->apellidos }}</td>
                                    <td style="text-align: center">{{ $evento->doctor->especialidad }}</td>
                                    <td style="text-align: center">
                                        {{ \Carbon\Carbon::parse($evento->start)->format('Y-m-d') }}</td>
                                    <td style="text-align: center">
                                        {{ \Carbon\Carbon::parse($evento->start)->format('H:i') }}</td>
                                    <td style="text-align: center">{{ $evento->created_at }}</td>

                                    <td style="text-align: center;">
                                        <div class="btn-group" role="group" aria-label="Basic example">

                                            {{-- ELIMINAR --}}
                                            <form action="{{ url('/admin/eventos/destroy', $evento->id) }}" method="post"
                                                id="formulario{{ $evento->id }}"
                                                onclick="preguntar{{ $evento->id }}(event)">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-fw fa-trash"></i>
                                                </button>
                                            </form>
                                            <script>
                                                function preguntar{{ $evento->id }}(event) {
                                                    event.preventDefault();

                                                    Swal.fire({
                                                        title: "¿Esta seguro de elimionar este registro de reserva?",
                                                        text: "Si eliminar este registro, otro usuario podra reservar en este mismo horario.",
                                                        icon: "question",
                                                        showDenyButton: true,
                                                        showCancelButton: false,
                                                        confirmButtonText: "Eliminar",
                                                        denyButtonText: `Cancelar`
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            var form = $('#formulario{{ $evento->id }}');
                                                            form.submit();
                                                        }
                                                    });
                                                }
                                            </script>
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
                                    "sInfo": "Mostrando  _START_ a _END_ de _TOTAL_ reservas",
                                    "sInfoEmpty": "Mostrando 0 a 0 de 0 reservas",
                                    "sInfoFiltered": "(filtrado de _MAX_ total reservas)",
                                    "sInfoPostFix": "",
                                    "thousands": ",",
                                    "sLengthMenu": "Mostrar _MENU_ reservas",
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
