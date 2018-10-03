@extends('layouts.proveedor')
@section('nombre_pagina','crear')
@section('css')
@endsection
@section('titulo de la pagina','Crear articulos')
@section('contenido')
    <div class="col-md-12" id="creacionProductos">
        <div class="tile">
            <form action="" method="post" enctype="multipart/form-data">

            </form>
            <h4>DATOS BASICOS</h4>
            <hr>
                <div class="form-group row justify-content-md-center">
                    <div class="col-md-4">
                        <select class="form-control col-md-8" v-model="categoria" >
                            <option value='0'  disabled >Categoria</option>
                            <option>2</option>
                        </select>
                    </div>
                    <div class="col-md-4 ">
                        <select class="form-control col-md-8" v-model="sub_categoria">
                            <option value='0'  disabled>Sub-Categoria</option>
                            <option>2</option>
                        </select>
                    </div>
                    <div class="col-md-4 ">
                        <select class="form-control col-md-8" v-model="categoria">
                            <option value='0'  disabled>Marca</option>
                            <option>2</option>
                        </select>
                    </div>
                </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Nombre:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" name="nombre" v-model="nombre" id="nombre" placeholder="nombre del producto" min="3" max="20">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="descripcion">Descripción:</label>
                </div>
                <div class="col-md-8 ">
                   <textarea class="form-control" v-model="descripcion" minlength="15" maxlength="50" rows="2" placeholder="descripción del producto">
                   </textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <input class="form-control" type="number" placeholder="Precio" name="precio" id="precio" v-model="precio">
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" placeholder="iva" name="iva" id="iva" v-model="iva">
                </div>
            </div>
            <br>
            <h4>Imagenes del prodcuto</h4>
            <hr>
            <label for="colores">Seleccione los colores en orden:</label>
            <select class="form-control" name="colores[]" id="colores" multiple="multiple" v-model="colores" v-on:change="crearInputs">
                <option value="0">rojo</option>
                <option value="1">amarillo</option>
            </select>

            <br>
            <div id="inputs">

            </div>
            <input type="file" multiple accept="image/png, .jpeg">
        </div>

    </div>
@endsection
@section('js')
    <script src="/js/plugins/select2.min.js"></script>
 <script>
     $(document).ready(function() {
         $('.js-example-basic-multiple').select2();
     });
 </script>
 <script>
     var app = new Vue ({
         el:"#creacionProductos",
         data: {
            categoria : 0,
            sub_categoria : 0,
             marca : 0,
             precio : 0,
             iva : 0,
             nombre : '',
             descripcion : '',
             colores : [],
             errores : [],
             imagenes : [],

         },
         created : function() {
             toastr.options = {
             "closeButton": true,
             "debug": false,
             "newestOnTop": false,
             "progressBar": true,
             "positionClass": "toast-top-right",
             "preventDuplicates": false,
             "onclick": null,
             "showDuration": "600",
             "hideDuration": "3000",
             "timeOut": "5000",
             "extendedTimeOut": "1000",
             "showEasing": "swing",
             "hideEasing": "linear",
             "showMethod": "fadeIn",
             "hideMethod": "fadeOut"
            }
         },

         methods : {

            validar : function () {

            },

             validarCampos : function() {
                 var datos_sin_numeros =  /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/; // para la afinidad
                 var patt3 = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ,\s0-9]+$/; //para la observación

                 if(this.nombre !== "") {
                     // mas validaciones
                 } else {
                     this.errores.push("El campo nombre no puede estar vacio");
                 }

                 if(this.descripcion !== "") {
                     // mas validaciones
                 } else {
                     this.errores.push("El campo descripción no puede estar vacio");
                 }

                 if(this.precio !== 0) {
                     // mas validaciones
                 } else {
                     this.errores.push("El producto debe tener un precio");
                 }

                 if(this.categoria !== "") {
                     // mas validaciones
                 } else {
                     this.errores.push("Debe elegir una categoria");
                 }

                 if(this.sub_categoria !== "") {
                     // mas validaciones
                 } else {
                     this.errores.push("Debe elegir una  subcategoria");
                 }

                 if(this.marca !== "") {
                     // mas validaciones
                 } else {
                     this.errores.push("Debe elegir una  marca");
                 }
             },


            enviar : function(){

            },

             crearInputs : function() {
                var numero = this.colores.length;
                console.log("selecciono"+ numero);

                var newInput = document.createElement("input")
             }
         }
     });
 </script>

@endsection