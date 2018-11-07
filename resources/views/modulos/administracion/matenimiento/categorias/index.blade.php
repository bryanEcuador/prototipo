@extends('layouts.admin')
@section('nombre_pagina','Categorias')
@section('css')
@endsection
@section('titulo de la pagina','Categorias')
@section('breadcrumbs')
    {{ Breadcrumbs::render('categorias') }}
@endsection
@section('contenido')

        <div class="col-md-12" id="categoria" v-cloak >
            <!-- contenido -->
            <div class="tile">
                <div class="col-md-12">
                    <button class="btn btn-primary btn-lg pull-right" v-on:click="createCategoria"> Crear </button>
                   <div v-if="categoriasNumber !== 0">
                       <label  class="form-control-label" for="name">Burcar:</label>
                       <input  type="text"   class="col-md-4 form-control" placeholder="nombre de la categoria" name="name" v-model="categoria" v-on:keyup.13="consultarNombreCategoria">
                   </div>
                </div>
                <br>
                <hr>
                <div class="col-sm-12 col-sm-offset-2" style="background-color:white;">
                    <table class="table table-hover table-bordered" v-if="categoriasNumber !== 0" >
                        <thead>
                        <tr>
                            <th>Nombres</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="dato in cmbCategorias">
                                <td>@{{dato.nombre}}</td>
                                <td>
                                        <button type="button" class="btn btn-success" v-on:click="editCategoria(dato.id,dato.nombre)">Editar</button>
                                        <button type="button" class="btn btn-danger" v-on:click="deleteCategoria(dato.id)">Eliminar</button>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Nombres</th>
                            <th>Acciones</th>
                        </tr>
                        </tfoot>
                    </table>
                    <div v-else>
                        <div class="alert alert-danger">
                          <p>No existen <strong>Categorias</strong> registradas</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div>
                    <span> @{{ paginacion.to }} de @{{paginacion.total}} registros</span> <!-- corregir -->
                    <ul class="pagination">
                        <li class="page-item" v-if="paginacion.current_page > 1">
                            <a class="page-link" href="#" @click.prevent="changePage(paginacion.current_page - 1 )" >
                                <i class="fa fa-angle-left"></i>
                            </a>
                        </li>
                        <li class="page-item" v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'page-item active' : 'page-item']">
                            <a class="page-link" href="#" @click.prevent="changePage(page)"  >@{{page}}</a>
                        </li>
                        <li class="page-item" v-if="paginacion.current_page < paginacion.last_page"  >
                            <a class="page-link" href="#"  @click.prevent="changePage(paginacion.current_page + 1 )">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /contenido -->
            <!-- modales -->
            <!-- Creacion de categorias modal -->
            <div class="modal fade" id="crearModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Creación de categoria</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                           <div class="input-group">
                               <input class="form-control" placeholder="nombre de la categoria" type="text" autocomplete="off" maxlength="15" v-model="categoria_store">
                           </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" v-on:click="storeCategoria">Guardar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>

                    </div>
                </div>
            </div>
            <!-- //Creacion de categorias modal -->
            <!-- Edicion de categorias modal -->
            <div class="modal fade" id="editarModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Edición de categoria</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="input-group">
                                <input class="form-control" placeholder="nombre de la categoria" type="text" autocomplete="off" maxlength="15" v-model="categoria_update">
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" v-on:click="updateCategoria">Actualizar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>

                    </div>
                </div>
            </div>
            <!-- //Edicion de categorias modal -->
            <!-- modales -->
        </div>
     

