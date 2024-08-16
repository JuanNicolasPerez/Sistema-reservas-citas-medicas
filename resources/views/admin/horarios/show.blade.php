@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Vista horario</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Vista horario</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- content -->
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Vista de los datos</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>

            </div>

            <div class="card-body">

                <div class="row">
                    {{-- DOCTORES --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="doctor_id">Doctor: </label>
                            <select name="doctor_id" id="doctor_id" class="form-control" disabled>    
                                <option>{{$horario->doctor->nombres." ".$horario->doctor->apellidos." - ".$horario->doctor->especialidad}}</option>
                            </select>
                        </div>
                    </div>

                    {{-- ESPECIALIDAD --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="especialidad">Consultorio: </label>
                            <select name="consultorio_id" id="consultorio_id" class="form-control" disabled>.
                                <option>{{$horario->consultorio->nombre.", Ubicacion: ".$horario->consultorio->ubicacion}}</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    {{-- DIAS --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="dia">Dias: </label>
                            <select name="dia" id="dia" class="form-control" disabled>.
                                <option>{{$horario->dia}}</option>
                            </select>
                        </div>
                    </div>

                    {{-- HORA INICIO --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="hora_inicio">Hora inicio: </label>
                            <input type="time" class="form-control" value="{{ $horario->hora_inicio }}" name="hora_inicio"
                                id="hora_inicio" disabled>
                        </div>
                    </div>

                    {{-- HORA FINAL --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="hora_fin">Hora fin: </label>
                            <input type="time" class="form-control" value="{{ $horario->hora_fin }}" name="hora_fin"
                                id="hora_fin" disabled>
                        </div>
                    </div>
                </div>

                {{-- ACCIONES --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <center>
                                <a href="{{ url('admin/horarios') }}" class="btn btn-secondary">Cancelar</a>
                            </center>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- /.content -->
@endsection
