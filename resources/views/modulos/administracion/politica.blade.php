@extends('layouts.proveedor')
@section('nombre_pagina','creacion de Usuario')
@section('css')
@endsection
@section('titulo de la pagina','Condiciones y politica')
@section('contenido')
     <div class="col-md-12" id="creacionProductos">
        <div class="tile">
            <form action="{{route('proveedor.store')}}" method="post" enctype="multipart/form-data" id="producto">
                @csrf
                <h4>DATOS BASICOS</h4>
                <hr>
                <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Tipo</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" name="Razon" v-model="Tipo" id="Tipo" placeholder="Tipo" min="3" max="50">
                </div>
            </div>

                
                <div class="form-group row">
                    <div class="col-md-1">
                        <label for="descripcion">Descripción:</label>
                    </div>
                    <div class="col-md-8 ">
                   <textarea class="form-control" v-model="descripciones" name="descripciones" minlength="15" maxlength="1000000" rows="2" placeholder="descripciónes">
                   </textarea>
                    </div>
                </div>
                
                <br id="br">
                <div id="inputs">
                </div>
                <br>
              <center>  <button type="button" class="btn btn-info" v-on:click="validar" name="guardar" id="guardar">Agregar</button></center>
            </form>

        </div>
        

@endsection
