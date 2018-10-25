@extends('layouts.admin')
@section('nombre_pagina','Datos de pagina')
@section('css')
@endsection
@section('titulo de la pagina','Datos de la pagina')
@section('subtitulo de la pagina','Editar datos de la pagina')
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
                        <input class="form-control"  name="nombre"  id="nombre" placeholder="nombre pagina" minlength="3" maxlength="20">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="email">Email:</label>
                    </div>
                    <div class="col-md-6 ">
                        <input class="form-control" name="email" id="email" type="email"  placeholder="email de la pagina" minlength="9" >
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="Telefono">Teléfono:</label>
                    </div>
                    <div class="col-md-6 ">
                        <input class="form-control" name="Telefono" id="Telefono" type="telf"  placeholder="telefono de contacto" minlength="3" maxlength="20">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="direccion">Dirección:</label>
                    </div>
                    <div class="col-md-6 ">
                        <input class="form-control" name="direccion"  id="direccion"   placeholder="dirección" minlength="3" maxlength="20">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="descripcion">Descripción:</label>
                    </div>
                    <div class="col-md-6 ">
                        <textarea class="form-control"  placeholder="descripción de la pagina" name="descripcion" id="descripcion" minlength="5" maxlength="50">

                        </textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="">Terminos y condiciones:</label>
                    </div>
                    <div class="col-md-10" >
                        <textarea id="terminos-ckeditor" name="terminos"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="">Politicas de privacidad:</label>
                    </div>
                    <div class="col-md-10" >
                        <textarea id="politicas-ckeditor" name="politicas"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="">Acerca de:</label>
                    </div>
                    <div class="col-md-10 " >
                        <textarea id="acerca-ckeditor" name="acerca"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="">Ordenes y retornos:</label>
                    </div>
                    <div class="col-md-10 ">
                        <textarea id="ordenes-ckeditor" name="ordenes"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="logo" class="col-md-2">Logo:</label>
                    <input type="file" class="form-control col-md-8" accept=image/png" name="logo" id="logo">
                </div>
                <br>
                <button type="submit" class="btn btn-info" id="guardar">Aceptar</button>
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

