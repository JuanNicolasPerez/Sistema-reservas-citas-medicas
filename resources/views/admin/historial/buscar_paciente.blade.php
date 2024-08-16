@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Busqueda de paciente</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Busqueda de paciente</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- content -->
    <div class="col-md-8">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Buscar paciente</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <form action="{{route('admin.historial.buscar_paciente')}}" method="get">
                    <div class="row">
                        {{-- PACIENTE --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="dni">Paciente: </label>
                                <input type="text" class="form-control" name="dni" id="dni">
                            </div>
                        </div>
                    </div>

                    {{-- ACCIONES --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <center>
                                    <a href="{{ url('/admin') }}" class="btn btn-secondary">Cancelar</a>

                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-search"></i>
                                        Buscar
                                    </button>
                                </center>
                            </div>
                        </div>
                    </div>
                </form>

                <br>

                @if ($paciente)
                    <div class="row">
                        {{-- PACIENTE --}}
                        <div class="col-md-12">
                            <label for="dni">Paciente: </label>
                            <table class="table table-bordered table-sm table-striped">
                                <tr>
                                    <td><b>Paciente: </b></td>
                                    <td>{{ $paciente->apellidos . ', ' . $paciente->nombres }}</td>
                                </tr>

                                <tr>
                                    <td><b>Documento: </b></td>
                                    <td>{{ $paciente->dni }}</td>
                                </tr>

                                <tr>
                                    <td><b>Nro Obra Social: </b></td>
                                    <td>{{ $paciente->numero_seguro }}</td>
                                </tr>

                                <tr>
                                    <td><b>Fecha de nacimiento: </b></td>
                                    <td>{{ $paciente->fecha_nacimiento }}</td>
                                </tr>

                                <tr>
                                    <td><b>Celular: </b></td>
                                    <td>{{ $paciente->celular }}</td>
                                </tr>
                            </table>
                        </div>

                        {{-- ACCION --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <center>
                                    <a href="{{ url('admin/historial/paciente',$paciente->id) }}" class="btn btn-warning">Imprimir</a>
                                </center>
                            </div>
                        </div>
                    </div>
                @else
                    <input type="text" class="form-control" name="" value="Paciente no encontrado">
                @endif
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection
