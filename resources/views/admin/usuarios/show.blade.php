@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Vista Usuario</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Vista Usuario</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- content -->
    <div class="col-md-6">
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

                {{-- NOMBRE USUARIO --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Nombre del usuario</label>
                            <input type="text" class="form-control" value="{{ $usuario->name }}" name="name"
                                id="name" required>

                        </div>
                    </div>
                </div>

                {{-- CORREO --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="email">Correo electronico</label>
                            <input type="email" class="form-control" value="{{ $usuario->email }}" name="email"
                                id="email" required>
                        </div>
                    </div>
                </div>

                {{-- ACCIONES --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <center>
                                <a href="{{ url('admin/usuarios') }}" class="btn btn-secondary">Cancelar</a>
                            </center>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- /.content -->
@endsection
