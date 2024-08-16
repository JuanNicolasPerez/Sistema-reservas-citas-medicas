@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Vista paciente</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Vista paciente</li>
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
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nombres">Nombres: </label>
                                <input type="text" class="form-control" value="{{ $paciente->nombres }}" name="nombres"
                                    id="nombres" disabled>
                            </div>
                        </div>

                        {{-- APELLIDOS --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="apellidos">Apellidos: </label>
                                <input type="text" class="form-control" value="{{ $paciente->apellidos }}" name="apellidos"
                                    id="apellidos" disabled>
                            </div>
                        </div>

                        {{-- DNI --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="dni">DNI: </label>
                                <input type="text" class="form-control" value="{{ $paciente->dni }}" name="dni"
                                    id="dni" disabled>
                            </div>
                        </div>

                        {{-- NRO SEGURO --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="numero_seguro">Nro Seguro: </label>
                                <input type="text" class="form-control" value="{{ $paciente->numero_seguro }}"
                                    name="numero_seguro" id="numero_seguro" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- FECHA DE NACIMIENTO --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="fecha_nacimiento">Fecha de nacimiento: </label>
                                <input type="text" class="form-control" value="{{ $paciente->fecha_nacimiento }}"
                                    name="fecha_nacimiento" id="fecha_nacimiento" disabled>
                            </div>
                        </div>

                        {{-- GENERO --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="genero">Genero: </label>
                                <select name="genero" class="form-control" id="genero" disabled>
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
                                    id="celular" disabled>
                            </div>
                        </div>

                        {{-- CONTACTO EMERGENCIA --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="contacto_emergencia">Contacto de emergencia: </label>
                                <input type="text" class="form-control" value="{{ $paciente->contacto_emergencia }}"
                                    name="contacto_emergencia" id="contacto_emergencia" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- CORREO --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="correo">Correo electronico: </label>
                                <input type="email" class="form-control" value="{{ $paciente->correo }}" name="correo"
                                    id="correo" disabled>
                            </div>
                        </div>

                        {{-- DIRECCION --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="direccion">Direccion: </label>
                                <input type="address" class="form-control" value="{{ $paciente->direccion }}"
                                    name="direccion" id="direccion" disabled>
                            </div>
                        </div>

                        {{-- GPO SANGUINEO --}}
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="grupo_sanguinio">Gpo Sanguineo: </label>
                                <select class="form-control" name="grupo_sanguinio" id="grupo_sanguinio" disabled>

                                    @if($paciente->grupo_sanguinio == 'A+')
                                        <option value="A+">A+</option>

                                    @elseif($paciente ->grupo_sanguinio == 'A-')
                                        <option value="A-">A-</option>

                                    @elseif($paciente ->grupo_sanguinio == 'B+')
                                        <option value="B+">B+</option>    

                                    @elseif($paciente ->grupo_sanguinio == 'B-')
                                        <option value="B-">B-</option> 

                                    @elseif($paciente ->grupo_sanguinio == 'O+')
                                        <option value="O+">O+</option>
                                        
                                    @else
                                        <option value="O-">O-</option> 
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
                                    name="alergias" id="alergias" disabled>
                            </div>
                        </div>

                        {{-- OBSERVACION --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="observacion">Observacion: </label>
                                <input type="text" class="form-control" value="{{ $paciente->observacion }}"
                                    name="observacion" id="observacion" disabled>
                            </div>
                        </div>
                    </div>

                    {{-- ACCIONES --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <center>
                                    <a href="{{ url('admin/pacientes') }}" class="btn btn-secondary">Volver</a>
                                </center>
                            </div>
                        </div>
                    </div>


            </div>

        </div>
    </div>
    <!-- /.content -->
@endsection
