@extends('layouts.admin')
@section('nombre_pagina','información basica')
@section('css')
@endsection
@section('titulo de la pagina','información basica')
@section('subtitulo','Edición de datos')
@section('breadcrumbs')
    {{ Breadcrumbs::render('configuracion') }}
@endsection
@section('contenido')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
    @endif
    <div class="col-md-12" id="datosPagina">
        <form action="{{route('administrador.store.datos')}}" method="post" id="administracion">
            @csrf
            <div class="tile">
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="nombre">Nombre pagina:</label>
                    </div>
                    <div class="col-md-6 ">
                        <input class="form-control"  value="{{$datos[0]->nombre}}"  name="nombre"  id="nombre" placeholder="nombre pagina" minlength="3" maxlength="20">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="email">Email:</label>
                    </div>
                    <div class="col-md-6 ">
                        <input class="form-control"  value="{{$datos[0]->email}}" name="email" id="email" type="email"  placeholder="email de la pagina" minlength="9" >
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="Telefono">Teléfono:</label>
                    </div>
                    <div class="col-md-6 ">
                        <input class="form-control"  value="{{$datos[0]->telefono}}" name="telefono" id="Telefono" type="telf"  placeholder="telefono de contacto" minlength="3" maxlength="20">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="direccion">Dirección:</label>
                    </div>
                    <div class="col-md-6 ">
                        <input class="form-control"  value="{{$datos[0]->direccion}}" name="direccion"  id="direccion"   placeholder="dirección" minlength="3" maxlength="20">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="descripcion">Descripción:</label>
                    </div>
                    <div class="col-md-6 ">
                        <textarea class="form-control"  name="descripcion" id="descripcion" minlength="5" maxlength="50" >{{$datos[0]->descripcion}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="">Terminos y condiciones:</label>
                    </div>
                    <div class="col-md-10" >
                        <textarea class="form-control" name="terminos" id="terminos-ckeditor">
                            {!! $datos[0]->terminos !!}
                        </textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="">Politicas de privacidad:</label>
                    </div>
                    <div class="col-md-10" >
                        <textarea id="politicas-ckeditor" name="politicas">
                            {!! $datos[0]->politica !!}
                        </textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="">Acerca de:</label>
                    </div>
                    <div class="col-md-10 " >
                        <textarea id="acerca-ckeditor" name="acerca">
                            {!! $datos[0]->acerca !!}
                        </textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="">Ordenes y retornos:</label>
                    </div>
                    <div class="col-md-10 ">
                        <textarea id="ordenes-ckeditor" name="ordenes">
                            {!! $datos[0]->ordenes !!}
                        </textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="logo" class="col-md-2">Logo:</label>
                    <input type="file" class="form-control col-md-8" accept=image/png" name="logo" id="logo">
                </div>
                <br>
                <button type="submit" class="btn btn-info" name="guardar" id="guardar">Actualizar</button>
            </div>
        </form>
    </div>
@endsection
@section('js')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'acerca-ckeditor' );
        CKEDITOR.replace( 'terminos-ckeditor' );
        CKEDITOR.replace( 'politicas-ckeditor' );
        CKEDITOR.replace( 'ordenes-ckeditor' );
    </script>
    <script>

    </script>
@endsection

