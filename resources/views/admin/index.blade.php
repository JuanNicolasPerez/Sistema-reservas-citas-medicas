@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Panel Principal</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Panel Principal</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- content -->
    <div class="container">
        <div class="row">

            @can('admin.usuarios.index')
                {{-- MODULOS USUARIOS --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $total_usuarios }}</h3>
                            <p>Usuarios</p>
                        </div>
                        <div class="icon">
                            <i class="fas bi bi-people-fill"></i>
                        </div>
                        <a href="{{ url('admin/usuarios') }}" class="small-box-footer">
                            Mas info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            @endcan

            @can('admin.secretarias.index')
                {{-- MODULOS SECRETARIAS --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $total_secretarias }}</h3>
                            <p>Secretarias</p>
                        </div>
                        <div class="icon">
                            <i class="fas bi bi-person-circle"></i>
                        </div>
                        <a href="{{ url('admin/secretarias') }}" class="small-box-footer">
                            Mas info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            @endcan

            @can('admin.pacientes.index')
                {{-- MODULOS PACIENTES --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $total_pacientes }}</h3>
                            <p>Pacientes</p>
                        </div>
                        <div class="icon">
                            <i class="fas bi bi-person-fill-check"></i>
                        </div>
                        <a href="{{ url('admin/pacientes') }}" class="small-box-footer">
                            Mas info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            @endcan

            @can('admin.consultorios.index')
                {{-- MODULOS CONSULTORIOS --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-pink">
                        <div class="inner">
                            <h3>{{ $total_consultorios }}</h3>
                            <p>Consultorios</p>
                        </div>
                        <div class="icon">
                            <i class="fas bi bi-building-fill-add"></i>
                        </div>
                        <a href="{{ url('admin/consultorios') }}" class="small-box-footer">
                            Mas info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            @endcan

            @can('admin.doctores.index')
                {{-- MODULOS DOCTORES --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-orange">
                        <div class="inner">
                            <h3>{{ $total_doctores }}</h3>
                            <p>Doctores</p>
                        </div>
                        <div class="icon">
                            <i class="fas bi bi-person-lines-fill"></i>
                        </div>
                        <a href="{{ url('admin/doctores') }}" class="small-box-footer">
                            Mas info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            @endcan

            @can('admin.horarios.index')
                {{-- MODULOS HORARIOS --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $total_horarios }}</h3>
                            <p>Horarios</p>
                        </div>
                        <div class="icon">
                            <i class="fas bi bi-calendar2-week"></i>
                        </div>
                        <a href="{{ url('admin/horarios') }}" class="small-box-footer">
                            Mas info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            @endcan

            @can('admin.horarios.index')
                {{-- MODULOS RESERVAS --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-white">
                        <div class="inner">
                            <h3>{{ $total_eventos  }}</h3>
                            <p>Reservas</p>
                        </div>
                        <div class="icon">
                            <i class="fas bi bi-calendar2-check"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            <i class="fas bi bi-calendar2-check"></i>
                        </a>
                    </div>
                </div>
            @endcan

            @can('admin.horarios.index')
                {{-- MODULOS CONFIGURACION --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>{{ $total_configuraciones }}</h3>
                            <p>Configuracion</p>
                        </div>
                        <div class="icon">
                            <i class="fas bi bi-gear"></i>
                        </div>
                        <a href="{{ url('admin/configuracion') }}" class="small-box-footer">
                            Mas info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            @endcan

            {{-- USUARIO --}}
            @can('cargar_datos_consultorios')
                {{-- SECCION CONSULTORIOS --}}
                <div class="container">
                    <div class="row" style="margin: 0">
                        <div class="col-md-12">
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Calendario de horarios</h3>
                                </div>

                                <div class="card-body">

                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <select name="consultorio_id" id="consultorio_select" class="form-control">.
                                                <option value="">Seleccionar consultorio: </option>
                                                @foreach ($consultorios as $consultorio)
                                                    <option value="{{ $consultorio->id }}">
                                                        {{ $consultorio->nombre . ', Especialidad: ' . $consultorio->especialidad }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    {{-- AJAX CONSULTORIO --}}
                                    <script>
                                        $('#consultorio_select').on('change', function() {

                                            var consultorio_id = $('#consultorio_select').val();

                                            if (consultorio_id) {

                                                $.ajax({
                                                    url: "{{ url('/consultorios/') }}" + '/' + consultorio_id,
                                                    type: 'GET',
                                                    success: function(data) {
                                                        $('#consultorio_info').html(data);
                                                    },
                                                    error: function() {
                                                        alert('Error DE DATOS DEL CONSULTORIOS');
                                                    }
                                                });
                                            } else {
                                                $('#consultorio_info').html('');
                                            }
                                        });
                                    </script>

                                    <br>
                                    {{-- RESPUESTA AJAX CONSULTORIO --}}
                                    <div id="consultorio_info">

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- SECCION RESERVAS DE CITAS MEDICAS --}}
                <div class="container">
                    <div class="row" style="margin: 0">
                        <div class="col-md-12">
                            <div class="card card-outline card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Reserva de citas medicas</h3>
                                </div>

                                <div class="card-body">

                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <select name="doctor_id" id="doctor_select" class="form-control">.
                                                <option value="">Seleccionar doctor: </option>
                                                @foreach ($doctores as $doctor)
                                                    <option value="{{ $doctor->id }}">
                                                        {{ $doctor->nombres . ' - ' . $doctor->apellidos . ' - ' . $doctor->especialidad }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            {{-- AJAX DOCTOR --}}
                                            <script>
                                                $('#doctor_select').on('change', function() {

                                                    var doctor_id = $('#doctor_select').val();

                                                    var calendarEl = document.getElementById('calendar');

                                                    var calendar = new FullCalendar.Calendar(calendarEl, {
                                                        initialView: 'dayGridMonth',
                                                        locale: 'es',
                                                        events: []
                                                    });

                                                    if (doctor_id) {

                                                        $.ajax({
                                                            url: "{{ url('/cargar_reserva_doctores/') }}" + '/' + doctor_id,
                                                            type: 'GET',
                                                            dataType: 'json',
                                                            success: function(data) {
                                                                calendar.addEventSource(data);
                                                            },
                                                            error: function() {
                                                                alert('Error DE DATOS DEL DOCTOR');
                                                            }
                                                        });
                                                    } else {
                                                        $('#doctor_info').html('');
                                                    }

                                                    calendar.render();
                                                });
                                            </script>
                                        </div>
                                    </div>

                                    <div class="row" style="margin: 0">
                                        <!-- BOTON MODAL -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal">
                                            Registrar cita medica
                                        </button>

                                        <!-- BOTON MODAL VER RESERVAS-->
                                        <a href="{{ url('/admin/ver_reservas', Auth::user()->id) }}" class="btn btn-success">
                                            <i class="bi bi-calendar2-check"></i>
                                            Ver las reservas
                                        </a>
                                        {{-- FORMULARIO MODAL --}}
                                        <form action="{{ url('/admin/eventos/create') }}" method="post">
                                            @csrf
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Reservas de citas
                                                                medicas</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="">Doctor</label>
                                                                        <select class="form-control" name="doctor_id"
                                                                            id="">
                                                                            @foreach ($doctores as $doctor)
                                                                                <option value="{{ $doctor->id }}">
                                                                                    {{ $doctor->nombres . ', ' . $doctor->apellidos . ' - ' . $doctor->especialidad }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="fecha_reserva">Fecha</label>
                                                                        <input class="form-control" type="date"
                                                                            name="fecha_reserva" id="fecha_reserva"
                                                                            value="<?php echo date('Y-m-d'); ?>">

                                                                        {{-- VALIDAMOS LA FECHA --}}
                                                                        <script>
                                                                            document.addEventListener('DOMContentLoaded', function() {
                                                                                const fechaReservaInput = document.getElementById('fecha_reserva');

                                                                                // Escuchar el evento de cambio en el campor de fecha de reserva
                                                                                fechaReservaInput.addEventListener('change', function() {
                                                                                    // OBTENER LA FECHA SELECCIONADA
                                                                                    let selectedDate = this.value;

                                                                                    // OBTENER LA FECHA ACTUAL EN FORMATO ISO
                                                                                    let today = new Date().toISOString().slice(0, 10);

                                                                                    // VERIFICAR SI LA FECHA SELECCIONADA EN ANTERIOR A LA FECHA ACTUAL
                                                                                    if (selectedDate < today) {
                                                                                        //SI ES ASI, ESTABLECER LA FECHA SELECCIONADA EN NULL
                                                                                        this.value = null;
                                                                                        alert('No se puede reservar una fecha pasada.');
                                                                                    }

                                                                                });
                                                                            });
                                                                        </script>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="hora_reserva">Hora</label>
                                                                        <input class="form-control" type="time"
                                                                            name="hora_reserva" id="hora_reserva">
                                                                        @error('hora_reserva')
                                                                            <small style="color: red">{{ $message }}</small>
                                                                        @enderror

                                                                        {{-- Mensaje de alerta --}}
                                                                        @if ($message = Session::get('hora_reserva'))
                                                                            <script>
                                                                                document.addEventListener('DOMContentLoaded', function() {
                                                                                    $('#exampleModal').modal('show');
                                                                                });
                                                                            </script>
                                                                            <small
                                                                                style="color: red">{{ $message }}</small>
                                                                        @endif

                                                                        {{-- VALIDAMOS LA HORA --}}
                                                                        <script>
                                                                            document.addEventListener('DOMContentLoaded', function() {
                                                                                const horaReservaInput = document.getElementById('hora_reserva');

                                                                                // Escuchar el evento de cambio en el campo de la hora de reserva
                                                                                horaReservaInput.addEventListener('change', function() {
                                                                                    // OBTENER LA HORA SELECCIONADA
                                                                                    let selectedTime = this.value;

                                                                                    // ASEGURAMOS QUE SE CAPTURE SOLO LA HORA
                                                                                    if (selectedTime) {
                                                                                        // DIVIDIMOS LA CADENA EN HORAS Y MINUTOS
                                                                                        selectedTime = selectedTime.split(':');

                                                                                        // CONSERVAMOS SOLO LA HORA, NO LOS MINUTOS
                                                                                        selectedTime = selectedTime[0] + ':00';

                                                                                        // ESTABLECEMOS LA HORA MODIFICADA
                                                                                        this.value = selectedTime;
                                                                                    }

                                                                                    // VERIFICAMOS SI LA HORA SELECCIONADA ESTA FUERA DEL RANGO PERMITIDO
                                                                                    if (selectedTime < '08:00' || selectedTime > '20:00') {

                                                                                        //SI ES ASI, ESTABLECER LA HORA SELECCIONADA EN NULL
                                                                                        this.value = null;

                                                                                        alert('Por favor, seleccione una hora entre las 08:00 y las 20:00 horas.');
                                                                                    }

                                                                                });
                                                                            });
                                                                        </script>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-primary">Reservar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    {{-- FULL CALENDER --}}
                                    <div id='calendar'></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan

            @if (Auth::check() && Auth::user()->doctor)
                {{-- USUARIO DOCTOR --}}
                <div class="container">
                    <div class="row" style="margin: 0">
                        <div class="col-md-12">
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Calendario de reservas</h3>
                                </div>

                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead class="thead">
                                            <tr>
                                                <th>Nro</th>
                                                <th>Usuario</th>
                                                <th>Fecha de la reserva</th>
                                                <th>Hora de la reserva</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $contador = 1;
                                            ?>
                                            @foreach ($eventos as $evento)
                                                @if (Auth::user()->doctor->id == $evento->doctor_id)
                                                    <tr>
                                                        <td style="text-align: center">{{ $contador++ }}</td>
                                                        <td style="text-align: center">{{ $evento->user->name }}</td>
                                                        <td style="text-align: center">
                                                            {{ \Carbon\Carbon::parse($evento->start)->format('Y-m-d') }}
                                                        </td>
                                                        <td style="text-align: center">
                                                            {{ \Carbon\Carbon::parse($evento->start)->format('H:i') }}</td>
                                                    </tr>
                                                @endif
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
                </div>
            @endif
        </div>
    </div>
    <!-- /.content -->
@endsection
