@extends('layouts.admin')
@section('nombre_pagina','Marca')
@section('css')
@endsection
@section('titulo de la pagina','Marca')
@section('contenido')
    <div class="col-md-12" id="marca" v-cloak >
        <!-- contenido -->
        <div class="tile">
            <div class="col-md-12">
                <button class="btn btn-primary btn-lg pull-right" v-on:click="createMarca"> Crear </button>
                <div v-if="marcasNumber !== 0">
                    <label  class="form-control-label" for="name">Burcar:</label>
                    <input  type="text"   class="col-md-4 form-control" placeholder="nombre de la Marca" name="name" v-model="marca" v-on:keyup.13="consultarNombreMarca">
                </div>
            </div>
            <br>
            <hr>
            <div class="col-sm-12 col-sm-offset-2" style="background-color:white;">
                <table class="table table-hover table-bordered" v-if="marcasNumber !== 0" >
                    <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="dato in cmbMarcas">
                        <td>@{{dato.nombre}}</td>
                        <td>
                            <button type="button" class="btn btn-success" v-on:click="editMarca(dato.id,dato.nombre)">Editar</button>
                            <button type="button" class="btn btn-danger" v-on:click="deleteMarca(dato.id)">Eliminar</button>
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
                        <p>No existen <strong>Marcas</strong> registradas</p>
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
        <!-- Creacion de Marcas modal -->
        <div class="modal fade" id="crearModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Creación de marca</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="input-group">
                            <input class="form-control" placeholder="nombre de la marca" type="text" autocomplete="off" maxlength="15" v-model="marca_store" v-on:keyup.13="storeMarca">
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" v-on:click="storeMarca">Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- //Creacion de Marcas modal -->
        <!-- Edicion de Marcas modal -->
        <div class="modal fade" id="editarModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edición de marca</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="input-group">
                            <input class="form-control" placeholder="nombre de la marca" type="text" autocomplete="off" maxlength="15" v-model="marca_update">
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" v-on:click="updateMarca">Actualizar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- //Edicion de Marcas modal -->
        <!-- modales -->
    </div>
