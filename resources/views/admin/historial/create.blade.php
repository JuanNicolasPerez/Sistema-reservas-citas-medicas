@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6"></div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Crear historial</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row" style="margin: 0">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Historial clinico</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    {{-- FORMULARIO HISTORIAL --}}
                    <form action="{{ url('/admin/historial/create') }}" method="post">
                        {{-- TOKEN DE FORMULARIO --}}
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    {{-- PACIENTE --}}
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="paciente_id">Paciente: </label>
                                            <select class="form-control" name="paciente_id" id="paciente_id" required>
                                                @foreach ($pacientes as $paciente)
                                                    <option value="{{ $paciente->id }}">
                                                        {{ $paciente->apellidos . ', ' . $paciente->nombres }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    {{-- FECHA --}}
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="fecha_visita">Fecha de la cita medica: </label>
                                            <input class="form-control" type="date" name="fecha_visita" id="fecha_visita"
                                                value="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                {{-- DESCRIPCION --}}
                                <div class="form-group">
                                    <label for="descripcion">Descripcion: </label>
                                    <textarea class="form-control" name="detalle" id="editor" style="height: 100%; width: 100%" cols="30"
                                        rows="10">
                                    </textarea>

                                    {{-- CKeditor5 --}}
                                    <script type="importmap">
                                        {
                                            "imports": {
                                                "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.js",
                                                "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.0.0/"
                                            }
                                        }
                                    </script>

                                    <script type="module">
                                        import {
                                            ClassicEditor,
                                            Essentials,
                                            Bold,
                                            Italic,
                                            Font,
                                            Paragraph
                                        } from 'ckeditor5';
                                    
                                        ClassicEditor
                                            .create( document.querySelector( '#editor' ), {
                                                plugins: [ Essentials, Bold, Italic, Font, Paragraph ],
                                                toolbar: {
                                                    items: [
                                                        'undo', 'redo', '|', 'bold', 'italic', '|',
                                                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                                                    ]
                                                }
                                            } )
                                            .then( /* ... */ )
                                            .catch( /* ... */ );
                                    </script>
                                </div>
                            </div>
                        </div>

                        {{-- ACCIONES --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <center>
                                        <a href="{{ url('admin/historial') }}" class="btn btn-secondary">Cancelar</a>

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
    </div>
@endsection
