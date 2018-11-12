@extends('layouts.proveedor')
@section('nombre_pagina','Sugerencias')
@section('css')
@endsection
@section('titulo de la pagina','Sugerencias')
@endsection
@section('contenido')
 <script src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
  <script src="{{asset('js/jquery-migrate-1.4.1.js')}}"></script>
  <script src="{{asset('js/spectrum.js')}}"></script>
  <link type="text/css" rel="stylesheet" href="css/spectrum.css"/>

<ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#formulario">Categoria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabla">Sub_Categoria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#formular">Marca</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#taba">Colores</a>
                </li>
            </ul>

                <!-- Tab panes -->
            <div class="tab-content" >
                <div id="formulario" class="container tab-pane active"><br>
                        <div class="tile-body">
                            <div class="form-group row">
                                <label class="control-label col-md-2" for="atencion">Nombre Categoria</label>
                                <input class="form-control col-md-3" readonly type="text"  id="nombre_categoria">
                            </div>
                              <button type="button" class="btn btn-info" v-on:click="validar" name="guardar" id="guardar">Guardar</button>

                   <div class="tab-content" >
                      <div id="tabla" class="container tab-pane active"><br>
                        <div class="form-group row ">
                          <div class="col-md-2">
                        <label for="banco">Sub_Categoria</label>
                    </div>
                    <div class="col-md-6">
                         <select class="form-control" v-model="banco" name="banco"  >
                            <option value='1'> Carro </option>
                        </select>
                    </div>
            </div>
                  <input class="form-control col-md-3" readonly type="text"  id="nombre_sub/categoria">
                   <button type="button" class="btn btn-info" v-on:click="validar" name="guardar" id="guardar">Guardar</button>

              <div class="tab-content" >
                <div id="formular" class="container tab-pane active"><br>
                        <div class="tile-body">
                            <div class="form-group row">
                                <label class="control-label col-md-2" for="atencion">Nombre Marca</label>
                                <input class="form-control col-md-3" readonly type="text"  id="nombre_marca">
                            </div>
                              <button type="button" class="btn btn-info" v-on:click="validar" name="guardar" id="guardar">Guardar</button>
                 <div class="tab-content" >
                <div id="taba" class="container tab-pane active"><br>
                        <div class="tile-body">
            <label class="control-label col-md-2" for="atencion">Nombre Color</label>
                                <input class="form-control col-md-3" readonly type="text"  id="nombre_color">
                            <div id="color"><input type='text' class="colores" /></div>
                            <button type="button" class="btn btn-info" v-on:click="validar" name="guardar" id="guardar">Guardar</button>
                            <script>
                 $(".colores").spectrum({color:"#f00"});
                     </script>

                            </div>
</div>
</div>
</div>


@endsection
@section('script')
@endsection
