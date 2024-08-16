@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Crear consultorio</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Crear consultorio</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- content -->
    <div class="col-md-10">
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
                {{-- FORMULARIO CONSULTORIO --}}
                <form action="{{ url('/admin/consultorios/create') }}" method="post">
                    {{-- TOKEN DE FORMULARIO --}}
                    @csrf

                    <div class="row">
                        {{-- NOMBRE --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombre">Nombre: </label>
                                <input type="text" class="form-control" value="{{ old('nombre') }}" name="nombre"
                                    id="nombre" required>
                                @error('nombre')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- UBICACION --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ubicacion">Ubicacion: </label>
                                <input type="text" class="form-control" value="{{ old('ubicacion') }}" name="ubicacion"
                                    id="ubicacion" required>
                                @error('ubicacion')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- CAPACIDAD --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="capacidad">Capacidad: </label>
                                <input type="text" class="form-control" value="{{ old('capacidad') }}" name="capacidad"
                                    id="capacidad" required>
                                @error('capacidad')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- CELULAR --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="telefono">Celular: </label>
                                <input type="text" class="form-control" value="{{ old('telefono') }}"
                                    name="telefono" id="telefono" required>
                                @error('telefono')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- ESPECIALIDAD --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="especialidad">Especialidad: </label>
                                <input type="text" class="form-control" value="{{ old('especialidad') }}" name="especialidad"
                                    id="especialidad" required>
                                @error('especialidad')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- ESTADO --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="estado">Estado: </label>
                                <select class="form-control" name="estado" id="estado" required>
                                    <option value="ACTIVO">ACTIVO</option>
                                    <option value="INACTIVO">INACTIVO</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- ACCIONES --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <center>
                                    <a href="{{ url('admin/consultorios') }}" class="btn btn-secondary">Cancelar</a>

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
    <!-- /.content -->
@endsection
