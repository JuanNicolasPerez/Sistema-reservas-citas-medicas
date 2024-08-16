@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6"></div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Vista de un pago</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row" style="margin: 0">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Controle los datos</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                {{-- PACIENTE --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="paciente_id">Paciente: </label>
                                        <select class="form-control" name="paciente_id" id="paciente_id" disabled>
                                            <option value="{{ $pago->paciente->id }}">
                                                {{ $pago->paciente->apellidos . ', ' . $pago->paciente->nombres }}
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                {{-- DOCTOR --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="doctor_id">Doctor: </label>
                                        <select class="form-control" name="doctor_id" id="doctor_id" disabled>
                                            <option value="{{ $pago->doctor->id }}">
                                                {{ $pago->doctor->apellidos . ', ' . $pago->doctor->nombres. ' - ' . $pago->doctor->especialidad }}
                                            </option>
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
                                <input type="date" class="form-control" name="fecha_pago" value="{{$pago->fecha_pago}}" id="fecha_pago" disabled>
                            </div>
                        </div>

                        {{-- DESCRIPCION --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="descripcion">Descripcion: </label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{$pago->descripcion}}" disabled>
                            </div>
                        </div>

                        {{-- MONTO --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="monto">Monto: </label>
                                <input type="text" class="form-control" name="monto" id="monto" value="{{$pago->monto}}" disabled>
                            </div>
                        </div>
                    </div>

                    {{-- ACCIONES --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <center>
                                    <a href="{{ url('admin/pagos') }}" class="btn btn-secondary">Cancelar</a>
                                    </button>
                                </center>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
