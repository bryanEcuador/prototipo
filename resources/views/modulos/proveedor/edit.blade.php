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

    <div class="col-md-12" id="edicionProductos" v-cloak >

        <div class="tile">
            <form action="{{route('proveedor.update')}}" method="post" enctype="multipart/form-data" id="producto">
                <input type="hidden" v-model="identificador" name="id_producto">
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
                <br>
                <div v-if="archivosMultimedias != 0">
                    <div class="row" v-for=" archivo in cmbImagenes">
                        <div class="col-md-12">
                            <select class="form-control col-md-4" v-bind:name="archivo.id" :value="archivo.color_id" >
                                <option v-for="dato in cmbColores" :value=" dato.id" > @{{ dato.nombre }} </option>
                            </select>
                            <br>
                            <div class="row">
                                <div class="col-md-3 col-sm-6 card" v-if="archivo.imagen1 != null">
                                    <div class="card-body">
                                        <button type="button" class="btn btn-danger" v-on:click="eliminar(archivo.id,'imagen1',archivo.producto_id)">Elmiminar</button>
                                        <button  type="button"  class="btn btn-primary" v-on:click="actualizar(archivo.imagen1,'imagen1',archivo.id)">Actualizar</button>
                                    </div>
                                    <img v-bind:src="archivo.imagen1" alt="Producto" width="100%" height="auto"  >
                                    <div v-bind:id="archivo.imagen1">

                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 card" v-if="archivo.imagen2 != null">
                                    <div class="card-body">
                                        <button class="btn btn-danger" type="button"  v-on:click="eliminar(archivo.id,'imagen2',archivo.producto_id)">Elmiminar</button>
                                        <button class="btn btn-primary" type="button" >Actualizar</button>
                                    </div>
                                    <img v-bind:src="archivo.imagen2"  alt="Cinque Terre" width="100%" height="auto"  >
                                </div>
                                <div class="col-md-3 card col-sm-6" v-if="archivo.imagen3 != null">
                                    <div class="card-body">
                                        <button class="btn btn-danger" type="button"  v-on:click="eliminar(archivo.id,'imagen3',archivo.producto_id)">Elmiminar</button>
                                        <button class="btn btn-primary" type="button" >Actualizar</button>
                                    </div>
                                    <img v-bind:src="archivo.imagen3" alt="Cinque Terre" width="100%" height="auto"  >

                                </div>
                                <div class="col-md-3 card col-sm-6" v-if="archivo.imagen4 != null">
                                    <div class="card-body">
                                        <button class="btn btn-danger" type="button"  v-on:click="eliminar(archivo.id,'imagen4',archivo.producto_id)">Elmiminar</button>
                                        <button class="btn btn-primary" type="button" >Actualizar</button>
                                    </div>
                                    <img v-bind:src="archivo.imagen4" alt="Cinque Terre" width="100%" height="auto"  >

                                </div>
                                <div class="col-md-3 card col-sm-6 " v-if="archivo.imagen5 != null">
                                    <div class="card-body">
                                        <button class="btn btn-danger" type="button"  v-on:click="eliminar(archivo.id,'imagen5',archivo.producto_id)">Elmiminar</button>
                                        <button class="btn btn-primary" type="button" >Actualizar</button>
                                    </div>
                                    <img v-bind:src="archivo.imagen5" alt="Cinque Terre" width="100%" height="auto"  >

                                </div>

                                <div class="col-md-3" v-if="archivo.imagen5 == null || archivo.imagen4 == null || archivo.imagen3 == null || archivo.imagen2 == null || archivo.imagen1 == null" >
                                    <form action="{{route('proveedor.agregar.imagenes')}}" method="post" enctype="multipart/form-data"  >
                                        @csrf
                                        <input type="file"  class="form-control" v-bind:id="archivo.id"  v-bind:name="archivo.id"  >
                                        <button type="button" v-on:click="guardarImagen(archivo.id,archivo.producto_id)"> Guardar imagen </button>
                                    </form>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
                <br>
                <button type="button" class="btn btn-info" v-on:click="validar" name="guardar" id="guardar">Actualizar produto</button>
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
                img : 0,

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
                }).catch(error =>{
                    this.consultarMarca();
                })
                axios.get('/proveedor/categoria').then(response => {
                    this.cmbCategoria  = response.data
            })
                axios.get('/proveedor/sub-categoria').then(response => {
                    this.cmbSubCategoria  = response.data
            })

                axios.get('/proveedor/colores').then(response => {
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




                this.cmbImagenes = @json($imagenes);
                this.archivosMultimedias = this.cmbImagenes.length;
                console.log({!! json_encode($datos) !!});
                console.log({!! json_encode($imagenes) !!});

            },


            methods : {

                consultarMarca : function(){
                    axios.get('/proveedor/marca').then(response => {
                        this.cmbMarca  = response.data
                }).catch(error =>{
                        this.marca();
                })
                },

                validar : function () {
                    this.validarCampos();
                    //this.validarImagenes();
                    // mensajes de alerta
                    if( this.errores.length === 0) {
                        this.enviarFormulario();
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

                recargarImagenes: function(producto) {
                    axios.get('/proveedor/consultar/imagenes/'+producto).then(response => {
                        this.cmbImagenes = response.data;
                    this.archivosMultimedias = this.cmbImagenes.length;
                })
                },
                eliminarImagen : function(id,nombre,producto) {
                    axios.get('/proveedor/validar/eliminar/imagen/'+id).then(response => {
                        this.img  = response.data;

                        if(this.img <= 3) {
                           toastr.error("no se puede eliminar, porque solo tiene 3 imagenes");
                        }else {
                            var parametros = {
                                "_token": "{{ csrf_token() }}",
                                "id" : id,
                                "nombre" : nombre
                            };
                            $.ajax({
                                data : parametros,
                                url : "/proveedor/eliminar/imagen",
                                type : "post",
                                async : true,
                                success : function(d){
                                    toastr.success('Registro eliminado con exito.', 'Alerta', {timeOut: 8000});
                                },
                                error : function (response,jqXHR) {


                                    if(response.status === 422)
                                    {
                                        // captura los errores en una variable
                                        var errors = $.parseJSON(response.responseText);
                                        // recorre los errores
                                        $.each(errors, function (key, value) {
                                            // pasa el error del controlador
                                            if($.isPlainObject(value)) {
                                                $.each(value, function (key, value) {
                                                    toastr.error('Error: '+value+'', 'Error', {timeOut: 5000});
                                                    console.log(key+ " " +value);
                                                });
                                            }else{
                                                // es un error general
                                                console.log(response);
                                                toastr.error('Error '+response+' al momento guardar el nuevo proveedor.', 'Error', {timeOut: 5000});
                                            }
                                        });
                                    } else {
                                        console.log(response.responseText);
                                        toastr.error('Error: '+response.status, 'Error', {timeOut: 5000});
                                    }
                                    //toastr.error('Error al momento de crear el permiso.', 'Alerta', {timeOut: 8000});

                                }
                            });

                            this.recargarImagenes(producto);
                        }
                    })


                    /*
                     */
                },
                eliminar : function(id,nombre,producto) {
                    swal({
                        title: "Eliminar!",
                        text: "Esta seguro que desea eliminar la imagen",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                        .then((willDelete) => {
                        if (willDelete) {
                            this.eliminarImagen(id,nombre,producto);
                            swal("Eliminado! La imagen ha sido eliminada!", {
                                icon: "success",
                            });
                        } else {
                            swal("Su archivo se encuentra seguro!");
                }
                });
                },

                actualizar : function(id,nombre,id_imagen) {
                    swal({
                        title: "Actualizar!",
                        text: "Esta seguro que desea actualizar la imagen",
                        icon: "info",
                        buttons: true,
                        dangerMode: true,
                    })
                        .then((willDelete) => {
                        if (willDelete) {
                            this.nuevaImagen(id,nombre,id_imagen);
                            swal("Suba su nueva imagen", {
                                icon: "success",
                            });
                        } else {
                            swal("Su archivo se encuentra seguro!");
                }
                });
                },
                nuevaImagen : function(div,nombre,id_imagen) {
                    divOld = document.getElementById(div);
                    var name = nombre+"-"+id_imagen;
                    var id =    nombre;
                    var inputElement = document.createElement("input");
                    inputElement.setAttribute("type", "file");
                    inputElement.setAttribute("accept", "image/png, .jpeg");
                    inputElement.setAttribute("name",name);
                    inputElement.setAttribute("id",id);
                    inputElement.setAttribute("class","form-control imagenes");
                    divOld.appendChild(inputElement);
                    //divOld.innerHTML = inputElement;

                },

                guardarImagen : function (img_id,producto) {

                    var valor = '#'+img_id;
                    var formData= new FormData();
                    formData.append("_token", "{{ csrf_token() }}");
                    formData.append("imagen",$(valor)[0].files[0]);
                    formData.append("id_imagen",img_id);
                    $.ajax({
                        data : formData ,
                        url : "/proveedor/agregar/imagen",
                        type : "post",
                        async : true,
                        contentType: false,
                       mimeType:"multipart/form-data",
                        processData: false,
                        success : function(d){
                            toastr.success('Imagen guardada con exito.', 'Alerta', {timeOut: 8000});
                        },
                        error : function (response,jqXHR) {


                            if(response.status === 422)
                            {
                                // captura los errores en una variable
                                var errors = $.parseJSON(response.responseText);
                                // recorre los errores
                                $.each(errors, function (key, value) {
                                    // pasa el error del controlador
                                    if($.isPlainObject(value)) {
                                        $.each(value, function (key, value) {
                                            toastr.error('Error: '+value+'', 'Error', {timeOut: 5000});
                                            console.log(key+ " " +value);
                                        });
                                    }else{
                                        // es un error general
                                        console.log(response);
                                        toastr.error('Error '+response+' al momento guardar el nuevo proveedor.', 'Error', {timeOut: 5000});
                                    }
                                });
                            } else {
                                console.log(response.responseText);
                                toastr.error('Error: '+response.status, 'Error', {timeOut: 5000});
                            }
                            //toastr.error('Error al momento de crear el permiso.', 'Alerta', {timeOut: 8000});

                        }
                    });
                    this.recargarImagenes(producto);
                },
                agregarImagen : function (div) {

                    var div = document.getElementById(div);
                    var name = "im1";
                    var id =    "im2";
                    //var inputElement = document.createElement("form");

                    var inputElement = document.createElement("input");
                    inputElement.setAttribute("type", "file");
                    inputElement.setAttribute("accept", "image/png, .jpeg");
                    inputElement.setAttribute("name",name);
                    inputElement.setAttribute("id",id);
                    inputElement.setAttribute("class","form-control imagenes");
                    div.appendChild(inputElement);

                }

            }
        });
    </script>

@endsection