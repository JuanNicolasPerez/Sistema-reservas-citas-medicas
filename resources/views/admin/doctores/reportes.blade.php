@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6"></div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Reportes</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>



    <div class="row" style="margin: 0">
        <div class="col-md-6">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Generar reportes</h3>
                </div>

                <div class="card-body">
                    <a type="button" target="_blank" class="btn btn-success" href="{{ url('admin/doctores/pdf') }}">
                        Listar personal medico
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
