@extends('layouts.admin')
@section('nombre_pagina','Subcategoria')
@section('css')
@endsection
@section('titulo de la pagina','subCategoria')
@section('breadcrumbs')
    {{ Breadcrumbs::render('subcategorias') }}
@endsection
@section('contenido')
    <div class="col-md-12" id="subcategoria" v-cloak >
        <!-- contenido -->
        <div class="tile">
            <div class="col-md-12">
                <button class="btn btn-primary btn-lg pull-right" v-on:click="createSubCategoria"> Crear </button>
                <div >
                    <label  class="form-control-label" for="name">Burcar:</label>
                    <input  type="text"   class="col-md-4 form-control" placeholder="nombre de la SubCategoria" name="name" v-model="subcategoria" v-on:keyup.13="consultarNombreSubCategoria">
                </div>
            </div>
            <br>
            <div class="form-inline" >
                <div class="form-group col-md-1.5 mb-2" v-if="paginacion.total > 5">
                    <label> Mostrar : </label>
                    <select class="form-control" v-on:change="changeNumberPage" v-model="datosPorPagina" class="form-control">
                        <option  v-for="cantidad in cantidadPorPagina">   @{{cantidad}}   </option>
                    </select>
                </div>
                <div  class="form-group col-md-2.5 mb-2" v-if="subcategoriasNumber  !== 0">
                    <label> Ordenar : </label>
                    <select class="form-control" v-on:change="ordenar" v-model="orden" class="form-control">
                        <option value="asc">Ascendente</option>
                        <option value="desc">Descendente</option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="col-sm-12 col-sm-offset-2" style="background-color:white;">
                <table class="table table-hover table-bordered" v-if="subcategoriasNumber !== 0" >
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Categoria</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="dato in cmbSubCategorias">
                        <td>@{{dato.nombre}}</td>
                        <td>@{{dato.categoria}}</td>
                        <td>
                            <button type="button" class="btn btn-success" v-on:click="editSubCategoria(dato.id,dato.nombre,dato.categoria_id)">Editar</button>
                            <button type="button" class="btn btn-danger" v-on:click="deleteSubCategoria(dato.id)">Eliminar</button>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Nombres</th>
                        <th>Categoria</th>
                        <th>Acciones</th>
                    </tr>
                    </tfoot>
                </table>
                <div v-else>
                    <div class="alert alert-danger">
                        <p>No existen <strong>SubCategorias</strong> registradas</p>
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
        <!-- Creacion de SubCategorias modal -->
        <div class="modal fade" id="crearModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Creación de subcategoria</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="input-group">
                            <select class="form-control" v-model="cmb_categoria" >
                                <option v-for="dato in cmb_categorias" :value="dato.id"> @{{dato.nombre}} </option>
                            </select>
                        </div>
                        <div class="input-group">
                            <input class="form-control" placeholder="nombre de la subcategoria" type="text" autocomplete="off" maxlength="15" v-model="subcategoria_store">
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" v-on:click="storeSubCategoria">Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- //Creacion de SubCategorias modal -->
        <!-- Edicion de SubCategorias modal -->
        <div class="modal fade" id="editarModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edición de subcategoria</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="input-group">
                            <select class="form-control" v-model="cmb_categoria" :value="cmb_categoria" >
                                <option v-for="dato in cmb_categorias" :value="dato.id"> @{{dato.nombre}} </option>
                            </select>
                        </div>
                        <div class="input-group">
                            <input class="form-control" placeholder="nombre de la subcategoria" type="text" autocomplete="off" maxlength="15" v-model="subcategoria_update">
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" v-on:click="updateSubCategoria">Actualizar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- //Edicion de SubCategorias modal -->
        <!-- modales -->
    </div>
