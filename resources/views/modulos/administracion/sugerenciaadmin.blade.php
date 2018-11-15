@extends('layouts.admin')
@section('nombre_pagina','Sugerencias')
@section('css')
@endsection
@section('titulo de la pagina','principal')
@section('breadcrumbs')
    {{ Breadcrumbs::render('administracion') }}
@endsection
@section('contenido')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  </head>
    <div class="col-md-12">
        <!-- contenido -->
        <div class="tile">
<body>

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
                <table class="table table-hover table-bordered" v-if="subcategoriasNumber !== 0" >
                    <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Sugerencia</th>
                        <th>Categoria</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="dato in cmbSubCategorias">
                        <td>@{{dato.usuario}}</td>
                        <td>@{{dato.sugerencia}}</td>
                        <td>@{{dato.categoria}}</td>
                        <td>
                            <button type="button" class="btn btn-success" v-on:click="editSubCategoria(dato.id,dato.nombre,dato.categoria_id)">Aceptar</button>
                            <button type="button" class="btn btn-danger" v-on:click="deleteSubCategoria(dato.id)">Eliminar</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div v-else>
                    <div class="alert alert-danger">
                        <p>No existen <strong> Sugerencia </strong>De Categorias</p>
                    </div>
                </div>
            </div>
            
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
      <div class="col-sm-12 col-sm-offset-2" style="background-color:white;">
                <table class="table table-hover table-bordered" v-if="subcategoriasNumber !== 0" >
                    <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Sugerencia</th>
                        <th>Sub_Categoria</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="dato in cmbSubCategorias">
                        <td>@{{dato.usuario}}</td>
                        <td>@{{dato.sugerencia}}</td>
                        <td>@{{dato.subcategoria}}</td>
                        <td>
                            <button type="button" class="btn btn-success" v-on:click="editSubCategoria(dato.id,dato.nombre,dato.categoria_id)">Aceptar</button>
                            <button type="button" class="btn btn-danger" v-on:click="deleteSubCategoria(dato.id)">Eliminar</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div v-else>
                    <div class="alert alert-danger">
                        <p>No existen <strong> Sugerencia </strong>De SubCategorias</p>
                    </div>
                </div>
            </div>
        
    </div>
    <div id="menu2" class="container tab-pane fade"><br>
      <div class="col-sm-12 col-sm-offset-2" style="background-color:white;">
                <table class="table table-hover table-bordered" v-if="subcategoriasNumber !== 0" >
                    <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Sugerencia</th>
                        <th>Marca</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="dato in cmbSubCategorias">
                        <td>@{{dato.usuario}}</td>
                        <td>@{{dato.sugerencia}}</td>
                        <td>@{{dato.Marca}}</td>
                        <td>
                            <button type="button" class="btn btn-success" v-on:click="editSubCategoria(dato.id,dato.nombre,dato.categoria_id)">Aceptar</button>
                            <button type="button" class="btn btn-danger" v-on:click="deleteSubCategoria(dato.id)">Eliminar</button>
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
                <table class="table table-hover table-bordered" v-if="subcategoriasNumber !== 0" >
                    <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Sugerencia</th>
                        <th>Color</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="dato in cmbSubCategorias">
                        <td>@{{dato.usuario}}</td>
                        <td>@{{dato.sugerencia}}</td>
                        <td>@{{dato.color}}</td>
                        <td>
                            <button type="button" class="btn btn-success" v-on:click="editSubCategoria(dato.id,dato.nombre,dato.categoria_id)">Aceptar</button>
                            <button type="button" class="btn btn-danger" v-on:click="deleteSubCategoria(dato.id)">Eliminar</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div v-else>
                    <div class="alert alert-danger">
                        <p>No existen <strong> Sugerencia </strong> De Colores</p>
                    </div>
                </div>
            </div>
     
    </div>
  </div>
</div>
</body>

            </div>
        </div>

    </div>


@endsection
@section('js')
@endsection