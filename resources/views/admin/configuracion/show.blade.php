@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6"></div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Vista configuración</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row" style="margin: 0">
        <div class="col-md-12">
            <div class="card card-outline card-info">
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
                        <div class="col-md-8">
                            <div class="row">
                                {{-- NOMBRE CLINICA --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombre">Nombre clinica: </label>
                                        <input type="text" class="form-control" value="{{ $configuracion->nombre }}"
                                            name="nombre" id="nombre" disabled>
                                        
                                    </div>
                                </div>

                                {{-- DIRECCION --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="direccion">Dirección: </label>
                                        <input type="address" class="form-control" value="{{ $configuracion->direccion }}"
                                            name="direccion" id="direccion" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                {{-- TELEFONO --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telefono">Telefono: </label>
                                        <input type="text" class="form-control" value="{{ $configuracion->telefono }}"
                                            name="telefono" id="telefono" disabled>
                                    </div>
                                </div>

                                {{-- CORREO --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="correo">Correo: </label>
                                        <input type="email" class="form-control" value="{{ $configuracion->correo }}"
                                            name="correo" id="correo" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            {{-- LOGO --}}
                            <div class="form-group">
                                <label for="">Logo: </label>
                                <center>
                                    <img src="{{url('storage/'.$configuracion->logo)}}" alt="Logo" width="150px">
                                </center>
                            </div>
                        </div>
                    </div>

                    {{-- ACCIONES --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <center>
                                    <a href="{{ url('admin/configuracion') }}" class="btn btn-secondary">Cancelar</a>
                                </center>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
