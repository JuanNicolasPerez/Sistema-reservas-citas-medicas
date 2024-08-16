@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6"></div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Lista de horarios</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>



    <div class="row" style="margin: 0">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Lista de horarios</h3>
                    <div class="card-tools">
                        {{-- CREAR --}}
                        <a type="button" class="btn btn-primary" href="{{ url('admin/horarios/create') }}">
                            Crear horario
                            <i class="fa fa-fw bi bi-calendar2-week"></i>
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="thead">
                            <tr>
                                <th>Nro</th>
                                <th>Doctor</th>
                                <th>Especialidad</th>
                                <th>Consultorio</th>
                                <th>Dia de atencion</th>
                                <th>Hora desde</th>
                                <th>Hora hasta</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $contador = 0;
                            ?>
                            @foreach ($horarios as $horario)
                                <?php
                                $contador = $contador + 1;
                                ?>
                                <tr>
                                    <td style="text-align: center"><?php echo $contador; ?></td>

                                    <td style="text-align: center">
                                        {{ $horario->doctor->nombres . ' ' . $horario->doctor->apellidos }}
                                    </td>
                                    <td style="text-align: center">{{ $horario->doctor->especialidad }}</td>
                                    <td style="text-align: center">
                                        {{ $horario->consultorio->nombre . ', Ubicacion: ' . $horario->consultorio->ubicacion }}
                                    </td>
                                    <td style="text-align: center">{{ $horario->dia }}</td>
                                    <td style="text-align: center">{{ $horario->hora_inicio }}</td>
                                    <td style="text-align: center">{{ $horario->hora_fin }}</td>

                                    <td style="text-align: center;">
                                        <div class="btn-group" role="group" aria-label="Basic example">

                                            {{-- MOSTRAR --}}
                                            <a type="button" class="btn btn-info"
                                                href="{{ url('admin/horarios/' . $horario->id) }}">
                                                <i class="fa fa-fw fa-eye"></i>
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
                                    "sInfo": "Mostrando  _START_ a _END_ de _TOTAL_ horarios",
                                    "sInfoEmpty": "Mostrando 0 a 0 de 0 horarios",
                                    "sInfoFiltered": "(filtrado de _MAX_ total horarios)",
                                    "sInfoPostFix": "",
                                    "thousands": ",",
                                    "sLengthMenu": "Mostrar _MENU_ horarios",
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

    <div class="row" style="margin: 0">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Calendario de horarios</h3>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="form-group">
                            <label for="">Consultorio: </label>
                            <select name="consultorio_id" id="consultorio_select" class="form-control">.
                                <option value="">Seleccionar consultorio: </option>
                                @foreach ($consultorios as $consultorio)
                                    <option value="{{ $consultorio->id }}">
                                        {{ $consultorio->nombre . ', Ubicacion: ' . $consultorio->ubicacion }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- AJAX CONSULTORIO --}}
                    <script>
                        $('#consultorio_select').on('change', function(){

                            var consultorio_id = $('#consultorio_select').val();

                            if(consultorio_id){

                                $.ajax({
                                    url: "{{url('admin/horarios/consultorios/')}}" + '/' + consultorio_id,
                                    type:'GET',
                                    success:function(data){
                                        $('#consultorio_info').html(data);
                                    },
                                    error: function (){
                                        alert('Error DE DATOS DEL CONSULTORIOS');
                                    }
                                });
                            }else{
                                $('#consultorio_info').html('');
                            }
                        });
                    </script>
                    
                    {{-- RESPUESTA AJAX CONSULTORIO --}}
                    <div id="consultorio_info">

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