@endsection
@section('js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        var app = new Vue ({
            el:"#marca",
            data: {
                mensaje : 'la marca',
                mensaje2 : 'Marca',
                datos :[],

                marca_store : '',
                marca_update : '',
                marca_id : 0,

                marca : '',
                cmbMarcas: [],

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

                marcasNumber : function() {

                    return this.cmbMarcas.length;
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
                this.loadMarca();



            },


            methods : {
                //---------------------- CRUD ----------------------------------------//
                createMarca : function() {
                    $("#crearModal").modal()
                },

                editMarca : function(id,nombre) {
                    this.marca_id = id;
                    this.marca_update = nombre;
                    $("#editarModal").modal()

                },

                updateMarca : function() {
                    var respuesta = this.validarCampos('actualizacion');

                    if( respuesta !== false) {
                        var url = '/administrador/marca/update';
                        axios.put(url, {
                            nombre: this.marca_update.toUpperCase(),
                            id : this.marca_id

                        }).then(response => {

                            if(response.data[0] == "Error") {
                                if(response.data[1] == 1062) {
                                    toastr.error("El nombre se encuentra duplicado");
                                } else {
                                    toastr.error("Error al guardar la marca");
                                }
                            }else {
                                $('#editarModal').modal('hide');
                                toastr.success(this.mensaje2+" actualizada con exito");
                                this.limpiar();
                                this.loadMarca();
                            }

                    }).catch(response=> {
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

                storeMarca : function() {

                    var respuesta = this.validarCampos('creacion');

                    if( respuesta !== false) {

                        var url = '/administrador/marca/store';
                        axios.post(url, {
                            nombre: this.marca_store.toUpperCase(),

                            }).then(response => {

                                if(response.data[0] == "Error") {
                                    if(response.data[1] == 1062) {
                                        toastr.error("El nombre se encuentra duplicado");
                                    } else {
                                        toastr.error("Error al guardar la marca");
                                    }
                                }else {
                                    $('#crearModal').modal('hide');
                                    toastr.success(this.mensaje2+" guardada con extito");
                                    this.limpiar();
                                    this.loadMarca();
                                }
                            }).catch(response => {
                            toastr.success( "Error al momento de guardar "+this.mensaje);
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

                deleteMarca : function(id) {

                    swal({
                        title: "Eliminar!",
                        text: "Esta seguro que desea eliminar este registro",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                        .then((willDelete) => {
                        if (willDelete) {
                            var url = '/administrador/marca/delete/'+id;
                            axios.delete(url, {

                            }).then(response => {

                                if(response.data[0] == "Error") {
                                    toastr.error("Error al eliminar la marca");
                                }else {

                                this.loadMarca();
                                }
                        }).catch(error => {
                                console.log(error);
                                toastr.error("al momento de eliminar "+this.mensaje)
                        });
                            swal("Eliminado! La marca se ha sido eliminada!", {
                                icon: "success",
                            });
                        } else {
                            swal("Su información se encuentra seguro!");
                }
                });
                },

                loadMarca : function(page) {

                    var url = page !== undefined ?  '/administrador/marca/load/'+page : '/administrador/marca/load';
                    axios.get(url).then(response => {

                    this.datos = response.data;
                    this.cmbMarcas = this.datos.data

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
                    this.loadMarca();
                });
                },
                //---------------------- //CRUD ----------------------------------------//

                //---------------------- PAGINACION ----------------------------------------//

                changePage: function(page) {
                    this.paginacion.current_page = page;
                    this.marca === '' ? this.loadMarca(page) : this.consultarNombreMarca(page);
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
                consultarNombreMarca : function(page) {

                    var respuesta = this.validarCampos('busqueda');

                    if( respuesta !== false) {
                            console.log('exito');
                            var url = page !== undefined ?  '/administrador/marca/load/'+0+'/'+this.marca : '/administrador/marca/load'+page+'/'+this.marca;
                            axios.get(url).then(response => {
                                    this.datos = response.data;
                                    this.cmbMarcas = this.datos.data
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
                                    this.consultarNombreMarca (page);
                            });
                    }


                },
                //---------------------- /CONSULTAS----------------------------------------//

                limpiar : function() {
                    this.marca_store = '';
                    this.marca_update = '';
                },

                //--------------------------------------Validaciones -----------------------------------------------//

                validarCampos : function(tipo) {
                    var datos_sin_numeros =  /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/;
                    var patt3 = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s0-9]+$/;
                    var er_numeros = /^[0-9,]+$/;

                    if(tipo == 'creacion'){
                        this.marca_store = this.marca_store.trim();
                        if(this.marca_store === ''){
                            toastr.error("El campo de " +this.mensaje+ " no puede estar en blanco");
                            return false;
                        } else {
                            if(datos_sin_numeros .test(this.marca_store) === false){
                                toastr.error("el nombre de  "+this.mensaje+ " no puede contener ni numeros ni caracteres especiales.");
                                return false;
                            } else {
                                return true;
                            }
                        }

                    } else if (tipo == 'actualizacion') {
                        this.marca_update = this.marca_update.trim();
                        if(this.marca_update === ''){
                            toastr.error("El campo de " +this.mensaje+" no puede estar en blanco");
                            return false;
                        } else {
                            if(datos_sin_numeros .test(this.marca_update) === false){
                                toastr.error("el nombre de  "+this.mensaje+" no puede contener ni numeros ni caracteres especiales.");
                                return false;
                            }else {
                                return true;
                            }
                        }
                    } else if(tipo == 'busqueda') {
                        this.marca = this.marca.trim();
                        if(this.marca === ''){
                            //toastr.error("El campo de "+this.mensaje+" no puede estar en blanco");
                            return true;
                        } else {
                            if(datos_sin_numeros.test(this.marca) === false){
                                toastr.error("el nombre de "+this.mensaje+" no puede contener ni numeros ni caracteres especiales.");
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