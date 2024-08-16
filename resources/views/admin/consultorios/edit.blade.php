@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Modificar consultorio</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Modificar consultorio</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- content -->
    <div class="col-md-12">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">Actualizar los datos</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>

            </div>

            <div class="card-body">
                {{-- FORMULARIO CONSULTORIO --}}
                <form action="{{ url('/admin/consultorios',$consultorio->id) }}" method="post">

                    {{-- TOKEN DE FORMULARIO --}}
                    @csrf

                    {{-- METODO PARA ACTUALIZAR --}}
                    @method('PUT')

                    <div class="row">
                        {{-- NOMBRE --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombre">Nombre: </label>
                                <input type="text" class="form-control" value="{{$consultorio->nombre }}" name="nombre"
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
                                <input type="text" class="form-control" value="{{ $consultorio->ubicacion }}" name="ubicacion"
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
                                <input type="text" class="form-control" value="{{ $consultorio->capacidad }}" name="capacidad"
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
                                <input type="text" class="form-control" value="{{ $consultorio->telefono }}"
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
                                <input type="text" class="form-control" value="{{ $consultorio->especialidad }}" name="especialidad"
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
                                <select name="estado" class="form-control" id="estado" required>
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
                                    <a href="{{ url('admin/consultorios') }}" class="btn btn-secondary">Cancelar</a>

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
    <!-- /.content -->
@endsection
