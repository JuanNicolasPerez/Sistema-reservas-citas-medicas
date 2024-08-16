@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Crear paciente</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Crear paciente</li>
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
                {{-- FORMULARIO PACIENTE --}}
                <form action="{{ url('/admin/pacientes/create') }}" method="post">
                    {{-- TOKEN DE FORMULARIO --}}
                    @csrf

                    <div class="row">
                        {{-- NOMBRE --}}
                        <div class="col-md-3">
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
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="apellidos">Apellidos: </label>
                                <input type="text" class="form-control" value="{{ old('apellidos') }}" name="apellidos"
                                    id="apellidos" required>
                                @error('apellidos')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- DNI --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="dni">DNI: </label>
                                <input type="text" class="form-control" value="{{ old('dni') }}" name="dni"
                                    id="dni" required>
                                @error('dni')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- NRO SEGURO --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="numero_seguro	">Nro Seguro: </label>
                                <input type="text" class="form-control" value="{{ old('numero_seguro') }}"
                                    name="numero_seguro" id="numero_seguro" required>
                                @error('numero_seguro')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- FECHA DE NACIMIENTO --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="fecha_nacimiento">Fecha de nacimiento: </label>
                                <input type="date" class="form-control" value="{{ old('fecha_nacimiento') }}"
                                    name="fecha_nacimiento" id="fecha_nacimiento" required>
                                @error('fecha_nacimiento')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- GENERO --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="genero">Genero: </label>
                                <select class="form-control" name="genero" id="genero">
                                    <option value="M">MASCULINO</option>
                                    <option value="F">FEMENINO</option>
                                </select>
                            </div>
                        </div>

                        {{-- CELULAR --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="celular">Nro Celular: </label>
                                <input type="text" class="form-control" value="{{ old('celular') }}" name="celular"
                                    id="celular" required>
                                @error('celular')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- CONTACTO EMERGENCIA --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="contacto_emergencia">Contacto de emergencia: </label>
                                <input type="text" class="form-control" value="{{ old('contacto_emergencia') }}"
                                    name="contacto_emergencia" id="contacto_emergencia" required>
                                @error('contacto_emergencia')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- CORREO --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="correo">Correo electronico: </label>
                                <input type="email" class="form-control" value="{{ old('correo') }}" name="correo"
                                    id="correo" required>
                                @error('correo')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- DIRECCION --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="direccion">Direccion: </label>
                                <input type="address" class="form-control" value="{{ old('direccion') }}"
                                    name="direccion" id="direccion" required>
                                @error('direccion')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- GPO SANGUINEO --}}
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="grupo_sanguinio">Gpo Sanguineo: </label>
                                <select class="form-control" name="grupo_sanguinio" id="grupo_sanguinio">
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>                                
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- ALERGIAS --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alergias">Alergias: </label>
                                <input type="tex" class="form-control" value="{{ old('alergias') }}"
                                    name="alergias" id="alergias" required>
                                @error('alergias')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- OBSERVACION --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="observacion">Observacion: </label>
                                <input type="text" class="form-control" value="{{ old('observacion') }}"
                                    name="observacion" id="observacion" required>
                                @error('observacion')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- ACCIONES --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <center>
                                    <a href="{{ url('admin/pacientes') }}" class="btn btn-secondary">Cancelar</a>

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
