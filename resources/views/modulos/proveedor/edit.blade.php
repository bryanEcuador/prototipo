@extends('layouts.proveedor')
@section('nombre_pagina','editar')
@section('css')
@endsection
@section('titulo de la pagina','Editar articulo')
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

    <div class="col-md-12" id="edicionProductos" v-cloak>

        <div class="tile">
            <form action="{{route('proveedor.store')}}" method="post" enctype="multipart/form-data" id="producto">
                @csrf
                <h4>DATOS BASICOS</h4>
                <hr>
                <div class="form-group row justify-content-md-center">
                    <div class="col-md-4">
                        <select class="form-control col-md-8" v-model="categoria" :value="categoria" name="categoria">
                            <option value='0'  disabled >Categoria</option>
                            <option v-for="dato in cmbCategoria" :value=" dato.id" > @{{ dato.nombre }} </option>
                        </select>
                    </div>
                    <div class="col-md-4 ">
                        <select class="form-control col-md-8" v-model="sub_categoria" :value="sub_categoria" name="sub_categoria">
                            <option value='0'  disabled>Sub-Categoria</option>
                            <option v-for="dato in cmbSubCategoria" :value=" dato.id" > @{{ dato.nombre }} </option>
                        </select>
                    </div>
                    <div class="col-md-4 ">
                        <select class="form-control col-md-8" v-model="marca" :value="marca" name="marca">
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
                <div v-if="archivosMultimedias != 0">
                    <div class="row" v-for=" archivo in cmbImagenes">
                        <div class="col-md-3 card" v-if="archivo.imagen1 != null">
                            <div class="card-body">
                                <button type="button" class="btn btn-danger" v-on:click="eliminar(archivo.id,archivo.imagen1)">Elmiminar</button>
                                <button class="btn btn-primary">Actualizar</button>
                            </div>
                            <img v-bind:src="archivo.imagen1 " alt="Producto" width="100%" height="auto"  >
                        </div>

                        <div class="col-md-3 card" v-if="archivo.imagen2 != null">
                            <div class="card-body">
                                <button class="btn btn-danger">Elmiminar</button>
                                <button class="btn btn-primary">Actualizar</button>
                            </div>
                            <img v-bind:src="archivo.imagen2"  alt="Cinque Terre" width="100%" height="auto"  >
                        </div>

                        <div class="col-md-3 card" v-if="archivo.imagen3 != null">
                            <div class="card-body">
                                <button class="btn btn-danger">Elmiminar</button>
                                <button class="btn btn-primary">Actualizar</button>
                            </div>
                            <img v-bind:src="archivo.imagen3" alt="Cinque Terre" width="100%" height="auto"  >

                        </div>
                        <div class="col-md-3 card" v-if="archivo.imagen4 != null">
                            <div class="card-body">
                                <button class="btn btn-danger">Elmiminar</button>
                                <button class="btn btn-primary">Actualizar</button>
                            </div>
                            <img v-bind:src="archivo.imagen4" alt="Cinque Terre" width="100%" height="auto"  >

                        </div>
                        <div class="col-md-3 card" v-if="archivo.imagen5 != null">
                            <div class="card-body">
                                <button class="btn btn-danger">Elmiminar</button>
                                <button class="btn btn-primary">Actualizar</button>
                            </div>
                            <img v-bind:src="archivo.imagen5" alt="Cinque Terre" width="100%" height="auto"  >

                        </div>

                    </div>
                </div>
                <div v-else>
                    <p>no hay imagenes</p>
                </div>

                <button type="button" class="btn btn-info" v-on:click="enviarFormulario" name="guardar" id="guardar">Actualizar produto</button>
            </form>

        </div>


    </div>
@endsection
@section('js')
    <script src="/js/plugins/select2.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
    <script>
        var app = new Vue ({
            el:"#edicionProductos",
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
                identificador : 0,

                // selects
                cmbMarca : [],
                cmbCategoria : [],
                cmbSubCategoria : [],
                cmbColores : [],
                // variables desde el controlador
                cmbDatos : [],
                cmbImagenes :[],
                archivosMultimedias : 0,

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


                axios.get('/proveedor/marca').then(response => {
                    this.cmbMarca  = response.data
            })
                axios.get('/proveedor/categoria').then(response => {
                    this.cmbCategoria  = response.data
            })
                axios.get('/proveedor/sub-categoria').then(response => {
                    this.cmbSubCategoria  = response.data
            })

                axios.get('colores').then(response => {
                    this.cmbColores  = response.data
            })

                // codificamos el formato a json
                this.cmbDatos = {!! json_encode($datos) !!};

                // pasamos los datos a la vista
                this.nombre = this.cmbDatos[0].nombre;
                this.descripcion = this.cmbDatos[0].descripcion;
                this.precio = this.cmbDatos[0].precio;
                this.codigo = this.cmbDatos[0].codigo;
                this.iva = this.cmbDatos[0].iva;
                this.categoria = this.cmbDatos[0].id_categoria;
                this.sub_categoria = this.cmbDatos[0].id_sub_categoria;
                this.marca = this.cmbDatos[0].id_marca;
                this.identificador = this.cmbDatos[0].id;



                //this.cmbImagenes = {!! json_encode($datos) !!};
                this.cmbImagenes = @json($imagenes);
                this.archivosMultimedias = this.cmbImagenes.length;
                console.log({!! json_encode($datos) !!});
                console.log({!! json_encode($imagenes) !!});

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
                },

                eliminar1 : function(id,nombre) {
                    
                },
                eliminar : function(id,nombre) {
                    swal({
                        title: "Eliminar!",
                        text: "Esta seguro que desea eliminar la imagen",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                        .then((willDelete) => {
                        if (willDelete) {
                            this.eliminar1(id,nombre);
                            swal("Eliminado! La imagen ha sido eliminada!", {
                                icon: "success",
                            });
                        } else {
                            swal("Su archivo se encuentra seguro!");
                }
                });
                }
            }
        });
    </script>

@endsection