@extends('layouts.admin')
@section('nombre_pagina','Ver de cliente')
@section('css')
@endsection
@section('titulo de la pagina','vista de clientes')
@section('subtitulo','')

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

    <div class="col-md-12" id="creacionProveedores">
        <form action="{{route('administrador.proveedor.store')}}" method="post" id="administracion">
            @csrf
         <div class="tile">
           
            
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Tipo identificacion:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="nombre" v-model="tipo_identificacion" maxlength="20">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">identificacion:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="razon" v-model="identificacion" maxlength="20">
                </div>
            </div>

            
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Nombre:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="ruc" v-model="nombre" maxlength="20">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Apellidos:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="representante" v-model="apellidos" maxlength="20">
                </div>
            </div>

            

            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Ciudad:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="ciudad" v-model="ciudad" maxlength="20">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Sector:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="sector" v-model="sector" maxlength="20">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Fecha:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="date" name="fecha" v-model="fecha" maxlength="20">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Telefono:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="telefono" v-model="telefono" maxlength="20">
                </div>
            </div>
            

                <br>
               <!--<button type="input" class="btn btn-info" name="guardar" id="guardar">Agregar Proveedor</button> --><!-- v-on:click="guardar" -->
                <input type="hidden" v-model="estado" id="estado">
        </div>
        </form>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
                $("#estado").val(1);
        });
    </script>


@endsection

