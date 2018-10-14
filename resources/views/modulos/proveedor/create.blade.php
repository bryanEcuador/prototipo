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

    <div class="col-md-12" id="creacionProductos">
        <div class="tile">
            <form action="{{route('proveedor.store')}}" method="post" enctype="multipart/form-data" id="producto">
                @csrf
                <h4>DATOS BASICOS</h4>
                <hr>
                <div class="form-group row justify-content-md-center">
                    <div class="col-md-4">
                        <select class="form-control col-md-8" v-model="categoria" name="categoria">
                            <option value='0'  disabled >Categoria</option>
                            <option v-for="dato in cmbCategoria" :value=" dato.id" > @{{ dato.nombre }} </option>
                        </select>
                    </div>
                    <div class="col-md-4 ">
                        <select class="form-control col-md-8" v-model="sub_categoria" name="sub_categoria">
                            <option value='0'  disabled>Sub-Categoria</option>
                            <option v-for="dato in cmbSubCategoria" :value=" dato.id" > @{{ dato.nombre }} </option>
                        </select>
                    </div>
                    <div class="col-md-4 ">
                        <select class="form-control col-md-8" v-model="marca" name="marca">
                            <option value='0'  disabled>Marca</option>
                            <option v-for="dato in cmbMarca" :value=" dato.id" > @{{ dato.nombre }} </option>
                        </select>
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
                        <input class="form-control" type="number" placeholder="iva" name="iva" id="iva" v-model="iva" min="0" max="100">
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
                <button type="button" class="btn btn-info" v-on:click="enviarFormulario" name="guardar" id="guardar">Agregar produto</button>
            </form>

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
             codigo : '',
             num_imagenes : 0,

             // selects
             cmbMarca : [],
             cmbCategoria : [],
             cmbSubCategoria : [],
             cmbColores : [],

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
            };
             axios.get('marca').then(response => {
                 this.cmbMarca  = response.data
            })
             axios.get('categoria').then(response => {
                 this.cmbCategoria  = response.data
            })
             axios.get('sub-categoria').then(response => {
                 this.cmbSubCategoria  = response.data
            })

             axios.get('colores').then(response => {
                 this.cmbColores  = response.data
            })
         },


         methods : {

            validar : function () {
                //this.validarCampos();
                this.validarImagenes();
                // mensajes de alerta
                if( this.errores.length === 0) {
                    //this.enviarFormulario();
                } else {
                    var num = this.errores.length;
                    for(i=0; i<num;i++) {
                        toastr.error(this.errores[i]);
                    }
                }
                this.errores = [];
            },
             validarCampos : function() {
                 var datos_sin_numeros =  /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/; // para la afinidad
                 var patt3 = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ,\s0-9]+$/; //para la observación
                 var er_numeros = /^[0-9,]+$/;

                 if(this.nombre !== "") {
                     // mas validaciones
                 } else {
                     this.errores.push("El campo nombre no puede estar vacio");
                 }

                 if(this.codigo !== ""){

                 }else {
                     this.errores.push("El campo codigo no puede estar vacio");
                 }

                 if(this.descripcion !== "") {
                     // mas validaciones
                 } else {
                     this.errores.push("El campo descripción no puede estar vacio");
                 }



                 if(this.precio !== 0) {
                     // mas validaciones
                     if(er_numeros .test(this.precio) == false)
                     {
                         this.errores.push("El campo precio solo puede obtener numeros");
                     }
                 } else {
                     this.errores.push("El producto debe tener un precio");
                 }

                 if(er_numeros .test(this.iva) == false)
                 {
                     this.errores.push("El campo precio solo puede obtener numeros");
                 }


                 if(this.categoria !== 0) {
                     // mas validaciones
                 } else {
                     this.errores.push("Debe elegir una categoria");
                 }

                 if(this.sub_categoria !== 0) {
                     // mas validaciones
                 } else {
                     this.errores.push("Debe elegir una  subcategoria");
                 }

                 if(this.marca !== 0) {
                     // mas validaciones
                 } else {
                     this.errores.push("Debe elegir una  marca");
                 }

                 if(this.colores.length == 0){
                     this.errores.push("Debe Seleccionar los colores del producto");
                 }
             },
             validarImagenes : function() {
                // obtenemos el numero de files creados
                 var x = document.getElementsByClassName("form-control imagenes");
                 // contamos el numero de inputs file
                 this.num_imagenes = x.length;
                 // pasamos a comparar cuantas imagenes tenemos por cada input file
                 if(this.colores.length == 0) {
                     this.errores.push("seleccione los colores de los articulos para agregar imagenes")
                 } else {
                     if(this.colores.length !== this.num_imagenes){
                         this.errores.push("EL numero de archivos no coincide con los colores");
                     } else {
                         for( var i = 0; i < x.length; i++)
                         {
                             if(x[i].files.length < 3){
                                 this.errores.push("EL numero de imagenes no puede ser menor a 3");
                             } else if (x[i].files.length > 5) {
                                 this.errores.push("EL numero de imagenes no puede ser mayor a 5");
                             }
                         }
                     }
                 }
             },
            enviarFormulario : function(){
                var form = document.getElementById('producto');
                producto.submit();
            },
             crearInputs : function() {
                 // numero de colores seleccionados
                var cantidad = this.colores.length;
                 // creo un nuevo div
                 var divElement = document.createElement("div");
                 // obtengo el viejo div y el nombre de su nodo padre
                 divOld = document.getElementById("inputs");
                 padre = document.getElementById("inputs").parentNode;
                 // elimino el div
                 padre.removeChild(divOld);
                 //document.replaceChild(divElement,divOld);
                 // le agg propiedades a el nuevo div
                 divElement.setAttribute("id", "inputs");
                 anterior = document.getElementById("br");
                 padre.insertBefore(divElement,anterior);


                 // creo los elementos imagen
                 while( cantidad > 0){
                     var name = "img"+cantidad+"[]";
                     var id =    "img"+cantidad;
                     var inputElement = document.createElement("input");
                     inputElement.setAttribute("type", "file");
                     inputElement.setAttribute("multiple", "multiple");
                     inputElement.setAttribute("accept", "image/png, .jpeg");
                     inputElement.setAttribute("name",name);
                     inputElement.setAttribute("id",id);
                     inputElement.setAttribute("class","form-control imagenes");
                     document.getElementById("inputs").appendChild(inputElement);
                     //document.body.innerHTML = inputElement + document.body.innerHTML;
                     cantidad = cantidad-1;
                     console.log(cantidad);
                 }

                 /* Cada vez que se escoge un nuevo elemento se destruye y se crea un div del mismo tipo y en base a este se crean las imagenes */
                 //var newInput = document.createElement("input")
             }
         }
     });
 </script>

@endsection