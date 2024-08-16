@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6"></div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Registro de un nuevo pago</li>
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
                    {{-- FORMULARIO PAGOS --}}
                    <form action="{{ url('/admin/pagos/create') }}" method="post" >
                        {{-- TOKEN DE FORMULARIO --}}
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    {{-- PACIENTE --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="paciente_id">Paciente: </label>
                                            <select class="form-control" name="paciente_id" id="paciente_id" required>
                                                @foreach ($pacientes as $paciente)
                                                    <option value="{{ $paciente->id }}">
                                                        {{ $paciente->apellidos . ', ' . $paciente->nombres }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    {{-- DOCTOR --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="doctor_id">Doctor: </label>
                                            <select class="form-control" name="doctor_id" id="doctor_id" required>
                                                @foreach ($doctores as $doctor)
                                                    <option value="{{ $doctor->id }}">
                                                        {{ $doctor->apellidos . ', ' . $doctor->nombres. ' - ' . $doctor->especialidad }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            {{-- FECHA --}}
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="fecha_pago">Fecha de pago: </label>
                                    <input type="date" class="form-control" name="fecha_pago" value="<?php echo date('Y-m-d'); ?>" id="fecha_pago">
                                </div>
                            </div>

                            {{-- DESCRIPCION --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="descripcion">Descripcion: </label>
                                    <input type="text" class="form-control" name="descripcion" id="descripcion">
                                </div>
                            </div>

                            {{-- MONTO --}}
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="monto">Monto: </label>
                                    <input type="text" class="form-control" name="monto" id="monto">
                                </div>
                            </div>
                        </div>

                        {{-- ACCIONES --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <center>
                                        <a href="{{ url('admin/pagos') }}" class="btn btn-secondary">Cancelar</a>

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
@endsection
