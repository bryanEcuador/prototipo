@extends('layouts.proveedor')
@section('nombre_pagina','Lista de Categoria')
@section('css')
@endsection
@section('titulo de la pagina','Categorias')
@section('contenido')
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap-grid.min.css">
    <body>
        <div class="col-md-12" id="permisos" >
        <div class="tile">
            <div class="col-md-12">
                <button class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#crearPermiso"> Crear </button>
               <div>
                   <label class="form-control-label" for="name">Burcar:</label>
                   <input  type="text"   class="col-md-4 form-control" placeholder="nombre" name="name" v-model="consulta" v-on:keyup.13="consultarNombre">
               </div>
            </div>
            <br>
            <hr>
            <div class="col-sm-12 col-sm-offset-2" style="background-color:white;">
                <table class="table table-hover table-bordered"  >
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombres</th>
                        <th>Slug</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-for="dato in permisos">
                            <td>@{{dato.id}}</td>
                            <td>@{{dato.name}}</td>
                            <td>@{{dato.slug}}</td>
                            <td>@{{dato.description}}</td>
                            <td>
                                    <button type="button" class="btn btn-info" v-on:click="ver(dato.id)">Ver</button>
                                    <button type="button" class="btn btn-success" v-on:click="editar(dato.id)">Actualizar</button>
                                    <button type="button" class="btn btn-danger" v-on:click="suprimir(dato.id)">Eliminar</button>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Nombres</th>
                        <th>Slug</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            
        </div>
     
</body>
@endsection
@section('js')
    <script src="/js/plugins/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>


@endsection