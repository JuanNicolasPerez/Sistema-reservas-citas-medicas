@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Modificar paciente</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Modificar paciente</li>
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
                <form action="{{ url('/admin/pacientes',$paciente->id) }}" method="post">

                    {{-- TOKEN DE FORMULARIO --}}
                    @csrf

                    {{-- METODO PARA ACTUALIZAR --}}
                    @method('PUT')

                    <div class="row">
                        {{-- NOMBRE --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nombres">Nombres: </label>
                                <input type="text" class="form-control" value="{{ $paciente->nombres }}" name="nombres"
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
                                <input type="text" class="form-control" value="{{ $paciente->apellidos }}" name="apellidos"
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
                                <input type="text" class="form-control" value="{{ $paciente->dni }}" name="dni"
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
                                <input type="text" class="form-control" value="{{ $paciente->numero_seguro }}"
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
                                <input type="date" class="form-control" value="{{ $paciente->fecha_nacimiento }}"
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
                                <select name="genero" class="form-control" id="genero" required>
                                    @if($paciente -> genero == 'M')
                                        <option value="M">MASCULINO</option>
                                        <option value="F">FEMENINO</option>
                                    @else
                                        <option value="F">FEMENINO</option>
                                        <option value="M">MASCULINO</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        {{-- CELULAR --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="celular">Nro Celular: </label>
                                <input type="text" class="form-control" value="{{ $paciente->celular }}" name="celular"
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
                                <input type="text" class="form-control" value="{{ $paciente->contacto_emergencia }}"
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
                                <input type="email" class="form-control" value="{{ $paciente->correo }}" name="correo"
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
                                <input type="address" class="form-control" value="{{ $paciente->direccion }}"
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
                                <select class="form-control" name="grupo_sanguinio" id="grupo_sanguinio" required>

                                    @if($paciente->grupo_sanguinio == 'A+')
                                        <option value="A+">A+</option>
                                        
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>

                                    @elseif($paciente ->grupo_sanguinio == 'A-')
                                        <option value="A-">A-</option>

                                        <option value="A+">A+</option>                                        
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>

                                    @elseif($paciente ->grupo_sanguinio == 'B+')
                                        <option value="B+">B+</option>
                                        
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>

                                    @elseif($paciente ->grupo_sanguinio == 'B-')
                                        <option value="B-">B-</option>
                                        
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>

                                    @elseif($paciente ->grupo_sanguinio == 'O+')
                                        <option value="O+">O+</option>
                                        
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O-">O-</option>
                                    @else
                                        <option value="O-">O-</option>
                                        
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                    @endif

                                </select>                                  
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- ALERGIAS --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alergias">Alergias: </label>
                                <input type="tex" class="form-control" value="{{ $paciente->alergias }}"
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
                                <input type="text" class="form-control" value="{{ $paciente->observacion }}"
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
