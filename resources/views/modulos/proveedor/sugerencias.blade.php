@extends('layouts.proveedor')
@section('nombre_pagina','Sugerencias')
@section('css')
@endsection
@section('titulo de la pagina','Sugerencias')
@section('breadcrumbs')
    {{ Breadcrumbs::render('productos_proveedor') }}
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
      <br>
      <br>
       <div class="form-group row ">
          
          <div class="col-md-1">
                        <label for="categoria">Categoria:</label>
                    </div>
                    <div class="col-md-3 ">
                        <input class="form-control" name="categoria" v-model="categoria" id="categoria" placeholder="Nombre de Marca" min="3" max="20">
                    </div>
                </div>          
                <br>
                <br>
                  <button type="button" class="btn btn-info" v-on:click="enviarFormulario" name="guardar" id="guardar"> Guardar </button>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
     <br>
     <br>
      <div class="form-group row">
                    <div class="col-md-1">
                        <label for="categori">Categoria </label>
                    </div>
                    <div class="col-md-3">
                         <select class="form-control" v-model="categori" name="categori"  >
                            <option value='1'></option>
                        </select>
                    </div>

          <div class="col-md-2">
                        <label for="sub_sategoria"> Sub_Categoria  </label>
                    </div>
                    <div class="col-md-3 ">
                        <input class="form-control" name="sub_sategoria" v-model="sub_sategoria" id="sub_sategoria" placeholder="Nombre de Sub_Categoria" min="3" max="20">
                    </div>
                </div>          
                <br>
                <br>
                  <button type="button" class="btn btn-info" v-on:click="enviarFormulario" name="guardar" id="guardar"> Guardar </button>
    </div>
    <div id="menu2" class="container tab-pane fade"><br>
       <br>
      <br>
      <div class="form-group row">
          <div class="col-md-1">
                        <label for="marcas">Marcas:</label>
                    </div>
                    <div class="col-md-3 ">
                        <input class="form-control" name="marcas" v-model="marcas" id="marcas" placeholder="Nombre de Marca" min="3" max="20">
                    </div>
                </div>          
                <br>
                <br>
                  <button type="button" class="btn btn-info" v-on:click="enviarFormulario" name="guardar" id="guardar"> Guardar </button>
    </div>
    <div id="menu3" class="container tab-pane fade"><br>
      <br>
      <br>
     <div class="form-group row">
          <div class="col-md-1">
                        <label for="marcas">Color:</label>
                    </div>
                    <div class="col-md-3 ">
                        <input class="form-control" name="color" v-model="color" id="color" placeholder="Nombre de Color" min="3" max="20">
                    </div>
                </div>   
                <br>
                <br>
                  <button type="button" class="btn btn-info" v-on:click="enviarFormulario" name="guardar" id="guardar"> Guardar </button>
    </div>
  </div>
</div>
</body>

            </div>
        </div>

    </div>


@endsection
@section('script')
@endsection
