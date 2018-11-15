@extends('layouts.admin')
@section('nombre_pagina','colores')
@section('css')
    <style>
        .color_panel_box span{width: 30px;height: 30px;display: block;margin-left: 30px;border-radius: 20%;
            float: left;margin-top: 0px;margin-bottom: 4px; border: 2px; border-style: dashed   ;
        }

    </style>
@endsection
@section('titulo de la pagina','colores')
@section('breadcrumbs')
    {{ Breadcrumbs::render('colores') }}
@endsection
@section('contenido')
    <div class="col-md-12" id="app" v-cloak >
        <!-- contenido -->
        <div class="tile">
            <div class="col-md-12">
                <button class="btn btn-primary btn-lg pull-right" v-on:click="create"> Crear </button>
                <div >
                    <label  class="form-control-label" for="name">Burcar:</label>
                    <input  type="text"   class="col-md-4 form-control" placeholder="nombre del color" name="name" v-model="consulta" v-on:keyup.13="consultar">
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
                <div  class="form-group col-md-2.5 mb-2" v-if="datosNumber!== 0">
                    <label> Ordenar : </label>
                    <select class="form-control" v-on:change="ordenar" v-model="orden" class="form-control">
                        <option value="asc">Ascendente</option>
                        <option value="desc">Descendente</option>
                    </select>
                </div>
            </div>

            <hr>
            <div class="col-sm-12 col-sm-offset-2" style="background-color:white;">
                <table class="table table-hover table-bordered" v-if="datosNumber !== 0" >
                    <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Color</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="dato in cmbDatos">
                        <td>@{{dato.nombre}}</td>
                        <td class="color_panel_box">
                            <span v-bind:style="{'background-color': dato.hexadecimal}" ></span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-success" v-on:click="edit(dato.id,dato.nombre,dato.hexadecimal)">Editar</button>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Nombres</th>
                        <th>Color</th>
                        <th>Acciones</th>
                    </tr>
                    </tfoot>
                </table>
                <div v-else>
                    <div class="alert alert-danger">
                        <p>No existen <strong>Colores</strong> registrados</p>
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

        <!-- -->

        <div class="modal fade" id="crearModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Crear</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="input-group">
                            <input class="form-control" placeholder="nombre del color" type="text" autocomplete="off" maxlength="15" v-model="nombre_create">
                        </div>
                        <label>Eliga el color:</label><br>
                        <div class="input-group">
                            <input class=""  type="color" autocomplete="off" maxlength="15" v-model="color_create">
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" v-on:click="store">Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- Edicion de Marcas modal -->
        <div class="modal fade" id="editarModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edición</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="input-group">
                            <input class="form-control" placeholder="nombre del color" type="text" autocomplete="off" maxlength="15" v-model="nombre_update">
                        </div>
                        <label>Eliga el color:</label><br>
                        <div class="input-group">
                            <input  type="color" autocomplete="off" maxlength="15" v-model="color_update">
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" v-on:click="update">Actualizar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- //Edicion de Marcas modal -->
        <!-- /modales -->

    </div>




