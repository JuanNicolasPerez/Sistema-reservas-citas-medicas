@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6"></div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Historial clinico</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row" style="margin: 0">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Historial clinico</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                {{-- PACIENTE --}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="paciente_id">Paciente: </label>
                                        <select class="form-control" name="paciente_id" id="paciente_id" disabled>
                                            <option value="">
                                                {{ $historial->paciente->apellidos . ', ' . $historial->paciente->nombres }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                {{-- FECHA --}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="fecha_visita">Fecha de la cita medica: </label>
                                        <input class="form-control" type="date" name="fecha_visita" id="fecha_visita"
                                            value="<?php echo date('Y-m-d'); ?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            {{-- DESCRIPCION --}}
                            <div class="form-group">
                                <label for="descripcion">Descripcion: </label>
                                <p>
                                    {!! $historial->detalle !!}
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- ACCIONES --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <center>
                                    <a href="{{ url('admin/historial') }}" class="btn btn-secondary">Volver</a>
                                </center>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
