@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Eliminar doctor</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Eliminar doctor</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- content -->
    <div class="col-md-12">
        <div class="card card-outline card-danger">
            <div class="card-header">
                <h3 class="card-title"> ¿Estás seguro de eliminar este registro? </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>

            </div>

            <div class="card-body">
                {{-- FORMULARIO USUARIO --}}
                <form action="{{ url('/admin/doctores', $doctor->id) }}" method="post">

                    {{-- TOKEN DE FORMULARIO --}}
                    @csrf

                    {{-- METODO PARA ELIMINRA --}}
                    @method('DELETE')

                    <div class="row">
                        {{-- NOMBRE --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombres">Nombres: </label>
                                <input type="text" class="form-control" value="{{ $doctor->nombres }}" name="nombres"
                                    id="nombres" disabled>
                            </div>
                        </div>
    
                        {{-- APELLIDOS --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="apellidos">Apellidos: </label>
                                <input type="text" class="form-control" value="{{ $doctor->apellidos }}" name="apellidos"
                                    id="apellidos" disabled>
                            </div>
                        </div>
    
                        {{-- TELEFONO --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="telefono">Celular: </label>
                                <input type="text" class="form-control" value="{{ $doctor->telefono }}" name="telefono"
                                    id="telefono" disabled>
                            </div>
                        </div>
                    </div>
    
                    <div class="row">
                        {{-- LICENCIA MEDICA --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="licencia_medica">Licencia medica: </label>
                                <input type="text" class="form-control" value="{{ $doctor->licencia_medica }}" name="licencia_medica"
                                    id="licencia_medica" disabled>
                            </div>
                        </div>
    
                        {{-- ESPECIALIDAD --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="especialidad">Especialidad: </label>
                                <input type="text" class="form-control" value="{{ $doctor->especialidad }}"
                                    name="especialidad" id="especialidad" disabled>
                            </div>
                        </div>
    
                        {{-- CORREO --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Correo electronico: </label>
                                <input type="email" class="form-control" value="{{$doctor->user->email }}" name="email"
                                    id="email" disabled>
                            </div>
                        </div>
                    </div>

                    {{-- ACCIONES --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <center>
                                    <a href="{{ url('admin/doctores') }}" class="btn btn-secondary">Cancelar</a>

                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-floppy2"></i>
                                        Eliminar
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
