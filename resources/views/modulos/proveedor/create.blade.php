@extends('layouts.proveedor')
@section('nombre_pagina','crear')
@section('css')
@endsection
@section('titulo de la pagina','Crear articulos')
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

    <div class="col-md-12" id="creacionProductos" v-cloak>
        <div class="tile">
            <form action="{{route('proveedor.store')}}" method="post" enctype="multipart/form-data" id="producto" v-on:submit.prevent="validar">
                @csrf
                <h4>DATOS BASICOS</h4>
                <hr>
                <div class="form-group row justify-content-md-center">
                    <div class="col-md-4 form-group row" >
                        <select class="form-control col-md-8" v-model="categoria" name="categoria" v-on:change="cambioCategoria">
                            <option value='0'  disabled >Categoria</option>
                            <option v-for="dato in cmbCategoria" :value=" dato.id" > @{{ dato.nombre }} </option>
                        </select>
                        <i class="fa fa-plus fa-3x col-md-4"  aria-hidden="true" data-toggle="modal" data-target="#sugerenciaCategoria"></i>
                    </div>
                    <div class="col-md-4 form-group row ">
                        <select class="form-control col-md-8" v-model="sub_categoria" name="sub_categoria">
                            <option value='0'  disabled>Sub-Categoria</option>
                            <option v-for="dato in cmbSubCategoria" :value=" dato.id" > @{{ dato.nombre }} </option>
                        </select>
                        <i class="fa fa-plus fa-3x col-md-4"  aria-hidden="true" data-toggle="modal" data-target="#sugerenciaSubCategoria"></i>
                    </div>
                    <div class="col-md-4 form-group row">
                        <select class="form-control col-md-8" v-model="marca" name="marca">
                            <option value='0'  disabled>Marca</option>
                            <option v-for="dato in cmbMarca" :value=" dato.id" > @{{ dato.nombre }} </option>
                        </select>
                        <i class="fa fa-plus fa-3x col-md-4"  aria-hidden="true" data-toggle="modal" data-target="#sugerenciaMarca"></i>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-1">
                        <label for="nombre">Nombre:</label>
                    </div>
                    <div class="col-md-4 ">
                        <input class="form-control" name="nombre" v-model="nombre" id="nombre" placeholder="nombre del producto" min="3" max="20"  value="{{ old('nombre') }}" autocomplete="off">
                    </div>
                    <div class="col-md-1">
                        <label for="codigo">Codigo:</label>
                    </div>
                    <div class="col-md-3 ">
                        <input class="form-control" name="codigo" v-model="codigo" id="codigo" placeholder="codigo del producto" min="3" max="20">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-1">
                        <label for="descripcion">Descripción:</label>
                    </div>
                    <div class="col-md-8 ">
                   <textarea class="form-control" v-model="descripcion" name="descripcion" minlength="15" maxlength="250" rows="2" placeholder="descripción del producto">
                   </textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-1">
                        <label for="precio">Precio:</label>
                    </div>
                    <div class="col-md-2">
                        <input class="form-control" type="number" placeholder="Precio" name="precio" id="precio" v-model="precio" min="0">
                    </div>
                    <div class="col-md-1">
                        <label for="iva">Iva:</label>
                    </div>
                    <div class="col-md-2 ">
                        <select class="form-control" v-model="iva" >
                            <option v-for="dato in cmbIva" v.bind:value="dato.valor"> @{{dato.valor}}</option>
                        </select>
                    </div>
                </div>
                <br>
                <h4>Imagenes del producto</h4>
                <hr>
                <label >Seleccione los colores en orden:</label>
                <select class="form-control" name="colores[]" id="colores" multiple="multiple" v-model="colores" v-on:change="crearInputs">
                    <option v-for="dato in cmbColores" :value=" dato.id" > @{{ dato.nombre }} </option>
                </select>

                <br id="br">
                <div id="inputs">
                </div>
                <br>
                <button type="submit" class="btn btn-info" name="guardar" id="guardar">Agregar produto</button>
            </form>
        </div>
        <!-- Modales -->
            <!-- Creacion de categorias modal -->
            <div class="modal fade" id="sugerenciaCategoria">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Sugerencia de categoria</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="input-group">
                                <input class="form-control" placeholder="nombre de la categoria a sugerir" type="text" autocomplete="off" maxlength="15" v-model="sugerenciaCategoria">
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" v-on:click="agregarSugerencia(1)">Guardar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>

                    </div>
                </div>
            </div>
            <!-- //Creacion de categorias modal -->

            <!-- Creacion de Marcas modal -->
            <div class="modal fade" id="sugerenciaMarca">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Sugerencia de marca</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="input-group">
                            <input class="form-control" placeholder="nombre de la marca a sugerir" type="text" autocomplete="off" maxlength="15" v-model="sugerenciaMarca" v-on:keyup.13="agregarSugerencia(3)">
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" v-on:click="agregarSugerencia(3)">Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>

                </div>
            </div>
        </div>
            <!-- //Creacion de Marcas modal -->

            <!-- Creacion de colores modal -->
            <div class="modal fade" id="sugerenciaColor">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Sugerencia de color</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="input-group">
                            <input class="form-control" placeholder="nombre del color a sugerir" type="text" autocomplete="off" maxlength="15" v-model="sugerenciaColor">
                        </div>
                        <label>Eliga el color:</label><br>
                        <div class="input-group">
                            <input class=""  type="color" autocomplete="off" maxlength="15" v-model="sugerenciaHexadecimal">
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" v-on:click="agregarSugerencia(4)">Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>

                </div>
            </div>
        </div>
            <!-- //Creacion de colores modal -->

            <!-- Creacion de SubCategorias modal -->
            <div class="modal fade" id="sugerenciaSubCategoria">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Sugerencia de subcategoria</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="input-group">
                            <select class="form-control" v-model="sugerencia_Categoria" >
                                <option v-for="dato in cmb_categorias" :value="dato.id"> @{{dato.nombre}} </option>
                            </select>
                        </div>
                        <div class="input-group">
                            <input class="form-control" placeholder="nombre de la subcategoria a sugerir" type="text" autocomplete="off" maxlength="15" v-model="sugerenciaSubCategoria">
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" v-on:click="agregarSugerencia(2)">Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>

                </div>
            </div>
        </div>
            <!-- //Creacion de SubCategorias modal -->
    </div>
@endsection
@section('js')
    <script src="/js/plugins/select2.min.js"></script>
 <script>
     $(document).ready(function() {
         $('.js-example-basic-multiple').select2();
     });

 </script>
<script src="{{asset('js/inside/crearProducto.js')}}"></script>

@endsection