@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Modificar secretaria</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Modificar secretaria</li>
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
                {{-- FORMULARIO SECETARIA --}}
                <form action="{{ url('/admin/secretarias',$secretaria->id) }}" method="post">
                    {{-- TOKEN DE FORMULARIO --}}
                    @csrf
                    {{-- METODO PARA ACTUALIZAR --}}
                    @method('PUT')
                    {{-- NOM - APE - DNI - CEL --}}
                    <div class="row">
                        {{-- NOMBRE --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nombres">Nombres: </label>
                                <input type="text" class="form-control" value="{{ $secretaria->nombres }}" name="nombres"
                                    id="nombres" required>
                                @error('nombres')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- APELLIDOS --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="apellidos">Apellidos: </label>
                                <input type="text" class="form-control" value="{{ $secretaria->apellidos }}" name="apellidos"
                                    id="apellidos" required>
                                @error('apellidos')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- DNI --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="dni	">DNI: </label>
                                <input type="text" class="form-control" value="{{ $secretaria->dni }}" name="dni"
                                    id="dni" required>
                                @error('dni')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- CELULAR --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="celular">Nro Celular: </label>
                                <input type="text" class="form-control" value="{{ $secretaria->celular }}" name="celular"
                                    id="celular" required>
                                @error('celular')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- FECH_NAC - DIR --}}
                    <div class="row">
                        {{-- FECHA DE NACIMIENTO --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="fecha_nacimiento">Fecha de nacimiento: </label>
                                <input type="date" class="form-control" value="{{ $secretaria->fecha_nacimiento }}"
                                    name="fecha_nacimiento" id="fecha_nacimiento" required>
                                @error('fecha_nacimiento')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- DIRECCION --}}
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="direccion">Direccion: </label>
                                <input type="address" class="form-control" value="{{ $secretaria->direccion }}" name="direccion"
                                    id="direccion" required>
                                @error('direccion')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- CORREO - PASSWORD --}}
                    <div class="row">
                        {{-- CORREO --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Correo electronico: </label>
                                <input type="email" class="form-control" value="{{ $secretaria->user->email }}" name="email"
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
                                <input type="password" class="form-control" name="password" id="password">
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
                                    id="password_confirmation">
                            </div>
                        </div>
                    </div>

                    {{-- ACCIONES --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <center>
                                    <a href="{{ url('admin/secretarias') }}" class="btn btn-secondary">Cancelar</a>

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
