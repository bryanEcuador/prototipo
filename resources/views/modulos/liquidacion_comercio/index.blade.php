@extends('layouts.admin')
@section('nombre_pagina','Liquidación comercio')
@section('css')
<link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('titulo de la pagina','Liquidación comercio')
@section('subtitulo','')
@section('contenido')
    

    <div class="col-md-12" id="creacionProveedores">
        
        <div class="tile">

            <button class="btn btn-primary btn-lg btn-block mb-4" @click="crear"> Agregar liquidación</button>
            <input type="text" class="form-control" v-model="consulta" v-on:keyup.13="consultar" placeholder="Ingrese el nombre del comercio a consultar y presione la tecla enter"><br>  
            <div class="table-responsive">
                 <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>CODIGO</th>
                            <th>COMERCIO</th>
                            <th>CLIENTE</th>
                            <th>FECHA LIQUIDACIÓN</th>
                            <th>FECHA TRANSACCIÓN</th>
                            <th colspan="3">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="dato in tabla">
                            <td>@{{ dato.big_lc_idLiquidacion}}</td>
                            <td>@{{ dato.big_lc_idComercio}}</td>
                            <td>@{{ dato.big_lc_idCliente}}</td>
                            <td>@{{ dato.fch_lc_fechaLiquidacion}}</td>
                            <td>@{{ dato.fch_lc_fechaTransaccion}}</td>
                            <td>
                                <button class="btn btn-primary"  @click="editar" ><i class="fa fa-pencil-square-o 2x-fa" aria-hidden="true"></i></button>
                            </td>
                            <td>
                                <button class="btn btn-info" @click="ver"><i class="fa fa-eye" aria-hidden="true"></i></button>
                            </td>
                            <td>
                                <button class="btn btn-danger"  @click="eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            
            </div>  
          
        </div>
       
   
   
   
                    <!-- Modal crear -->
            <div class="modal fade"  role="dialog" id="crear">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
                    <h4 class="modal-title">Crear liquidación</h4>
                    </div>
                    <div class="modal-body">
                    <div class="col-md-12" >
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label >Transaccion:</label>
                            </div>
                            <div class="col-md-4 ">
                            <input class="form-control" type="text"  v-model="transaccion" maxlength="20">
                            </div>
                                            <div class="col-md-2">
                                <label >detalle transaccion:</label>
                            </div>
                            <div class="col-md-4 ">
                            <input class="form-control" type="text"  v-model="detalle_transaccion" maxlength="20">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2">
                                <label >Comercio:</label>
                            </div>
                            <div class="col-md-4 ">
                            <input class="form-control" type="text"  v-model="comercio" maxlength="20">
                            </div>
                                            <div class="col-md-2">
                                <label >comercio producto:</label>
                            </div>
                            <div class="col-md-4 ">
                            <input class="form-control" type="text"  v-model="comercio_producto" maxlength="20">
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label >cliente:</label>
                            </div>
                            <div class="col-md-4 ">
                            <input class="form-control" type="text"  v-model="cliente" maxlength="20">
                            </div>
                            <div class="col-md-2">
                                <label >cantidad:</label>
                            </div>
                            <div class="col-md-4 ">
                            <input class="form-control" type="number"  v-model="cantidad" maxlength="20">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2">
                                <label >valor:</label>
                            </div>
                            <div class="col-md-4 ">
                            <input class="form-control" type="number"  v-model="valor" maxlength="20">
                            </div>
                            <div class="col-md-2">
                                <label >subtotal:</label>
                            </div>
                            <div class="col-md-4 ">
                            <input class="form-control" type="number"  v-model="subtotal" maxlength="20">
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label >Comision:</label>
                            </div>
                            <div class="col-md-4 ">
                            <input class="form-control" type="number"  v-model="comision" maxlength="20">
                            </div>
                            <div class="col-md-2">
                                <label >Total:</label>
                            </div>
                            <div class="col-md-4 ">
                            <input class="form-control" type="number"  v-model="total" maxlength="20">
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label >Estado:</label>
                            </div>
                            <div class="col-md-4 ">
                            <input class="form-control" type="text"  v-model="estado" maxlength="20">
                            </div>
                            <div class="col-md-2">
                                <label >Fecha transacción:</label>
                            </div>
                            <div class="col-md-4 ">
                            <input class="form-control" type="date"  v-model="fecha_transaccion" maxlength="20">
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label >Fecha de proceso:</label>
                            </div>
                            <div class="col-md-4 ">
                            <input class="form-control" type="date"  v-model="fecha_proceso" maxlength="20">
                            </div>
                            <div class="col-md-2">
                                <label >Fecha liquidación:</label>
                            </div>
                            <div class="col-md-4 ">
                            <input class="form-control" type="date"  v-model="fecha_liquidacion" maxlength="20">
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label >Factura:</label>
                            </div>
                            <div class="col-md-4 ">
                            <input class="form-control" type="text"  v-model="factura" maxlength="20">
                            </div>
                            <div class="col-md-2">
                                <label >Tipo comisión :</label>
                            </div>
                            <div class="col-md-4 ">
                                <select class="form-control" v-model="tipo_comision" >
                                    <option >1</option>
                                    <option >2</option>
                                </select>

                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label >valor comision:</label>
                            </div>
                            <div class="col-md-4 ">
                            <input class="form-control" type="number"  v-model="valor_comision" maxlength="20">
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
                        <h4 class="modal-title">Editar liquidación</h4>
                        </div>
                        <div class="modal-body">
                        <div class="col-md-12" >
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label >Transaccion:</label>
                                </div>
                                <div class="col-md-4 ">
                                <input class="form-control" type="text"  v-model="e_transaccion" maxlength="20">
                                </div>
                                                <div class="col-md-2">
                                    <label >detalle transaccion:</label>
                                </div>
                                <div class="col-md-4 ">
                                <input class="form-control" type="text"  v-model="e_detalle_transaccion" maxlength="20">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label >Comercio:</label>
                                </div>
                                <div class="col-md-4 ">
                                <input class="form-control" type="text"  v-model="e_comercio" maxlength="20">
                                </div>
                                                <div class="col-md-2">
                                    <label >comercio producto:</label>
                                </div>
                                <div class="col-md-4 ">
                                <input class="form-control" type="text"  v-model="e_comercio_producto" maxlength="20">
                                </div>
                            </div>
                
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label >cliente:</label>
                                </div>
                                <div class="col-md-4 ">
                                <input class="form-control" type="text"  v-model="e_cliente" maxlength="20">
                                </div>
                                <div class="col-md-2">
                                    <label >cantidad:</label>
                                </div>
                                <div class="col-md-4 ">
                                <input class="form-control" type="number"  v-model="e_cantidad" maxlength="20">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label >valor:</label>
                                </div>
                                <div class="col-md-4 ">
                                <input class="form-control" type="number"  v-model="e_valor" maxlength="20">
                                </div>
                                <div class="col-md-2">
                                    <label >subtotal:</label>
                                </div>
                                <div class="col-md-4 ">
                                <input class="form-control" type="number"  v-model="e_subtotal" maxlength="20">
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label >Comision:</label>
                                </div>
                                <div class="col-md-4 ">
                                <input class="form-control" type="number"  v-model="e_comision" maxlength="20">
                                </div>
                                <div class="col-md-2">
                                    <label >Total:</label>
                                </div>
                                <div class="col-md-4 ">
                                <input class="form-control" type="number"  v-model="e_total" maxlength="20">
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label >Estado:</label>
                                </div>
                                <div class="col-md-4 ">
                                <input class="form-control" type="text"  v-model="e_estado" maxlength="20">
                                </div>
                                <div class="col-md-2">
                                    <label >Fecha transacción:</label>
                                </div>
                                <div class="col-md-4 ">
                                <input class="form-control" type="date"  v-model="e_fecha_transaccion" maxlength="20">
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label >Fecha de proceso:</label>
                                </div>
                                <div class="col-md-4 ">
                                <input class="form-control" type="date"  v-model="e_fecha_proceso" maxlength="20">
                                </div>
                                <div class="col-md-2">
                                    <label >Fecha liquidación:</label>
                                </div>
                                <div class="col-md-4 ">
                                <input class="form-control" type="date"  v-model="e_fecha_liquidacion" maxlength="20">
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label >Factura:</label>
                                </div>
                                <div class="col-md-4 ">
                                <input class="form-control" type="text"  v-model="e_factura" maxlength="20">
                                </div>
                                <div class="col-md-2">
                                    <label >Tipo comisión :</label>
                                </div>
                                <div class="col-md-4 ">
                                    <select class="form-control" v-model="e_tipo_comision" >
                                        <option >1</option>
                                        <option >2</option>
                                    </select>

                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label >valor comision:</label>
                                </div>
                                <div class="col-md-4 ">
                                <input class="form-control" type="number"  v-model="e_valor_comision" maxlength="20">
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
                                <label >Transaccion:</label>
                            </div>
                            <div class="col-md-4 ">
                            <input class="form-control" type="text"  v-model="v_transaccion" maxlength="20">
                            </div>
                                            <div class="col-md-2">
                                <label >detalle transaccion:</label>
                            </div>
                            <div class="col-md-4 ">
                            <input class="form-control" type="text"  v-model="v_detalle_transaccion" maxlength="20">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2">
                                <label >Comercio:</label>
                            </div>
                            <div class="col-md-4 ">
                            <input class="form-control" type="text"  v-model="v_comercio" maxlength="20">
                            </div>
                                            <div class="col-md-2">
                                <label >comercio producto:</label>
                            </div>
                            <div class="col-md-4 ">
                            <input class="form-control" type="text"  v-model="v_comercio_producto" maxlength="20">
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label >cliente:</label>
                            </div>
                            <div class="col-md-4 ">
                            <input class="form-control" type="text"  v-model="v_cliente" maxlength="20">
                            </div>
                            <div class="col-md-2">
                                <label >cantidad:</label>
                            </div>
                            <div class="col-md-4 ">
                            <input class="form-control" type="number"  v-model="v_cantidad" maxlength="20">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2">
                                <label >valor:</label>
                            </div>
                            <div class="col-md-4 ">
                            <input class="form-control" type="number"  v-model="v_valor" maxlength="20">
                            </div>
                            <div class="col-md-2">
                                <label >subtotal:</label>
                            </div>
                            <div class="col-md-4 ">
                            <input class="form-control" type="number"  v-model="v_subtotal" maxlength="20">
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label >Comision:</label>
                            </div>
                            <div class="col-md-4 ">
                            <input class="form-control" type="number"  v-model="v_comision" maxlength="20">
                            </div>
                            <div class="col-md-2">
                                <label >Total:</label>
                            </div>
                            <div class="col-md-4 ">
                            <input class="form-control" type="number"  v-model="v_total" maxlength="20">
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label >Estado:</label>
                            </div>
                            <div class="col-md-4 ">
                            <input class="form-control" type="text"  v-model="v_estado" maxlength="20">
                            </div>
                            <div class="col-md-2">
                                <label >Fecha transacción:</label>
                            </div>
                            <div class="col-md-4 ">
                            <input class="form-control" type="date"  v-model="v_fecha_transaccion" maxlength="20">
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label >Fecha de proceso:</label>
                            </div>
                            <div class="col-md-4 ">
                            <input class="form-control" type="date"  v-model="v_fecha_proceso" maxlength="20">
                            </div>
                            <div class="col-md-2">
                                <label >Fecha liquidación:</label>
                            </div>
                            <div class="col-md-4 ">
                            <input class="form-control" type="date"  v-model="v_fecha_liquidacion" maxlength="20">
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label >Factura:</label>
                            </div>
                            <div class="col-md-4 ">
                            <input class="form-control" type="text"  v-model="v_factura" maxlength="20">
                            </div>
                            <div class="col-md-2">
                                <label >Tipo comisión :</label>
                            </div>
                            <div class="col-md-4 ">
                            <input class="form-control" type="text"  v-model="v_tipo_comision" maxlength="20">
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label >valor comision:</label>
                            </div>
                            <div class="col-md-4 ">
                            <input class="form-control" type="number"  v-model="v_valor_comision" maxlength="20">
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
                                        <h4>¿ ESTA SEGURO QUE DESEA ELIMINAR LA TRANSACCIÓN ?</h4>
                                            <button class="btn btn-danger" id="guardar" type="button" v-on:click="actualizar">Eliminar</button>
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
        var app = new Vue ({
                el:"#creacionProveedores",
                data: {
                    transaccion: '',
                    detalle_transaccion : '',
                    comercio : '',
                    comercio_producto : '',
                    cliente : '',
                   cantidad : '',                  
                    valor : '',
                    subtotal : '',
                    comision : '',
                    total : '',
                    estado : '',
                    fecha_transaccion : '',
                    fecha_proceso: '',
                    fecha_liquidacion:'',
                    factura: '',
                    tipo_comision: '',
                    valor_comision: '',

                    e_id : '',
                    e_transaccion: '',
                    e_detalle_transaccion : '',
                    e_comercio : '',
                    e_comercio_producto : '',
                    e_cliente : '',
                    e_cantidad : '',                  
                    e_valor : '',
                    e_subtotal : '',
                    e_comision : '',
                    e_total : '',
                    e_estado : '',
                    e_fecha_transaccion : '',
                    e_fecha_proceso: '',
                    e_fecha_liquidacion:'',
                    e_factura: '',
                    e_tipo_comision: '',
                    e_valor_comision: '',

                    v_transaccion: '',
                    v_detalle_transaccion : '',
                    v_comercio : '',
                    v_comercio_producto : '',
                    v_cliente : '',
                    v_cantidad : '',                  
                    v_valor : '',
                    v_subtotal : '',
                    v_comision : '',
                    v_total : '',
                    v_estado : '',
                    v_fecha_transaccion : '',
                    v_fecha_proceso: '',
                    v_fecha_liquidacion:'',
                    v_factura: '',
                    v_tipo_comision: '',
                    v_valor_comision: '',

                    errores : [],

                          /* paginacion */
                paginacion : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to': 0,
                },
                datosPorPagina : 10,
                offset: 3,
                datos :[],
                tabla : [],
                consulta :'',

                  /* configuracion */
                    respuesta : 0,

                    /*  */
                    seleccionado : 0,
                
                /* nuevas variables */
                   datos_editar : [],
                   datos_ver : [], 

                   

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
                       $("#ver").modal('show');
                   },

                   crear : function () {
                       $("#crear").modal('show');
                   },
                   
                   
                   editar : function () {
                       $("#editar").modal('show');
                   },

                   suprimir : function() {

                   },

                    espaciosBlanco : function() {
                    
                    this.transaccion= this.transaccion.trim();
                    this.detalle_transaccion = this.detalle_transaccion.trim();
                    this.comercio = this.comercio.trim();
                    this.comercio_producto = this.comercio_producto.trim();
                    this.cliente = this.cliente.trim();
                    this.cantidad = this.cantidad.trim();                  
                    this.valor = this.valor.trim();
                    this.subtotal = this.subtotal.trim();
                    this.comision = this.comision.trim();
                    this.total = this.total.trim();
                    this.estado = this.estado.trim();
                    this.fecha_transaccion = this.fecha_transaccion.trim();
                    this.fecha_proceso = this.fecha_proceso.trim();
                    this.fecha_liquidacion = this.fecha_liquidacion.trim();
                    this.factura = this.factura.trim();
                    this.tipo_comision = this.tipo_comision.trim();
                    this.valor_comision = this.valor_comision.trim();


                    this.e_transaccion= this.e_transaccion.trim();
                    this.e_detalle_transaccion = this.e_detalle_transaccion.trim();
                    this.e_comercio = this.e_comercio.trim();
                    this.e_comercio_producto = this.e_comercio_producto.trim();
                    this.e_cliente = this.e_cliente.trim();
                    this.e_cantidad = this.e_cantidad.trim();                  
                    this.e_valor = this.e_valor.trim();
                    this.e_subtotal = this.e_subtotal.trim();
                    this.e_comision = this.e_comision.trim();
                    this.e_total = this.e_total.trim();
                    this.e_estado = this.e_estado.trim();
                    this.e_fecha_transaccion = this.e_fecha_transaccion.trim();
                    this.e_fecha_proceso = this.e_fecha_proceso.trim();
                    this.e_fecha_liquidacion = this.e_fecha_liquidacion.trim();
                    this.e_factura = this.e_factura.trim();
                    this.e_tipo_comision = this.e_tipo_comision.trim();
                    this.e_valor_comision = this.e_valor_comision.trim();

                  
                    },
                    this.transaccion= this.transaccion.trim();
                    this.detalle_transaccion = this.detalle_transaccion.trim();
                    this.comercio = this.comercio.trim();
                    this.comercio_producto = this.comercio_producto.trim();
                    this.cliente = this.cliente.trim();
                    this.cantidad = this.cantidad.trim();                  
                    this.valor = this.valor.trim();
                    this.subtotal = this.subtotal.trim();
                    this.comision = this.comision.trim();
                    this.total = this.total.trim();
                    this.estado = this.estado.trim();
                    this.fecha_transaccion = this.fecha_transaccion.trim();
                    this.fecha_proceso = this.fecha_proceso.trim();
                    this.fecha_liquidacion = this.fecha_liquidacion.trim();
                    this.factura = this.factura.trim();
                    this.tipo_comision = this.tipo_comision.trim();
                    this.valor_comision = this.valor_comision.trim();


                    validarCampos :  function(tipo){
                        
                        if( tipo == "g"){
                                    if(this.transaccion == ""){
                                    this.errores.push("El campo transacción no puede estar vacio.")
                                }
                                if(this.detalle_transaccion == ""){
                                    this.errores.push("El campo detalle transacción no puede estar vacio.")
                                }
                                if(this.comercio == ""){
                                    this.errores.push("El campo comercio no puede estar vacio.")
                                }
                                if(this.comercio_producto == ""){
                                    this.errores.push("El campo producto no puede estar vacio.")
                                }
                                if(this.cliente == ""){
                                    this.errores.push("El campo cliente no puede estar vacio.")
                                }
                                if(this.cantidad == ""){
                                    this.errores.push("El campo cantidad no puede estar vacio.")
                                }
                                if(this.valor == ""){
                                    this.errores.push("El campo valor no puede estar vacio.")
                                }
                                if(this.subtotal == ""){
                                    this.errores.push("El campo subtotal no puede estar vacio.")
                                }
                                if(this.comision == ""){
                                    this.errores.push("El campo transacción no puede estar vacio.")
                                }
                                if(this.total == ""){
                                    this.errores.push("El campo total no puede estar vacio.")
                                }
                                if(this.estado == ""){
                                    this.errores.push("El campo estado no puede estar vacio.")
                                }
                                if(this.fecha_transaccion == ""){
                                    this.errores.push("El campo fecha transacción no puede estar vacio.")
                                }
                                if(this.fecha_proceso == ""){
                                    this.errores.push("El campo fecha proceso no puede estar vacio.")
                                }
                                if(this.fecha_liquidacion == ""){
                                    this.errores.push("El campo fecha liquidación no puede estar vacio.")
                                }
                                if(this.factura == ""){
                                    this.errores.push("El campo factura no puede estar vacio.")
                                }
                                if(this.tipo_comision == ""){
                                    this.errores.push("El campo tipo comisión no puede estar vacio.")
                                }
                                if(this.valor_comision == ""){
                                    this.errores.push("El campo valor comisión no puede estar vacio.")
                                }
                        } else {
                                
                                if(this.e_transaccion == ""){
                                    this.errores.push("El campo transacción no puede estar vacio.")
                                }
                                if(this.e_detalle_transaccion == ""){
                                    this.errores.push("El campo detalle transacción no puede estar vacio.")
                                }
                                if(this.e_comercio == ""){
                                    this.errores.push("El campo comercio no puede estar vacio.")
                                }
                                if(this.e_comercio_producto == ""){
                                    this.errores.push("El campo producto no puede estar vacio.")
                                }
                                if(this.e_cliente == ""){
                                    this.errores.push("El campo cliente no puede estar vacio.")
                                }
                                if(this.e_cantidad == ""){
                                    this.errores.push("El campo cantidad no puede estar vacio.")
                                }
                                if(this.e_valor == ""){
                                    this.errores.push("El campo valor no puede estar vacio.")
                                }
                                if(this.e_subtotal == ""){
                                    this.errores.push("El campo subtotal no puede estar vacio.")
                                }
                                if(this.e_comision == ""){
                                    this.errores.push("El campo transacción no puede estar vacio.")
                                }
                                if(this.e_total == ""){
                                    this.errores.push("El campo total no puede estar vacio.")
                                }
                                if(this.e_estado == ""){
                                    this.errores.push("El campo estado no puede estar vacio.")
                                }
                                if(this.e_fecha_transaccion == ""){
                                    this.errores.push("El campo fecha transacción no puede estar vacio.")
                                }
                                if(this.e_fecha_proceso == ""){
                                    this.errores.push("El campo fecha proceso no puede estar vacio.")
                                }
                                if(this.e_fecha_liquidacion == ""){
                                    this.errores.push("El campo fecha liquidación no puede estar vacio.")
                                }
                                if(this.e_factura == ""){
                                    this.errores.push("El campo factura no puede estar vacio.")
                                }
                                if(this.e_tipo_comision == ""){
                                    this.errores.push("El campo tipo comisión no puede estar vacio.")
                                }
                                if(this.e_valor_comision == ""){
                                    this.errores.push("El campo valor comisión no puede estar vacio.")
                                }
                        }

                        
                    },
                   guardar : function(){
                      this.espaciosBlanco();
                      this.validarCampos("g");

                      if(this.errores.length == 0){
                          
                            var url = '/liquidacion/comercio/store';
                            axios.post(url, {
                                
                           big_lc_idTransaccionBanco :this.transaccion,
                           big_lc_idTransaccionBancoDetalle :this.detalle_transaccion, 
                           big_lc_idComercio :this.comercio ,
                           big_lc_idComercioProducto :this.comercio_producto ,
                           big_lc_idCliente :this.cliente ,
                           big_lc_cantidad :this.cantidad ,
                            
                           mon_lc_valor :this.valor ,
                           mon_lc_subtotal :this.subtotal ,
                           mon_lc_comision :this.comision ,
                           mon_lc_total : this.total,
                           bit_estadoLiquidacion :this.estado ,
                           fch_lc_fechaTransaccion :this.fecha_transaccion ,
                           fch_lc_fechaProceso :this.fecha_proceso,
                           fch_lc_fechaLiquidacion :this.fecha_liquidacion,
                           var_lc_factura :this.factura,
                           var_lc_tipoComision :this.tipo_comision,
                           mon_lc_valorComision :this.valor_comision ,

                            }).then(response => {
                            if(response.data == this.respuesta){
                                toastr.success("Registro guardado con exito")
                          }else{
                              toastr.error("Error al guardar el registro")
                          }
                            this.limpiar();
                            
                            }).catch(error => {
                              toastr.error("Error al guardar el registro")
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
                          
                           var url = 'liquidacion/comercio/update';
                            axios.post(url, {
                           big_lc_idLiquidacion : this.e_id,          
                           big_lc_idTransaccionBanco :this.transaccion,
                           big_lc_idTransaccionBancoDetalle :this.detalle_transaccion, 
                           big_lc_idComercio :this.comercio ,
                           big_lc_idComercioProducto :this.comercio_producto ,
                           big_lc_idCliente :this.cliente ,
                           big_lc_cantidad :this.cantidad ,
                            
                           mon_lc_valor :this.valor ,
                           mon_lc_subtotal :this.subtotal ,
                           mon_lc_comision :this.comision ,
                           mon_lc_total : this.total,
                           bit_estadoLiquidacion :this.estado ,
                           fch_lc_fechaTransaccion :this.fecha_transaccion ,
                           fch_lc_fechaProceso :this.fecha_proceso,
                           fch_lc_fechaLiquidacion :this.fecha_liquidacion,
                           var_lc_factura :this.factura,
                           var_lc_tipoComision :this.tipo_comision,
                           mon_lc_valorComision :this.valor_comision ,

                            }).then(response => {

                                if(response.data == this.respuesta){
                                toastr.success("Registro actualizado con exito")
                              }else{
                                  toastr.error("Error al actualizar el registro")
                              }

                      }).catch(error => {
                              toastr.error("Error al actualizar el registro")
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

                   var url = page !== undefined ?  '/comercio/search/'+this.datosPorPagina+'/'+page : '/comercio/search/'+this.datosPorPagina;

                   if(page !== undefined && consulta !== undefined){
                        // 1 1
                        var url = '/comercio/search/'+this.datosPorPagina+'/'+page+'/'+consulta
                   }else if(page !== undefined && consulta == undefined )
                   {
                     // 1 0
                      var url = '/comercio/search/'+this.datosPorPagina+'/'+page;
                   }else if(page == undefined && consulta !== undefined){
                        
                        var url = '/comercio/search/'+this.datosPorPagina+'/'+0+'/'+consulta;
                   }else if(page == undefined && consulta == undefined ){
                     // 0 0
                     var url = '/comercio/search/'+this.datosPorPagina
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







