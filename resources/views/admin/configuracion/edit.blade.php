@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6"></div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Modificar configuración</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row" style="margin: 0">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos</h3>
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
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    {{-- NOMBRE CLINICA --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nombre">Nombre clinica: </label>
                                            <input type="text" class="form-control" value="{{ $configuracion->nombre }}"
                                                name="nombre" id="nombre" required>
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
                                                name="direccion" id="direccion" required>
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
                                                name="telefono" id="telefono" required>
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
                                                name="correo" id="correo" required>
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
                                    <input type="file" class="form-control" name="logo" id="file">

                                    <br>

                                    {{-- VISUALIZA LA IMAGEN --}}
                                    <center>
                                        <output id="list">
                                            <img src="{{url('storage/'.$configuracion->logo)}}" alt="Logo" width="150px">
                                        </output>
                                    </center>

                                    <script>
                                        function archivo(evt) {
                                            var files = evt.target.files; // FileList object
                                            //Obtenemos la imagen del campo "file".
                                            for (var i = 0, f; f = files[i]; i++) {
                                                //Solo admitimos imágenes.
                                                if (!f.type.match('image.*')) {
                                                    continue;
                                                }
                                                var reader = new FileReader();
                                                reader.onload = (function (theFile) {
                                                    return function (e) {
                                                        // Insertamos la imagen.
                                                        document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target
                                                            .result, '"width="70%" title="', escape(theFile.name), '"/>'
                                                        ].join('');
                                                    };
                                                })(f);
                                                reader.readAsDataURL(f);
                                            }
                                        }
                                        document.getElementById('file').addEventListener('change', archivo, false);
                                    </script>
                                </div>
                            </div>
                        </div>

                        {{-- ACCIONES --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <center>
                                        <a href="{{ url('admin/configuracion') }}" class="btn btn-secondary">Cancelar</a>

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
    </div>
@endsection