@endsection
@section('js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        var app = new Vue ({
            el:"#categoria",
            data: {
                mensaje : 'la categoria',
                mensaje2 : 'Categoria',
                datos :[],

                categoria_store : '',
                categoria_update : '',
                categoria_id : 0,

                categoria : '',
                cmbCategorias : [],

                paginacion : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to': 0,
                },
                offset: 3,

            },
            computed : {
                isActived : function () {
                    return this.paginacion.current_page;
                },
                pagesNumber: function() {

                    if(!this.paginacion.to){
                        return [];
                    }
                    var from = this.paginacion.current_page - this.offset;
                    if(from < 1){
                        from = 1;
                    }
                    var to = from + (this.offset * 2);
                    if(to >= this.paginacion.last_page){
                        to = this.paginacion.last_page;
                    }
                    var pagesArray = [];
                    while(from <= to){
                        pagesArray.push(from);
                        from++;
                    }
                    return pagesArray;
                },

                categoriasNumber : function() {

                    return this.cmbCategorias.length;
                }


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
               this.loadCategoria();

            },


            methods : {
            //---------------------- CRUD ----------------------------------------//
                createCategoria : function() {
                    $("#crearModal").modal()
                },

                editCategoria : function(id,nombre) {
                    this.categoria_id = id;
                    this.categoria_update = nombre;
                    $("#editarModal").modal()

                },

                updateCategoria : function() {
                    var respuesta = this.validarCampos('actualizacion');

                    if( respuesta !== false) {
                        var url = '/administrador/categoria/update';
                        axios.put(url, {
                            nombre: this.categoria_update.toUpperCase(),
                            id : this.categoria_id

                            }).then(response => {
                            if(response.data[0] == "Error") {
                                if(response.data[1] == 1062) {
                                    toastr.error("El nombre se encuentra duplicado");
                                } else {
                                    toastr.error("Error al actualizar "+this.mensaje);
                                }
                            }else {
                                $('#editarModal').modal('hide');
                                toastr.success(this.mensaje2+" actualizada con exito");
                                this.limpiar();
                                this.loadCategoria();
                            }
                            }).catch(error => {
                                console.log(error);
                                toastr.error("Error al actualizar "+this.mensaje);
                        });
                    }


                },

                storeCategoria : function() {

                   var respuesta = this.validarCampos('creacion');

                    if( respuesta !== false) {
                        $url = '/administrador/categoria/store';
                        axios.post($url, {
                            nombre: this.categoria_store.toUpperCase(),

                            }).then(response => {
                                if(response.data[0] == "Error") {
                                    if(response.data[1] == 1062) {
                                        toastr.error("El nombre se encuentra duplicado");
                                    } else {
                                        toastr.error("Error al guardar "+this.mensaje);
                                    }
                                } else {
                                    $('#crearModal').modal('hide');
                                    toastr.success(this.mensaje2+" guardada con extito");
                                    this.limpiar();
                                    this.loadCategoria();
                                 }

                            }).catch(response => {
                                toastr.success( "Error al momento de guardar "+this.mensaje);
                                console.log(response);
                                if(response.status === 422)
                                {
                                    var errors = $.parseJSON(response.responseText);
                                    $.each(errors, function (key, value) {
                                        if($.isPlainObject(value)) {
                                            $.each(value, function (key, value) {
                                                toastr.error('Error en el controlador: '+value+'', 'Error', {timeOut: 5000});
                                                console.log(key+ " " +value);
                                            });
                                        }else{
                                            toastr.error('Error '+response+' al momento de crear el permiso.', 'Error', {timeOut: 5000});
                                        }
                                    });
                                }
                        });
                    }



                },

                deleteCategoria : function(id) {

                    swal({
                        title: "Eliminar!",
                        text: "Esta seguro que desea eliminar la imagen",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                        .then((willDelete) => {
                        if (willDelete) {
                            var url = '/administrador/categoria/delete/'+id;
                            axios.delete(url, {

                                }).then(response => {
                                    console.log(response);
                                    if(response.data[0] == "Error") {
                                        toastr.error("Error al eliminar "+this.mensaje);
                                    }else {
                                        this.loadCategoria();
                                    }
                                }).catch(error => {
                                    console.log(error);
                                toastr.error("Error al eliminar "+this.mensaje);
                            });
                            swal("Eliminado! La imagen ha sido eliminada!", {
                                icon: "success",
                            });
                        } else {
                            swal("Su archivo se encuentra seguro!");
                }
                });
                },

                loadCategoria : function(page) {

                    var url = page !== undefined ?  '/administrador/categoria/load/'+page : '/administrador/categoria/load';
                    axios.get(url).then(response => {

                        this.datos = response.data;
                        this.cmbCategorias = this.datos.data

                    this.paginacion.total = this.datos.total;
                    if(page == undefined) {
                        this.paginacion.current_page = this.datos.current_page;
                    }
                    this.paginacion.per_page = this.datos.per_page;
                    this.paginacion.last_page = this.datos.last_page;
                    this.paginacion.from = this.datos.from;
                    this.paginacion.to = this.datos.to;
                }).catch(error => {
                    console.log(error);
                    this.loadCategoria();
                    });
                },
                //---------------------- //CRUD ----------------------------------------//

                //---------------------- PAGINACION ----------------------------------------//

                changePage: function(page) {
                    this.paginacion.current_page = page;
                    (this.categoria == '') ? this.loadCategoria(page) : this.consultarNombreCategoria(page);
                },
                //---------------------- /PAGINACION ----------------------------------------//

                //---------------------- CONFIGURACION ----------------------------------------//

                    notificaciones : function () {
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
                    },

                //---------------------- /CONFIGURACION ----------------------------------------//

                //---------------------- CONSULTAS ----------------------------------------//
                consultarNombreCategoria : function(page) {

                    var respuesta = this.validarCampos('busqueda');

                    if( respuesta !== false) {
                        var url = page !== undefined ?  '/administrador/categoria/load/'+0+'/'+this.categoria : '/administrador/categoria/load'+page+'/'+this.categoria;
                        axios.get(url).then(response => {
                            console.log(response);
                        this.datos = response.data;
                        this.cmbCategorias = this.datos.data

                        this.paginacion.total = this.datos.total;
                        if(page == undefined) {
                            this.paginacion.current_page = this.datos.current_page;
                        }
                        this.paginacion.per_page = this.datos.per_page;
                        this.paginacion.last_page = this.datos.last_page;
                        this.paginacion.from = this.datos.from;
                        this.paginacion.to = this.datos.to;
                    }).catch(error => {
                            console.log(error);
                        this.consultarNombreCategoria (page);
                    });
                    }


                },
                //---------------------- /CONSULTAS----------------------------------------//

                    limpiar : function() {
                        this.categoria_store = '';
                        this.categoria_update = '';
                    },

                //--------------------------------------Validaciones -----------------------------------------------//

                validarCampos : function(tipo) {
                    var datos_sin_numeros =  /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/; // para la afinidad
                    var patt3 = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ,\s0-9]+$/; //para la observación
                    var er_numeros = /^[0-9,]+$/;

                   if(tipo == 'creacion'){
                       this.categoria_store = this.categoria_store.trim();
                        if(this.categoria_store === ''){
                            toastr.error("El campo de categoria no puede estar en blanco")
                            return false;
                        } else {
                            if(datos_sin_numeros.test(this.categoria_store) === false){
                                toastr.error("el nombre de la categoria no puede contener ni numeros ni caracteres especiales.")
                                return false;
                            } else {
                                return true;
                            }
                        }

                   } else if (tipo == 'actualizacion') {
                       this.categoria_update = this.categoria_update.trim();
                       if(this.categoria_update === ''){
                           toastr.error("El campo de categoria no puede estar en blanco");
                           return false;
                       } else {
                           if(datos_sin_numeros.test(this.categoria_update) === false){
                               toastr.error("el nombre de la categoria no puede contener ni numeros ni caracteres especiales.");
                               return false;
                           } else{
                               return true;
                           }
                       }
                   } else if(tipo == 'busqueda') {
                       this.categoria= this.categoria.trim();
                       if(this.categoria === ''){
                           return true;
                       } else {
                           if(datos_sin_numeros.test(this.categoria) === false){
                               toastr.error("el nombre de la categoria no puede contener ni numeros ni caracteres especiales.");
                               return false;
                           } else {
                               return true;
                           }
                       }
                   }

                },
                //--------------------------------------Validaciones -----------------------------------------------//


            }
        });
    </script>

@endsection