@endsection
@section('js')
    <script>
        var app = new Vue ({
            el:'#app',
            data: {
                mensaje1 : 'el color',
                mensaje2 : 'Color',

                nombre_create : '',
                color_create : '#ffffff',

                nombre_update : '',
                color_update : '',
                id : 0,

                consulta : '',
                cmbDatos : [],
                errores : [],




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

                datosNumber : function() {

                    return this.cmbDatos.length;
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
                this.load();
            },

            methods : {
                //---------------------- CRUD ----------------------------------------//
                create: function() {
                    $("#crearModal").modal()
                },

                edit : function(id,nombre,color) {
                    this.id = id,
                    this.nombre_update = nombre;
                    this.color_update = color;
                    $("#editarModal").modal()

                },

                otra : function() {
                  console.log("otra");
                },

                update: function() {
                     this.validarCampos('actualizacion');

                     if(this.errores.length === 0) {
                         var url = '/administrador/colores/update/'+this.id;
                         axios.put(url, {
                             nombre: this.nombre_update.toUpperCase(),
                             color: this.color_update.toUpperCase(),
                         }).then(response => {

                             if(response.data[0] == "Error") {
                             if(response.data[1] == 1062) {
                                 toastr.error("El nombre se encuentra duplicado");
                             } else {
                                 toastr.error("Error al guardar el color");
                             }
                         }else {
                             $('#editarModal').modal('hide');
                             toastr.success(this.mensaje2+" actualizado con exito");
                             this.limpiar();
                             this.load();
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
                                     toastr.error('Error '+response+' al momento de crear el color.', 'Error', {timeOut: 5000});
                                 }
                             });
                         }
                     });
                     }else {
                         var num = this.errores.length;
                         for(i=0; i<num;i++) {
                             toastr.error(this.errores[i]);
                         }
                     }
                     this.errores = [];

                },

                store : function() {
                     this.validarCampos('creacion');

                     if(this.errores.length === 0) {
                         var url = '/administrador/colores/store';
                         axios.post(url, {
                             nombre: this.nombre_create.toLowerCase(),
                             color : this.color_create,

                         }).then(response => {

                             if(response.data[0] == "Error") {
                                     if(response.data[1] == 1062) {
                                         toastr.error("El nombre se encuentra duplicado");
                                     } else {
                                         toastr.error("Error al guardar el color");
                                     }
                            }else {
                                     $('#crearModal').modal('hide');
                                     toastr.success(this.mensaje2+" guardada con extito");
                                     this.limpiar();
                                     this.load();
                         }
                     }).catch(response => {
                             toastr.error( "Error al momento de guardar "+this.mensaje);
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
                                     toastr.error('Error '+response+' al momento de crear el color.', 'Error', {timeOut: 5000});
                                 }
                             });
                         }
                     });
                     }else {
                         var num = this.errores.length;
                         for(i=0; i<num;i++) {
                             toastr.error(this.errores[i]);
                         }
                     }
                    this.errores = [];
                },

                delete : function(id) {

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

                                this.load();
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

                load : function(page) {

                    var url = page !== undefined ?  '/administrador/colores/load/'+this.datosPorPagina+'/'+page : '/administrador/colores/load/'+this.datosPorPagina;
                    axios.get(url).then(response => {

                        this.datos = response.data;
                    this.cmbDatos = this.datos.data

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
                    this.load();
                });
                },
                //---------------------- //CRUD ----------------------------------------//

                //---------------------- PAGINACION ----------------------------------------//

                changePage: function(page) {
                    this.paginacion.current_page = page;
                    this.marca === '' ? this.load(page) : this.consultar(page);
                },
                changeNumberPage :function(page) {
                    this.marca === '' ? this.load(page) : this.consultar(page);
                },
                //---------------------- /PAGINACION ----------------------------------------//

                //---------------------- CONFIGURACION ----------------------------------------//


                //---------------------- /CONFIGURACION ----------------------------------------//

                //---------------------- CONSULTAS ----------------------------------------//
                consultar : function(page) {

                    var respuesta = this.validarCampos('busqueda');

                    if( respuesta !== false) {
                        console.log('exito');
                        var url = page !== undefined ?  '/administrador/colores/load/'+this.datosPorPagina+'/'+0+'/'+this.consulta : '/administrador/colores/load/'+this.datosPorPagina+'/'+page+'/'+this.consulta;
                        axios.get(url).then(response => {
                            this.datos = response.data;
                        this.cmbDatos = this.datos.data;
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
                        this.consultar (page);
                    });
                    }


                },
                //---------------------- /CONSULTAS----------------------------------------//

                //---------------------- FUNCIONES----------------------------------------//
                limpiar : function() {
                    this.color_create = "";
                    this.nombre_create = "";
                },

                ordenar : function() {
                    if(this.orden == 'asc' ) {
                        this.cmbDatos.sort(function (a, b) {
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
                        this.cmbDatos.sort(function (a, b) {
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
                //---------------------- FUNCIONES----------------------------------------//
                //--------------------------------------Validaciones -----------------------------------------------//

                validarCampos : function(tipo) {
                    var datos_sin_numeros =  /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/;
                    var patt3 = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s0-9]+$/;
                    var er_numeros = /^[0-9,]+$/;

                    if(tipo == 'creacion'){

                        this.nombre_create = this.nombre_create.trim();
                        this.color_create = this.color_create.trim();
                        if(this.nombre_create === ''){
                            this.errores.push('el nombre no puede estar en blanco');
                        } else {
                            if(datos_sin_numeros .test(this.nombre_create) === false){
                                this.errores.push('el nombre no puede contener ni numeros ni caracteres especiales');
                            }
                        }

                        if(this.color_create === ''){
                            this.errores.push('Debe escoger un color');
                        }

                    } else if (tipo == 'actualizacion') {
                        this.nombre_update = this.nombre_update.trim();
                        this.color_update= this.color_update.trim();
                        if(this.nombre_update === ''){
                            this.errores.push('el nombre no puede estar en blanco');
                        } else {
                            if(datos_sin_numeros .test(this.nombre_update) === false){
                                this.errores.push('el nombre no puede contener ni numeros ni caracteres especiales');
                            }
                        }

                        if(this.color_update === ''){
                            this.errores.push('Debe escoger un color');
                        }
                    } else if(tipo == 'busqueda') {

                    }

                },
                //--------------------------------------Validaciones -----------------------------------------------//


            }
        })
    </script>
@endsection