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
                    <h3 class="card-title">Generar reporte de reservas</h3>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <center>
                            <a type="button" target="_blank" class="btn btn-success" href="{{ url('admin/reservas/pdf') }}">
                                Listar de reservas
                            </a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin: 0">
        <div class="col-md-6">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Generar reporte de reservas por fechas</h3>
                </div>

                <div class="card-body">
                    <form action="{{route('admin.reservas.pdf_fechas')}}" method="get" target="_blank">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Fecha inicio: </label>
                                    <input type="date" class="form-control" name="fecha_inicio" id="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Fecha fin: </label>
                                    <input type="date" class="form-control" name="fecha_fin" id="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <center>
                                        <button type="submit" class="btn btn-success">
                                            <i class="bi bi-printer"></i>
                                            Generar reporte
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
