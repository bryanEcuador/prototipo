@extends('layouts.admin')
@section('nombre_pagina','Productos')
@section('css')
@endsection
@section('titulo de la pagina','productos')
@section('breadcrumbs')
    {{ Breadcrumbs::render('productos') }}
@endsection
@section('contenido')
    <div class="col-md-12" id="creacionProductos">
        <div class="tile">
                <h4>DATOS BASICOS</h4>
                <hr>
                <div class="form-group row justify-content-md-center">

                </div>
                <div class="form-group row">
                    <div class="col-md-1">
                        <label for="categoria">Categoria:</label>
                    </div>
                    <div class="col-md-3 ">
                        <input class="form-control" name="categoria" value="{{$datos[0]->id_categoria}}" readonly  >
                    </div>
                    <div class="col-md-1">
                        <label for="codigo">Sub categoria:</label>
                    </div>
                    <div class="col-md-3 ">
                        <input class="form-control" name="sub_categoria" value="{{$datos[0]->id_sub_categoria}}" readonly  >
                    </div>
                    <div class="col-md-1">
                        <label for="codigo">Marca:</label>
                    </div>
                    <div class="col-md-3 ">
                        <input class="form-control" name="marca" value="{{$datos[0]->id_marca}}" readonly  >
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-1">
                        <label for="nombre">Nombre:</label>
                    </div>
                    <div class="col-md-4 ">
                        <input class="form-control" name="nombre" value="{{$datos[0]->nombre}}" readonly  >
                    </div>
                    <div class="col-md-1">
                        <label for="codigo">Codigo:</label>
                    </div>
                    <div class="col-md-3 ">
                        <input class="form-control" name="codigo" value="{{$datos[0]->codigo}}" readonly  >
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-1">
                        <label for="descripcion">Descripción:</label>
                    </div>
                        <div class="col-md-11 ">
                            <input class="form-control" value="{{$datos[0]->descripcion}}" readonly  >
                        </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-1">
                        <label for="precio">Precio:</label>
                    </div>
                    <div class="col-md-2">
                        <input class="form-control" type="number" value="{{$datos[0]->precio}}" readonly  >
                    </div>
                    <div class="col-md-1">
                        <label for="iva">Iva:</label>
                    </div>
                    <div class="col-md-2 ">
                        <input class="form-control" type="number" value="{{$datos[0]->iva}}" readonly  >
                    </div>
                </div>
                <br>
                <h4>Imagenes del productoo</h4>
                <hr>
                @forelse($imagenes as $imagen)
                    <p> {{$imagen->color_id}}</p>
                    <hr>
            <div class="row">
                <div class="col-md-3">
                    <img src="{{$imagen->imagen1}}" class="img-thumbnail" alt="Cinque Terre" width="100%" height="auto"  >
                </div>
                <div class="col-md-3">
                    <img src="{{$imagen->imagen2}}" class="img-thumbnail" alt="Cinque Terre" width="100%" height="auto"  >
                </div>
                <div class="col-md-3">
                    <img src="{{$imagen->imagen3}}" class="img-thumbnail" width="100%" height="auto"  >
                </div>
            </div>
                    <br>

                @empty

                @endforelse


        </div>

    </div>
@endsection
@section('js')
@endsection