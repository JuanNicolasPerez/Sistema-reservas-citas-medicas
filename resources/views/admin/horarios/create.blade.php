@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6"></div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Crear horario</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row" style="margin: 0">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    {{-- FORMULARIO SECETARIA --}}
                    <form action="{{ url('/admin/horarios/create') }}" method="post">
                        {{-- TOKEN DE FORMULARIO --}}
                        @csrf

                        <div class="row">
                            {{-- CONSULTORIO --}}
                            <div class="col-md-6">
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

                                    {{-- AJAX CONSULTORIOS --}}
                                    <script>
                                        $('#consultorio_select').on('change', function() {

                                            var consultorio_id = $('#consultorio_select').val();

                                            if (consultorio_id) {

                                                $.ajax({
                                                    url: "{{url('admin/horarios/consultorios/')}}" + '/' + consultorio_id,
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
                                </div>
                            </div>

                            {{-- DOCTORES --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="doctor_id">Doctor: </label>
                                    <select name="doctor_id" id="doctor_id" class="form-control">.
                                        @foreach ($doctores as $doctor)
                                            <option value="{{ $doctor->id }}">
                                                {{ $doctor->nombres . ' ' . $doctor->apellidos . ' - ' . $doctor->especialidad }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            {{-- DIAS --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="dia">Dias: </label>
                                    <select name="dia" id="dia" class="form-control">.
                                        <option value="LUNES">LUNES</option>
                                        <option value="MARTES">MARTES</option>
                                        <option value="MIERCOLES">MIERCOLES</option>
                                        <option value="JUEVES">JUEVES</option>
                                        <option value="VIERNES">VIERNES</option>
                                        <option value="SABADO">SABADO</option>
                                        <option value="DOMINGO">DOMINGO</option>
                                    </select>
                                </div>
                            </div>

                            {{-- HORA INICIO --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="hora_inicio">Hora inicio: </label>
                                    <input type="time" class="form-control" value="{{ old('hora_inicio') }}"
                                        name="hora_inicio" id="hora_inicio" required>
                                    @error('hora_inicio')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- HORA FINAL --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="hora_fin">Hora fin: </label>
                                    <input type="time" class="form-control" value="{{ old('hora_fin') }}" name="hora_fin"
                                        id="hora_fin" required>
                                    @error('hora_fin')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- ACCIONES --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <center>
                                        <a href="{{ url('admin/horarios') }}" class="btn btn-secondary">Cancelar</a>

                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-floppy2"></i>
                                            Guardar
                                        </button>
                                    </center>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="row" style="margin: 0">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Calendario de horarios</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                {{-- RESPUESTA AJAX CONSULTORIO --}}
                <div class="card-body">
                    <div id="consultorio_info">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
