@extends('layouts.proveedor')
@section('nombre_pagina','Sugerencias')
@section('css')
@endsection
@section('titulo de la pagina','Sugerencias')
@endsection
@section('contenido')

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
              <div class="tab-content" >
                <div id="formulario" class="container tab-pane active"><br>
                        <div class="tile-body">
                            <div class="form-group row">
            <div class="col-sm-12 col-sm-offset-2" style="background-color:white;">
                <table class="table table-hover table-bordered" v-if="marcasNumber !== 0" >
                    <thead>
                    <tr>
                        <th>Categoria</th>
                        <th>Sugerencia</th>
                         <th>Usuario</th>
                        <th>Acciones</th>
                        <th>Fecha</th>
                    </tr>
                    </thead>
             <button type="button" class="btn btn-success" v-on:click="">Aceptar</button>
                            <button type="button" class="btn btn-danger" v-on:click="">Decrinar</button>
                        </td>
                    </tr>
                    </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>
  <div class="tab-content" >
                <div id="tabla" class="container tab-pane active"><br>
                        <div class="tile-body">
                            <div class="form-group row">
            <div class="col-sm-12 col-sm-offset-2" style="background-color:white;">
                <table class="table table-hover table-bordered" v-if="marcasNumber !== 0" >
                    <thead>
                    <tr>
                        <th>Sub_Categoria</th>
                        <th>Sugerencia</th>
                         <th>Usuario</th>
                        <th>Acciones</th>
                        <th>Fecha</th>
                    </tr>
                    </thead>
             <button type="button" class="btn btn-success" v-on:click="">Aceptar</button>
                            <button type="button" class="btn btn-danger" v-on:click="">Decrinar</button>
                        </td>
                    </tr>
                    </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>
  <div class="tab-content" >
                <div id="formular" class="container tab-pane active"><br>
                        <div class="tile-body">
                            <div class="form-group row">
            <div class="col-sm-12 col-sm-offset-2" style="background-color:white;">
                <table class="table table-hover table-bordered" v-if="marcasNumber !== 0" >
                    <thead>
                    <tr>
                        <th>Marca</th>
                        <th>Sugerencia</th>
                         <th>Usuario</th>
                        <th>Acciones</th>
                        <th>Fecha</th>
                    </tr>
                    </thead>
             <button type="button" class="btn btn-success" v-on:click="">Aceptar</button>
                            <button type="button" class="btn btn-danger" v-on:click="">Decrinar</button>
                        </td>
                    </tr>
                    </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>
  <div class="tab-content" >
                <div id="taba" class="container tab-pane active"><br>
                        <div class="tile-body">
                            <div class="form-group row">
            <div class="col-sm-12 col-sm-offset-2" style="background-color:white;">
                <table class="table table-hover table-bordered" v-if="marcasNumber !== 0" >
                    <thead>
                    <tr>
                        <th>Color</th>
                        <th>Sugerencia</th>
                         <th>Usuario</th>
                        <th>Acciones</th>
                        <th>Fecha</th>
                    </tr>
                    </thead>
             <button type="button" class="btn btn-success" v-on:click="">Aceptar</button>
                            <button type="button" class="btn btn-danger" v-on:click="">Decrinar</button>
                        </td>
                    </tr>
                    </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>
</div>

@endsection
@section('script')
@endsection