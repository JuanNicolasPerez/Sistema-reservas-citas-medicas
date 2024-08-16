@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6"></div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Eliminar configuración</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row" style="margin: 0">
        <div class="col-md-12">
            <div class="card card-outline card-danger">
                <div class="card-header">
                    <h3 class="card-title">¿Está seguro de eliminar este registro?</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    {{-- FORMULARIO CONFIGURACION --}}
                    <form action="{{ url('/admin/configuracion',$configuracion->id) }}" method="post" enctype="multipart/form-data">
                        {{-- TOKEN DE FORMULARIO --}}
                        @csrf

                        {{-- METODO --}}
                        @method('DELETE')

                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    {{-- NOMBRE CLINICA --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nombre">Nombre clinica: </label>
                                            <input type="text" class="form-control" value="{{ $configuracion->nombre }}"
                                                name="nombre" id="nombre" disabled>
                                            @error('nombre')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- DIRECCION --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="direccion">Dirección: </label>
                                            <input type="address" class="form-control" value="{{ $configuracion->direccion }}"
                                                name="direccion" id="direccion" disabled>
                                            @error('direccion')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
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
                                            @error('telefono')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- CORREO --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="correo">Correo: </label>
                                            <input type="email" class="form-control" value="{{ $configuracion->correo }}"
                                                name="correo" id="correo" disabled>
                                            @error('correo')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                {{-- LOGO --}}
                                <div class="form-group">
                                    <label for="">Logo: </label>
                                    <br>
                                    {{-- VISUALIZA LA IMAGEN --}}
                                    <center>
                                        <output id="list">
                                            <img src="{{url('storage/'.$configuracion->logo)}}" alt="Logo" width="150px">
                                        </output>
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
    </div>
@endsection