@endsection
@section('js')
    <script>
        var app = new Vue ({
            el:"#subcategoria",
            data: {
                mensaje : 'la subcategoria',
                mensaje2 : 'SubCategoria',
                datos :[],

                subcategoria_store : '',
                subcategoria_update : '',
                subcategoria_id : 0,

                subcategoria : '',
                cmbSubCategorias: [],
                cmb_categorias : [],
                cmb_categoria : 0,


                paginacion : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to': 0,
                },
                offset: 3,
                /* orden de la tabla */
                orden :'asc',
                datosPagina : [],
                datosPorPagina : 5,

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

                subcategoriasNumber : function() {

                    return this.cmbSubCategorias.length;
                },

                cantidadPorPagina : function () {

                    var inicial = 0;
                    var datos = [];

                    while(true) {
                        inicial = inicial + 5;
                        if(this.paginacion.total <= inicial) {
                            break;
                        } else {
                            this.datosPorPagina = 5;
                            datos.push(inicial)
                        }

                    }
                    return datos;
                },

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
                this.loadSubCategoria();
                this.cargarCombos();



            },


            methods : {
                //---------------------- CRUD ----------------------------------------//
                createSubCategoria : function() {
                    $("#crearModal").modal()
                },

                editSubCategoria : function(id,nombre,categoria) {
                    this.subcategoria_id = id;
                    this.subcategoria_update = nombre;
                    this.cmb_categoria = categoria;
                    $("#editarModal").modal()

                },

                updateSubCategoria : function() {
                    var respuesta = this.validarCampos('actualizacion');

                    if( respuesta !== false) {
                        var url = '/administrador/subcategoria/update';
                        axios.put(url, {
                            nombre: this.subcategoria_update.toUpperCase(),
                            id : this.subcategoria_id,
                            categoria : this.cmb_categoria

                        }).then(response => {
                            if(response.data[0] == "Error") {
                            if(response.data[1] == 1062) {
                                toastr.error("El nombre se encuentra duplicado");
                            } else {
                                toastr.error("Error al acttualizar "+this.mensaje);
                            }
                        }else {
                            $('#editarModal').modal('hide');
                            toastr.success(this.mensaje2+" actualizada con exito");
                            this.limpiar();
                            this.loadSubCategoria();
                        }

                        }).catch(error => {
                                console.log(error);
                                toastr.error("Error al actualizar "+this.mensaje);
                        });
                    }


                },

                storeSubCategoria : function() {

                    var respuesta = this.validarCampos('creacion');

                    if( respuesta !== false) {
                        $url = '/administrador/subcategoria/store';
                        axios.post($url, {
                            nombre: this.subcategoria_store.toUpperCase(),
                            categoria : this.cmb_categoria

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
                            this.loadSubCategoria();
                        }
                    }).catch(error => {
                            console.log(error);
                            toastr.error("Error al guardar "+this.mensaje);
                    });
                    }



                },

                deleteSubCategoria : function(id) {

                    swal({
                        title: "Eliminar!",
                        text: "Esta seguro que desea eliminar esre registro",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                        .then((willDelete) => {
                        if (willDelete) {
                            var url = '/administrador/subcategoria/delete/'+id;
                            axios.delete(url, {

                            }).then(response => {
                                if(response.data[0] == "Error") {
                                toastr.error("Error al eliminar "+this.mensaje);
                            }else {
                                this.loadSubCategoria();
                            }

                        }).catch(error => {
                                toastr.error("Error al eliminar "+this.mensaje);
                                console.log(error);
                        });
                            swal("Eliminado! La subcategoria se ha sido eliminada!", {
                                icon: "success",
                            });
                        } else {
                            swal("Su información se encuentra seguro!");
                }
                });
                },

                loadSubCategoria : function(page) {

                    var url = page !== undefined ?  '/administrador/subcategoria/load/'+this.datosPorPagina+'/'+page : '/administrador/subcategoria/load/'+this.datosPorPagina;
                    axios.get(url).then(response => {
                        console.log(response);
                    this.datos = response.data;
                    this.cmbSubCategorias = this.datos.data

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
                    this.loadSubCategoria();
                });
                },
                //---------------------- //CRUD ----------------------------------------//

                //---------------------- PAGINACION ----------------------------------------//

                changePage: function(page) {
                    this.paginacion.current_page = page;
                    this.subcategoria === '' ? this.loadSubCategoria(page) : this.consultarNombreSubCategoria(page);
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
                consultarNombreSubCategoria : function(page) {

                    var respuesta = this.validarCampos('busqueda');

                    if( respuesta !== false) {
                        var url = page !== undefined ?  '/administrador/subcategoria/load/'+this.datosPorPagina+'/'+0+'/'+this.subcategoria : '/administrador/subcategoria/load/'+this.datosPorPagina+'/'+page+'/'+this.subcategoria;
                        axios.get(url).then(response => {
                            console.log(response);
                        this.datos = response.data;
                        this.cmbSubCategorias = this.datos.data

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
                        this.consultarNombreSubCategoria (page);
                    });
                    }


                },
                //---------------------- /CONSULTAS----------------------------------------//

                //----------------------FUNCIONES----------------------------------------//

                ordenar : function() {
                    if(this.orden == 'asc' ) {
                        this.cmbcategorias.sort(function (a, b) {
                            if (a.nombre > b.nombre) {
                                return 1;
                            }
                            if (a.nombre < b.nombre) {
                                return -1;
                            }
                            // a must be equal to b
                            return 0;
                        });

                    } else if(this.orden == 'desc') {
                        this.cmbCategorias.sort(function (a, b) {
                            if (a.nombre < b.nombre) {
                                return 1;
                            }
                            if (a.nombre > b.nombre) {
                                return -1;
                            }
                            // a must be equal to b
                            return 0;
                        });

                    }
                },
                limpiar : function() {
                    this.subcategoria_store = '';
                    this.subcategoria_update = '';
                },

                cargarCombos : function() {
                  var url = '/administrador/subcategoria/categorias';

                    axios.get(url).then(response => {
                        this.cmb_categorias = response.data;
                    }).catch(error => {
                        this.cargarCombos();
                    });
                },
                //----------------------/FUNCIONES----------------------------------------//
                //--------------------------------------Validaciones -----------------------------------------------//

                validarCampos : function(tipo) {
                    var datos_sin_numeros =  /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/; // para la afinidad
                    var patt3 = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ,\s0-9]+$/; //para la observación
                    var er_numeros = /^[0-9,]+$/;

                    if(tipo == 'creacion'){
                        this.subcategoria_store = this.subcategoria_store.trim();
                        if(this.subcategoria_store === ''){
                            toastr.error("El campo de " +this.mensaje+ " no puede estar en blanco")
                            return false;
                        } else {
                            if(this.cmb_categoria == 0) {
                                toastr.error("Debe elegir una categoria");
                                return false;
                            } else {
                                if(datos_sin_numeros.test(this.subcategoria_store) === false){
                                    toastr.error("el nombre de  "+this.mensaje+ "no puede contener ni numeros ni caracteres especiales.")
                                    return false;
                                } else {
                                    return true;
                                }
                            }

                        }

                    } else if (tipo == 'actualizacion') {
                        this.subcategoria_update = this.subcategoria_update.trim();
                        if(this.subcategoria_update === ''){
                            toastr.error("El campo de " +this.mensaje+" no puede estar en blanco");
                            return false;
                        } else {
                            if(datos_sin_numeros.test(this.subcategoria_update) === false){
                                toastr.error("el nombre de  "+this.mensaje+" no puede contener ni numeros ni caracteres especiales.");
                                return false;
                            } else {
                                if(this.cmb_categoria == 0){
                                    toastr.error("Debes de seleccionar una categoria");
                                } else {
                                    return true
                                }

                            }
                        }
                    } else if(tipo == 'busqueda') {
                            this.subcategoria = this.subcategoria.trim();
                        if(this.subcategoria === ''){
                            return true;
                        } else {
                            if(datos_sin_numeros.test(this.subcategoria) === false){
                                toastr.error("el nombre de "+this.mensaje+"no puede contener ni numeros ni caracteres especiales.");
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