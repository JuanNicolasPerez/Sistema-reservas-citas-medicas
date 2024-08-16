@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Crear doctor</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Crear doctor</li>
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
                <h3 class="card-title">Ingrese los datos</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>

            </div>

            <div class="card-body">
                {{-- FORMULARIO SECETARIA --}}
                <form action="{{ url('/admin/doctores/create') }}" method="post">
                    {{-- TOKEN DE FORMULARIO --}}
                    @csrf

                    <div class="row">
                        {{-- NOMBRE --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombres">Nombres: </label>
                                <input type="text" class="form-control" value="{{ old('nombres') }}" name="nombres"
                                    id="nombres" required>
                                @error('nombres')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- APELLIDOS --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="apellidos">Apellidos: </label>
                                <input type="text" class="form-control" value="{{ old('apellidos') }}" name="apellidos"
                                    id="apellidos" required>
                                @error('apellidos')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>


                        {{-- CELULAR --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="telefono">Nro Celular: </label>
                                <input type="text" class="form-control" value="{{ old('telefono') }}" name="telefono"
                                    id="telefono" required>
                                @error('telefono')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- LICENCIA MEDICA --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="licencia_medica">Licencia medica: </label>
                                <input type="text" class="form-control" value="{{ old('licencia_medica') }}"
                                    name="licencia_medica" id="licencia_medica" required>
                                @error('licencia_medica')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- ESPECIALIDAD --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="especialidad">Especialidad: </label>
                                <input type="text" class="form-control" value="{{ old('especialidad') }}"
                                    name="especialidad" id="especialidad" required>
                                @error('especialidad')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- CORREO --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Correo electronico: </label>
                                <input type="email" class="form-control" value="{{ old('email') }}" name="email"
                                    id="email" required>
                                @error('email')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- PASSWORD --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="password">Contraseña: </label>
                                <input type="password" class="form-control" name="password" id="password" required>
                                @error('password')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- REPETIR PASSWORD --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="password_confirmation">Confirmar contraseña: </label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    id="password_confirmation" required>
                            </div>
                        </div>
                    </div>

                    {{-- ACCIONES --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <center>
                                    <a href="{{ url('admin/doctores') }}" class="btn btn-secondary">Cancelar</a>

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
