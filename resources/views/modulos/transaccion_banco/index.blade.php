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

            <button class="btn btn-primary btn-lg btn-block mb-4" @click="crear"> Agregar transacción</button>
            <input type="text" class="form-control" v-model="consulta" v-on:keyup.13="consultar" placeholder="Ingrese el nombre del comercio a consultar y presione la tecla enter"><br>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>TRANSACCIÓN</th>
                        <th>COMERCIO</th>
                        <th>SUBTOTAL</th>
                        <th>TOTAL</th>
                        <th COLSPAN="3">ACCIONES</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="dato in tabla">
                      <td>@{{dato.big_td_idTransaccionDetalle }}</td>
                      <td>@{{dato.big_td_idComercio}}</td>
                      <td>@{{dato.mon_td_subtotal}}</td>
                      <td>@{{dato.mon_td_tota}}</td>
                     

                        <td>
                            <button class="btn btn-primary"  @click="editar(dato.big_td_idTransaccionDetalle)" ><i class="fa fa-pencil-square-o 2x-fa" aria-hidden="true"></i></button>
                            <button class="btn btn-info" @click="ver(dato.big_td_idTransaccionDetalle)"><i class="fa fa-eye" aria-hidden="true"></i></button>
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
                                    <label for="nombre">Subtotal:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="number" name="nombre" v-model="subtotal" maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">Comisión:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="number" name="nombre" v-model="comision" maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">total:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="number" name="nombre" v-model="total" maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">cliente:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="text" name="nombre" v-model="cliente" maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">tarjeta:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="text" name="nombre" v-model="tarjeta" maxlength="20">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">Fecha proceso:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="text" name="nombre" v-model="proceso" maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">Fecha transacción:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="date" name="nombre" v-model="fecha_transaccion" maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">Estado banco:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="text" name="nombre" v-model="estado_banco" maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">Estado comercio:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="text" name="nombre" v-model="estado_comercio" maxlength="20">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">Numero factura:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="number" name="nombre" v-model="factura" maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">cliente:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="text" name="nombre" v-model="cliente" maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">Numero factura banco:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="text" name="nombre" v-model="numero_factura_banco" maxlength="20">
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
        <div class="modal fade"  role="dialog" id="editar">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
                        <h4 class="modal-title">Editar transacción</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12" >
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">Subtotal:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="number" name="nombre" v-model="subtotal" maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">Comisión:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="number" name="nombre" v-model="comision" maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">total:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="number" name="nombre" v-model="total" maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">cliente:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="text" name="nombre" v-model="cliente" maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">tarjeta:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="text" name="nombre" v-model="tarjeta" maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">fecha:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="date" name="nombre" v-model="fecha" maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">proceso:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="text" name="nombre" v-model="proceso" maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">fecha transacción:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="date" name="nombre" v-model="fecha_transaccion" maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">Estado banco:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="text" name="nombre" v-model="estado_banco" maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">Estado comercio:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="text" name="nombre" v-model="estado_comercio" maxlength="20">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">Numero factura:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="number" name="nombre" v-model="factura" maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">cliente:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="text" name="nombre" v-model="cliente" maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">Numero factura banco:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="text" name="nombre" v-model="numero_factura_banco" maxlength="20">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click="actualizar" > Actualizar       </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal ver -->
        <div class="modal fade"  role="dialog" id="ver">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
                        <h4 class="modal-title">Ver liquidación</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12" >
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">Subtotal:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="number" name="nombre" v-model="subtotal" maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">Comisión:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="number" name="nombre" v-model="comision" maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">total:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="number" name="nombre" v-model="total" maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">cliente:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="text" name="nombre" v-model="cliente" maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">tarjeta:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="text" name="nombre" v-model="tarjeta" maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">fecha:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="date" name="nombre" v-model="fecha" maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">proceso:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="text" name="nombre" v-model="proceso" maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">fecha transacción:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="date" name="nombre" v-model="fecha_transaccion" maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">Estado banco:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="text" name="nombre" v-model="estado_banco" maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">Estado comercio:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="text" name="nombre" v-model="estado_comercio" maxlength="20">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">Numero factura:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="number" name="nombre" v-model="factura" maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">cliente:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="text" name="nombre" v-model="cliente" maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">Numero factura banco:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control" type="text" name="nombre" v-model="numero_factura_banco" maxlength="20">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>

        {{-- eliminar  --}}
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
                                        <button class="btn btn-primary" id="guardar" type="button" v-on:click="actualizar">Eliminar</button>
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
                   subtotal :'',
                   comision:'',
                   total:'',
                   cliente:'',
                   tarjeta :'',
                 
                   proceso : '',
                   fecha_transaccion : '',
                   estado_banco :'',
                   estado_comercio :'',
                   factura: '',
                  
                   numero_factura_banco : '',


                   e_subtotal :'',
                   e_comision:'',
                   e_total:'',
                   e_cliente:'',
                   e_tarjeta :'',
                   e_fecha :'',
                   e_proceso : '',
                   e_fecha_transaccion : '',
                   e_estado_banco :'',
                   e_estado_comercio :'',
                   e_factura: '',
                   e_cliente : '',
                   e_numero_factura_banco : '',

                    v_subtotal :'',
                   v_comision:'',
                   v_total:'',
                   v_cliente:'',
                   v_tarjeta :'',
                   v_fecha :'',
                   v_proceso : '',
                   v_fecha_transaccion : '',
                   v_estado_banco :'',
                   v_estado_comercio :'',
                   v_factura: '',
                   v_cliente : '',
                   v_numero_factura_banco : '',

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


                        var url = '/transaccion/banco/consult/'+id
                        axios.get(url).then(response => {
                            var data = response.data
                            this.v_subtotal = data.mon_tb_subtotal;
                            this.v_comision= data.mon_tb_comisionBoton;
                            this.v_total= data.mon_tb_total ;
                            this.v_cliente= data.big_tb_idCliente ;
                            this.v_tarjeta = data.var_tb_tipoTarjeta ;
                        
                            this.v_proceso =  data.fch_tb_fechaProceso ;
                            this.v_fecha_transaccion =  data.fch_tb_fechaTransaccion ;
                            this.v_estado_banco = data.var_tb_estadoBanco  ;
                            this.v_estado_comercio = data.var_tb_estadoComercios ;
                            this.v_factura=  data.var_tb_numeroFacturaCliente ;
                            
                            this.e_numero_factura_banco =  data.var_tb_numeroFacturaBanco;

                           
                        
                            
                        }).catch(error => {
                            toastr.error("Error al consultar los datos.")
                            
                         });
                       $("#ver").modal('show');
                   },

                    consultar : function(){

                    },

                   crear : function () {
                       $("#crear").modal('show');
                   },
                   
                   
                   editar : function () {
                       var url = '/transaccion/banco/consult/'+id
                        axios.get(url).then(response => {
                            var data = response.data
                            this.e_subtotal = data.mon_tb_subtotal;
                            this.e_comision= data.mon_tb_comisionBoton;
                            this.e_total= data.mon_tb_total ;
                            this.e_cliente= data.big_tb_idCliente ;
                            this.e_tarjeta = data.var_tb_tipoTarjeta ;
                            
                            this.e_proceso =  data.fch_tb_fechaProceso ;
                            this.e_fecha_transaccion =  data.fch_tb_fechaTransaccion ;
                            this.e_estado_banco = data.var_tb_estadoBanco  ;
                            this.e_estado_comercio = data.var_tb_estadoComercios ;
                            this.e_factura=  data.var_tb_numeroFacturaCliente ;
                            
                            this.e_numero_factura_banco =  data.var_tb_numeroFacturaBanco;

                           
                        
                            
                        }).catch(error => {
                            toastr.error("Error al consultar los datos.")
                            
                         });
                       $("#editar").modal('show');
                   },

                   suprimir : function() {

                   },

                   validarCampos : function (tipo) {
                     if (tipo == "g"){
                         if(this.subtotal == ""){
                             this.errores.push("El campo subtotal no puede estar vacio");
                         }
                         if(this.comision == ""){
                             this.errores.push("El campo comisión no puede estar vacio");
                         }
                         if(this.total == ""){
                             this.errores.push("El campo total no puede estar vacio");
                         }
                         
                         if(this.cliente == ""){
                             this.errores.push("El campo cliente no puede estar vacio");
                         }
                         if(this.tarjeta == ""){
                             this.errores.push("El campo tarjeta no puede estar vacio");
                         }
                         if(this.fecha == ""){
                             this.errores.push("El campo fecha no puede estar vacio");
                         }
                         if(this.proceso == ""){
                             this.errores.push("El campo proceso no puede estar vacio");
                         }
                           if(this.fecha_transaccion == ""){
                             this.errores.push("El campo fecha transacción no puede estar vacio");
                         }
                           if(this.estado_banco == ""){
                             this.errores.push("El campo estado banco no puede estar vacio");
                         }
                         if(this.estado_comercio == ""){
                             this.errores.push("El campo estado comercio no puede estar vacio");
                         }
                         if(this.factura == ""){
                             this.errores.push("El campo factura no puede estar vacio");
                         }
                         
                         if(this.numero_factura_banco == ""){
                             this.errores.push("El campo numero factura no puede estar vacio");
                         }
                         
                     } else {
                        if(this.e_subtotal == ""){
                             this.errores.push("El campo subtotal no puede estar vacio");
                         }
                         if(this.e_comision == ""){
                             this.errores.push("El campo comisión no puede estar vacio");
                         }
                         if(this.e_total == ""){
                             this.errores.push("El campo total no puede estar vacio");
                         }
                         
                         if(this.e_cliente == ""){
                             this.errores.push("El campo cliente no puede estar vacio");
                         }
                         if(this.e_tarjeta == ""){
                             this.errores.push("El campo tarjeta no puede estar vacio");
                         }
                         if(this.e_fecha == ""){
                             this.errores.push("El campo fecha no puede estar vacio");
                         }
                         if(this.e_proceso == ""){
                             this.errores.push("El campo proceso no puede estar vacio");
                         }
                           if(this.e_fecha_transaccion == ""){
                             this.errores.push("El campo fecha transacción no puede estar vacio");
                         }
                           if(this.e_estado_banco == ""){
                             this.errores.push("El campo estado banco no puede estar vacio");
                         }
                         if(this.e_estado_comercio == ""){
                             this.errores.push("El campo estado comercio no puede estar vacio");
                         }
                         if(this.e_factura == ""){
                             this.errores.push("El campo factura no puede estar vacio");
                         }
                         
                         if(this.e_numero_factura_banco == ""){
                             this.errores.push("El campo numero factura no puede estar vacio");
                         }

                     }  
                   },


                   guardar : function(){
                      //this.espaciosBlanco();
                     this.validarCampos("g");

                      if(this.errores.length == 0){
                          
                            var url = '/transaccion/banco/store';
                            axios.post(url, {
                                
                           mon_tb_subtotal : this.subtotal,
                            mon_tb_comisionBoton: this.comision,
                            mon_tb_total: this.total,
                            big_tb_idCliente: this.cliente,
                            var_tb_tipoTarjeta : this.tarjeta,
                            /* fch_tb_fechaProceso : this.fecha, */
                             fch_tb_fechaProceso: this.proceso ,
                            fch_tb_fechaTransaccion : this.fecha_transaccion ,
                            var_tb_estadoBanco : this.banco,
                            var_tb_estadoComercios : this.estado_comercio,
                            var_tb_numeroFacturaCliente:  this.factura,
                            var_tb_numeroFacturaBanco : this.numero_factura_banco ,
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

                    actualizar : function() {
                         this.espaciosBlanco();
                        this.validarCampos("a");

                      if(this.errores.length == 0){
                          
                           var url = 'transaccion/banco/update';
                            axios.post(url, {
                                
                          mon_tb_subtotal : this.e_subtotal,
                            mon_tb_comisionBoton: this.e_comision,
                            mon_tb_total: this.e_total,
                            big_tb_idCliente: this.e_cliente,
                            var_tb_tipoTarjeta : this.e_tarjeta,
                            /* fch_tb_fechaProceso : this.fecha, */
                             fch_tb_fechaProceso: this.e_proceso ,
                            fch_tb_fechaTransaccion : this.e_fecha_transaccion ,
                            var_tb_estadoBanco : this.e_banco,
                            var_tb_estadoComercios : this.e_estado_comercio,
                            var_tb_numeroFacturaCliente:  this.e_factura,
                            var_tb_numeroFacturaBanco : this.e_numero_factura_banco ,

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







