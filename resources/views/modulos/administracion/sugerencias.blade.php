@extends('layouts.admin')
@section('nombre_pagina','Sugerencias')
@section('css')
@endsection
@section('titulo de la pagina','principal')
@section('breadcrumbs')
    {{ Breadcrumbs::render('administracion') }}
@endsection
@section('contenido')
    <div class="col-md-12" id="sugerencia" v-cloak >
        <div class="tile" >
            <div class="container mt-3">
              <br>
              <!-- Nav tabs -->
              <br>
              <br>
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#home">Categoria</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#menu1">Sub_Categoria</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#menu2">Marca</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#menu3">Colores</a>
                </li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div id="home" class="container tab-pane active"><br>
                    <div class="col-sm-12 col-sm-offset-2" style="background-color:white;">
                            <table class="table table-hover table-bordered" v-if="!cmbCategoriasLength" >
                                <thead>
                                <tr>
                                    <th>SUGERENCIA</th>
                                    <th>USUARIO</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="dato in cmbCategorias">
                                    <td>@{{dato.sugerencias}}</td>
                                    <td>@{{dato.usuario}}</td>
                                    <td>
                                        <button type="button" class="btn btn-success" v-on:click="agregarSugerencia(1,dato.id,dato.sugerencias)" >Aceptar</button>
                                        <button type="button" class="btn btn-danger" v-on:click="eliminarSugerencia(dato.id)">Eliminar</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div v-else >
                                <div class="alert alert-danger">
                                    <p>No existen <strong> Sugerencia </strong>De Categorias</p>
                                </div>
                            </div>
                        </div>

                </div>
                <div id="menu1" class="container tab-pane fade"><br>
                  <div class="col-sm-12 col-sm-offset-2" style="background-color:white;" >
                            <table class="table table-hover table-bordered"  v-if="!cmbSubCategoriasLength">
                                <thead>
                                <tr>
                                    <th>SUGERENCIA</th>
                                    <th>CATEGORIA</th>
                                    <th>USUARIO</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tbody>
                                <tr v-for="dato in cmbSubCategorias">
                                    <td>@{{dato.sugerencias}}</td>
                                    <td>@{{dato.adicional}}</td>
                                    <td>@{{dato.usuario}}</td>
                                    <td>
                                        <button type="button" class="btn btn-success" v-on:click="agregarSugerencia(2,dato.id,dato.sugerencias,dato.adicional)" >Aceptar</button>
                                        <button type="button" class="btn btn-danger" v-on:click="eliminarSugerencia(dato.id)">Eliminar</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table >
                            <div v-else >
                                <div class="alert alert-danger">
                                    <p>No existen <strong> Sugerencia </strong>De SubCategorias</p>
                                </div>
                            </div>
                        </div>

                </div>
                <div id="menu2" class="container tab-pane fade"><br>
                  <div class="col-sm-12 col-sm-offset-2" style="background-color:white;" >
                            <table class="table table-hover table-bordered" v-if="!cmbMarcasLength" >
                                <thead>
                                <tr>
                                    <th>SUGERENCIA</th>
                                    <th>USUARIO</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="dato in cmbMarcas">
                                    <td>@{{dato.sugerencias}}</td>
                                    <td>@{{dato.usuario}}</td>
                                    <td>
                                        <button type="button" class="btn btn-success" v-on:click="agregarSugerencia(3,dato.id,dato.sugerencias)" >Aceptar</button>
                                        <button type="button" class="btn btn-danger" v-on:click="eliminarSugerencia(dato.id)">Eliminar</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div v-else>
                                <div class="alert alert-danger">
                                    <p>No existen <strong> Sugerencia </strong> De Marca</p>
                                </div>
                            </div>
                        </div>

                </div>
                <div id="menu3" class="container tab-pane fade"><br>
                   <div class="col-sm-12 col-sm-offset-2" style="background-color:white;">
                            <table class="table table-hover table-bordered" v-if="!cmbColoresLength" >
                                <thead>
                                <tr>
                                    <th>SUGERENCIA</th>
                                    <th>COLOR</th>
                                    <th>USUARIO</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tbody>
                                <tr v-for="dato in cmbColores">
                                    <td    >@{{dato.sugerencias}}</td>
                                    <td v-bind:style="{'background-color':dato.adicional}"></td>
                                    <td>@{{dato.usuario}}</td>
                                    <td>
                                        <button type="button" class="btn btn-success" v-on:click="agregarSugerencia(4,dato.id,dato.sugerencias,dato.adicional)"  >Aceptar</button>
                                        <button type="button" class="btn btn-danger" v-on:click="eliminarSugerencia(dato.id)">Eliminar</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div v-else >
                                <div class="alert alert-danger">
                                    <p>No existen <strong> Sugerencia </strong> De Colores</p>
                                </div>
                            </div>
                        </div>

                </div>
              </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
 <script src="{{asset('js/inside/sugerencias.js')}}"></script>
@endsection