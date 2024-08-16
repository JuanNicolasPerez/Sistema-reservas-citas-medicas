@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6"></div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Actualizar un pago</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row" style="margin: 0">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Controle los datos</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    {{-- FORMULARIO PAGOS --}}
                    <form action="{{ url('/admin/pagos', $pago->id) }}" method="post">
                        {{-- TOKEN DE FORMULARIO --}}
                        @csrf

                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    {{-- PACIENTE --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="paciente_id">Paciente: </label>
                                            <select class="form-control" name="paciente_id" id="paciente_id" required>
                                                @foreach ($pacientes as $paciente)
                                                    <option value="{{ $paciente->id }}" {{ $paciente->id == $pago->paciente_id ? 'selected' : '' }}>
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
                                                    <option value="{{ $doctor->id }}" {{ $doctor->id == $pago->doctor_id ? 'selected' : '' }}>
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
                                    <input type="date" class="form-control" name="fecha_pago" value="{{$pago->fecha_pago}}"
                                        id="fecha_pago">
                                </div>
                            </div>

                            {{-- DESCRIPCION --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="descripcion">Descripcion: </label>
                                    <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{$pago->descripcion}}">
                                </div>
                            </div>

                            {{-- MONTO --}}
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="monto">Monto: </label>
                                    <input type="text" class="form-control" name="monto" id="monto" value="{{$pago->monto}}">
                                </div>
                            </div>
                        </div>

                        {{-- ACCIONES --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <center>
                                        <a href="{{ url('admin/pagos') }}" class="btn btn-secondary">Cancelar</a>

                                        <button type="submit" class="btn btn-success">
                                            <i class="bi bi-floppy2"></i>
                                            Actualizar
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
