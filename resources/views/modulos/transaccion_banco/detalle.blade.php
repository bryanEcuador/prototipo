@extends('layouts.admin')
@section('nombre_pagina','Transacción banco')
@section('css')
    <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('titulo de la pagina','Transacción banco')
@section('subtitulo','')

@section('contenido')


    <div class="col-md-12" id="creacionProveedores">

        <div class="tile">

            <button class="btn btn-primary btn-lg btn-block mb-4" @click="crear"> Agregar detalle transacción</button>
            <input type="text" class="form-control" v-model="consulta" v-on:keyup.13="consultar" placeholder="Ingrese el nombre del comercio a consultar y presione la tecla enter"><br>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <TH>TRANSACCIÓN</TH>
                        <th>COMERCIO</th>
                        <th>PRODUCTO</th>
                        <th>SUBTOTAL</th>
                        <th>TOTAL</th>
                        <th COLSPAN="3">ACCIONES</th>
                    </tr>
                    </thead>
                    <tbody>
                   <tr v-for="dato in tabla" >
                    
                    <td>@{{dato.big_td_idTransaccion}}</td>
                    
                    <td>@{{dato.big_td_idComercio}}</td>

                    <td>@{{dato.big_td_idComercioProducto}}</td>
                   
                    <td>@{{dato.mon_td_subtotal}}</td>
                    <td>@{{dato.mon_td_total}}</td>
                    <td>
                        <button class="btn btn-primary"  @click="editar(dato.big_td_idTransaccionDetalle)" ><i class="fa fa-pencil-square-o 2x-fa" aria-hidden="true"></i></button>
                    </td>
                    <td>
                        <button class="btn btn-info" @click="ver(dato.big_td_idTransaccionDetalle)"><i class="fa fa-eye" aria-hidden="true"></i></button>
                    </td>
                    <td>
                        <button class="btn btn-danger"  @click="eliminar(dato.big_td_idTransaccionDetalle)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    </td>
                  </tr>

                    </tbody>
                </table>

            <div class="form-inline" v-if="datosNumber !== 0">
                <div class="col-md-4">
                    <span> @{{ paginacion.to }} de @{{paginacion.total}} registros</span>
                </div>

                <div class="col-md-8">
                    <div>
                         <!-- corregir -->
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
            </div>
            </div>

        </div>

        <!-- Modal crear -->
        <div class="modal fade"  role="dialog" id="crear">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
                        <h4 class="modal-title">Crear transacción</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12" >
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">Transacción</label>
                                </div>
                                <div class="col-md-4 ">
                                   <select class="form-control" v-model="transaccion">
                                       <option></option>
                                       <option></option>
                                   </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="nombre">Comercio</label>
                                </div>
                                <div class="col-md-4 ">
                                    <select class="form-control" v-model="comercio">
                                        <option></option>
                                        <option></option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">Cantidad</label>
                                </div>
                                <div class="col-md-4 ">
                                    <input class="form-control" type="number" v-model="cantidad">

                                </div>
                                <div class="col-md-2">
                                    <label for="nombre">Subtotal</label>
                                </div>
                                <div class="col-md-4 ">
                                    <input class="form-control" type="number" v-model="subtotal">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">Pago</label>
                                </div>
                                <div class="col-md-4 ">
                                    <input class="form-control" type="number" v-model="botonpago">
                                </div>
                                <div class="col-md-2">
                                    <label for="nombre">Total</label>
                                </div>
                                <div class="col-md-4 ">
                                    <input class="form-control" type="number" v-model="total">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">Estado comercio</label>
                                </div>
                                <div class="col-md-4 ">
                                    <select class="form-control" v-model="estado_comercio">
                                        <option></option>
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click="guardar" > Guardar       </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

         <!-- Modal editar -->
        <div class="modal fade"  role="dialog" id="crear">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
                        <h4 class="modal-title">Crear transacción</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12" >
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">Transacción</label>
                                </div>
                                <div class="col-md-4 ">
                                   <select class="form-control" v-model="e_transaccion">
                                       <option></option>
                                       <option></option>
                                   </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="nombre">Comercio</label>
                                </div>
                                <div class="col-md-4 ">
                                    <select class="form-control" v-model="e_comercio">
                                        <option></option>
                                        <option></option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">Cantidad</label>
                                </div>
                                <div class="col-md-4 ">
                                    <input class="form-control" type="number" v-model="e_cantidad">

                                </div>
                                <div class="col-md-2">
                                    <label for="nombre">Subtotal</label>
                                </div>
                                <div class="col-md-4 ">
                                    <input class="form-control" type="number" v-model="e_subtotal">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">Pago</label>
                                </div>
                                <div class="col-md-4 ">
                                    <input class="form-control" type="number" v-model="e_botonpago">
                                </div>
                                <div class="col-md-2">
                                    <label for="nombre">Total</label>
                                </div>
                                <div class="col-md-4 ">
                                    <input class="form-control" type="number" v-model="e_total">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">Estado comercio</label>
                                </div>
                                <div class="col-md-4 ">
                                    <select class="form-control" v-model="e_estado_comercio">
                                        <option></option>
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click="actualizar" > ACTUALIZAR       </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>



        <div id="eliminar" class="modal fade" role="dialog" >

            <div class="modal-dialog modal-lg">
                <div class="col-lg-12">
                    <div class="bs-component">
                        <div class="modal" style="position: relative; top: auto; right: auto; left: auto; bottom: auto; z-index: 1; display: block;">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"></h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>¿ ESTA SEGURO QUE DESEA ELIMINAR LA TRANSACCIÓN DE BANCO ?</h4>
                                        <button class="btn btn-primary" id="guardar" type="button" v-on:click="suprimir">Eliminar</button>
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">cancelar</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
@section('js')


    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>

    <script>
        var app = new Vue ({
                el:"#creacionProveedores",
                data: {
                   
                   transaccion : '',
                   comercio : '',
                   producto : '',
                   cantidad : '',
                   subtotal : '',
                   comision : '',
                   total : '',
                   estado : '',


                   e_id
                   e_transaccion : '',
                   e_comercio : '',
                   e_producto : '',
                   e_cantidad : '',
                   e_subtotal : '',
                   e_comision : '',
                   e_total : '',
                   e_estado : '',

                   v_transaccion : '',
                   v_comercio : '',
                   v_producto : '',
                   v_cantidad : '',
                   v_subtotal : '',
                   v_comision : '',
                   v_total : '',
                   v_estado : '',

                    

                    errores : [],

                    consulta : '',


                      /* paginacion */
                paginacion : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to': 0,
                },
                datosPorPagina : 5,
                offset: 3,
                datos :[],
                tabla : [],
                seleccionado : 0,
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

                    this.load()
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
                   var tamaño = 0;
                   
                   if(this.tabla !== undefined){
                         tamaño  = this.tabla.length
                    return tamaño;
                   }else{
                       return tamaño;
                   }
                   
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


                methods : {

                    eliminar : function () {
                        $("#eliminar").modal('show');
                    },


                    ver : function () {
                           var url = '/transaccion/banco/detalle/consult/'+id
                        axios.get(url).then(response => {
                            this.datos_ver = response.data
                                this.v_transaccion = data.big_td_idTransaccion ;
                                this.v_comercio = data.big_td_idComercio;
                                this.v_producto = data.big_td_idComercioProducto;
                                this.v_cantidad = data.mon_td_cantidad;
                                this.v_subtotal = data.mon_td_subtotal ;
                                this.v_comision = data.mon_td_comisionBotonPago ;
                                this.v_total = data.mon_td_total;
                                this.v_estado = data.var_tb_estadoComercio;
                            
                        }).catch(error => {
                            toastr.error("Error al consultar los datos.")
                            this.load();
                         });
                        $("#ver").modal('show');
                    },

                

                    crear : function () {
                        $("#crear").modal('show');
                    },


                    editar : function () {

                           var url = '/transaccion/banco/detalle/consult/'+id
                        axios.get(url).then(response => {
                            this.data = response.data
                                this.e_id = data.big_td_idTransaccionDetalle; 
                                this.e_transaccion = data.big_td_idTransaccion ;
                                this.e_comercio = data.big_td_idComercio;
                                this.e_producto = data.big_td_idComercioProducto;
                                this.e_cantidad = data.mon_td_cantidad;
                                this.e_subtotal = data.mon_td_subtotal ;
                                this.e_comision = data.mon_td_comisionBotonPago ;
                                this.e_total = data.mon_td_total;
                                this.e_estado = data.var_tb_estadoComercio;
                            
                        }).catch(error => {
                            toastr.error("Error al consultar los datos.")
                            this.load();
                         });
                        $("#editar").modal('show');
                    },

                    suprimir : function() {

                    },


                    guardar : function(){
                        //this.espaciosBlanco();
                        //this.validarCampos();

                        if(this.errores.length == 0){

                            var url = '/transaccion/banco/detalle/store';
                            axios.post(url, {

                            big_td_idTransaccion   : this.transaccion, 
                            big_td_idComercio   : this.comercio ,
                            big_td_idTransaccion   : this.producto ,
                            mon_td_cantidad   : this.cantidad ,
                            mon_td_subtotal   : this.subtotal ,
                            mon_td_comisionBotonPago  :  this.comision ,
                            mon_td_total   : this.total ,
                            var_tb_estadoComercio   : this.estado ,
                            }).then(response => {

                                //this.limpiar();
                                toastr.error("Error al momento de guardar el registro")
                        }).catch(error => {
                                console.log(error);
                        });



                        }else {
                            var num = this.errores.length;
                            for(var i=0; i<num;i++) {
                                toastr.error(this.errores[i]);
                            }
                            this.errores = [];
                        }
                    },

                    espaciosBlanco : function(){
                            this.transaccion = this.transaccion.trim();
                            this.comercio = this.comercio.trim();
                            this.producto = this.producto.trim();
                            this.cantidad = this.cantidad.trim();
                            this.subtotal = this.subtotal.trim();
                            this.comision = this.comision.trim();
                            this.total = this.total.trim();
                            this.estado = this.estado.trim();
                    },

                    validarCampos : function(tipo){
                        if(tipo == "g"){
                            if(this.transaccion == ""){
                                this.errores.push("El campo transacción no puede estar vacio")
                            }
                              if(this.comercio == ""){
                                this.errores.push("El campo comercio no puede estar vacio")
                            }
                              if(this.producto == ""){
                                this.errores.push("El campo producto no puede estar vacio")
                            }
                              if(this.cantidad == ""){
                                this.errores.push("El campo cantidad no puede estar vacio")
                            }
                              if(this.subtotal == ""){
                                this.errores.push("El campo subtotal no puede estar vacio")
                            }
                              if(this.comision == ""){
                                this.errores.push("El campo comisión  no puede estar vacio")
                            }
                             if(this.total == ""){
                                this.errores.push("El campo total  no puede estar vacio")
                            }
                             if(this.estado == ""){
                                this.errores.push("El campo estado  no puede estar vacio")
                            }

                        }else {

                             if(this.e_transaccion == ""){
                                this.errores.push("El campo transacción no puede estar vacio")
                            }
                              if(this.e_comercio == ""){
                                this.errores.push("El campo comercio no puede estar vacio")
                            }
                              if(this.e_producto == ""){
                                this.errores.push("El campo producto no puede estar vacio")
                            }
                              if(this.e_cantidad == ""){
                                this.errores.push("El campo cantidad no puede estar vacio")
                            }
                              if(this.e_subtotal == ""){
                                this.errores.push("El campo subtotal no puede estar vacio")
                            }
                              if(this.e_comision == ""){
                                this.errores.push("El campo comisión  no puede estar vacio")
                            }
                             if(this.e_total == ""){
                                this.errores.push("El campo total  no puede estar vacio")
                            }
                             if(this.e_estado == ""){
                                this.errores.push("El campo estado  no puede estar vacio")
                            }
                        }
                    }

                    actualizar : function() {
                        this.espaciosBlanco();
                        this.validarCampos("a");

                        if(this.errores.length == 0){

                            var url = 'transaccion/banco/detalle/update';
                            axios.post(url, {

                            big_td_idTransaccionDetalle : this.e_id,
                            big_td_idTransaccion   : this.e_transaccion, 
                            big_td_idComercio   : this.e_comercio ,
                            big_td_idTransaccion   : this.e_producto ,
                            mon_td_cantidad   : this.e_cantidad ,
                            mon_td_subtotal   : this.e_subtotal ,
                            mon_td_comisionBotonPago  :  this.e_comision ,
                            mon_td_total   : this.e_total ,
                            var_tb_estadoComercio   : thise_.estado ,

                            }).then(response => {

                                //this.limpiar();

                            }).catch(error => {
                                console.log(error);
                        });



                        }else {
                            var num = this.errores.length;
                            for(var i=0; i<num;i++) {
                                toastr.error(this.errores[i]);
                            }
                            this.errores = [];
                        }
                    },

                      //--------------------- PAGINACION ---------------------------------------//
               
               
                load : function(page, consulta) {

                   var url = page !== undefined ?  '/transaccion/banco/search/'+this.datosPorPagina+'/'+page : '/comercio/search/'+this.datosPorPagina;

                   if(page !== undefined && consulta !== undefined){
                        // 1 1
                        var url = '/transaccion/banco/search/'+this.datosPorPagina+'/'+page+'/'+consulta
                   }else if(page !== undefined && consulta == undefined )
                   {
                     // 1 0
                      var url = '/transaccion/banco/search/'+this.datosPorPagina+'/'+page;
                   }else if(page == undefined && consulta !== undefined){
                        
                        var url = '/transaccion/banco/search/'+this.datosPorPagina+'/'+0+'/'+consulta;
                   }else if(page == undefined && consulta == undefined ){
                     // 0 0
                     var url = '/transaccion/banco/search/'+this.datosPorPagina
                   }

                    axios.get(url).then(response => {

                    this.datos = response.data;
                    this.tabla = this.datos.data

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

                 changePage: function(page) {
                     this.paginacion.current_page = page;
                     if(this.consulta == ''){
                        this.load(page) 
                     }else {
                           this.load(page,this.consulta) 
                     }
                     
                    
                },

                changeNumberPage :function(page) {
                   if(this.consulta == ''){
                        this.load(page) 
                     }else {
                           this.load(page,this.consulta) 
                     }
                },

                
                //--------------------- PAGINACION ---------------------------------------//

                consultar : function(){
                     this.load(0,this.consulta) 
                },  

                }
            }
        );


    </script>


@endsection







