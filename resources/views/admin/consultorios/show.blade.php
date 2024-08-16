@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Vista consultorio</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Vista consultorio</li>
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
                    {{-- NOMBRE --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nombre">Nombre: </label>
                            <input type="text" class="form-control" value="{{ $consultorio->nombre }}" name="nombre"
                                id="nombre" disabled>
                        </div>
                    </div>

                    {{-- UBICACION --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ubicacion">Ubicacion: </label>
                            <input type="text" class="form-control" value="{{ $consultorio->ubicacion }}" name="ubicacion"
                                id="ubicacion" disabled>
                        </div>
                    </div>

                    {{-- CAPACIDAD --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="capacidad">Capacidad: </label>
                            <input type="text" class="form-control" value="{{ $consultorio->capacidad }}" name="capacidad"
                                id="capacidad" disabled>
                        </div>
                    </div>
                </div>

                <div class="row">
                    {{-- CELULAR --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="telefono">Celular: </label>
                            <input type="text" class="form-control" value="{{ $consultorio->telefono }}"
                                name="telefono" id="telefono" disabled>
                        </div>
                    </div>

                    {{-- ESPECIALIDAD --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="especialidad">Especialidad: </label>
                            <input type="text" class="form-control" value="{{ $consultorio->especialidad }}" name="especialidad"
                                id="especialidad" disabled>
                        </div>
                    </div>

                    {{-- ESTADO --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="estado">Estado: </label>
                            <select name="genero" class="form-control" id="genero" disabled>
                                @if($consultorio ->estado == 'ACTIVO')
                                    <option value="ACTIVO">ACTIVO</option>
                                    <option value="INACTIVO">INACTIVO</option>
                                @else
                                    <option value="INACTIVO">INACTIVO</option>
                                    <option value="ACTIVO">ACTIVO</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>

                {{-- ACCIONES --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <center>
                                <a href="{{ url('admin/consultorios') }}" class="btn btn-secondary">Volver</a>
                            </center>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
    <!-- /.content -->
@endsection
