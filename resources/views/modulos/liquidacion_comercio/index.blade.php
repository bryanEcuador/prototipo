@extends('layouts.admin')
@section('nombre_pagina','Liquidacion comercio')
@section('css')
<link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('titulo de la pagina','liquidacion comercio')
@section('subtitulo','')


    <div class="col-md-12" id="creacionProveedores">
        
        <div class="tile">

    <button class="btn btn-primary btn-lg btn-block mb-4" @click="crear"> Agregar liquidación</button>

           <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>transaccion</th>
                    <th>comercio</th>
                    <th>producto</th>
                    <th>cliente</th>
                    <th>cantidad</th>
                    <th>valor</th>
                    <th>total</th>
     
                    <th>Accioes</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>transaccion</td>
                    <td>comercio</td>
                    <td>producto</td>
                    <td>cliente</td>
                    <td>cantidad</td>
                    <td>valor</td>
                    <td>total</td>
               
                    <td>
                       <button class="btn btn-primary"  @click="editar" ><i class="fa fa-pencil-square-o 2x-fa" aria-hidden="true"></i></button>
                        <button class="btn btn-info" @click="ver"><i class="fa fa-eye" aria-hidden="true"></i></button>
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
                    <label for="nombre">Transaccion:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="nombre" v-model="transaccion" maxlength="20">
                </div>
                                <div class="col-md-2">
                    <label for="nombre">detalle transaccion:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="nombre" v-model="detalle_transaccion" maxlength="20">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Comercio:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="nombre" v-model="comercio" maxlength="20">
                </div>
                                <div class="col-md-2">
                    <label for="nombre">comercio producto:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="nombre" v-model="comercio_producto" maxlength="20">
                </div>
            </div>
 
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">cliente:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="nombre" v-model="cliente" maxlength="20">
                </div>
                <div class="col-md-2">
                    <label for="nombre">cantidad:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" name="nombre" v-model="cantidad" maxlength="20">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">valor:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" name="nombre" v-model="valor" maxlength="20">
                </div>
                <div class="col-md-2">
                    <label for="nombre">subtotal:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" name="nombre" v-model="subtotal" maxlength="20">
                </div>
            </div>
           
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Comision:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" name="nombre" v-model="comision" maxlength="20">
                </div>
                <div class="col-md-2">
                    <label for="nombre">Total:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" name="nombre" v-model="total" maxlength="20">
                </div>
            </div>
          
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Estado:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="nombre" v-model="estado" maxlength="20">
                </div>
                <div class="col-md-2">
                    <label for="nombre">Fecha transacción:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="date" name="nombre" v-model="fecha_transaccion" maxlength="20">
                </div>
            </div>
           
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Fecha de proceso:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="date" name="nombre" v-model="fecha_proceso" maxlength="20">
                </div>
                <div class="col-md-2">
                    <label for="nombre">Fecha liquidación:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="date" name="nombre" v-model="fecha_liquidacion" maxlength="20">
                </div>
            </div>
           
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Factura:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="nombre" v-model="factura" maxlength="20">
                </div>
                <div class="col-md-2">
                    <label for="nombre">Tipo comisión :</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="nombre" v-model="nombre" maxlength="20">
                </div>
            </div>
           
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">valor comision:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" name="nombre" v-model="nombre" maxlength="20">
                </div>
            </div>
           </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" > Guardar       </button>
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
                    <label for="nombre">Transaccion:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="nombre" v-model="transaccion" maxlength="20">
                </div>
                                <div class="col-md-2">
                    <label for="nombre">detalle transaccion:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="nombre" v-model="detalle_transaccion" maxlength="20">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Comercio:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="nombre" v-model="comercio" maxlength="20">
                </div>
                                <div class="col-md-2">
                    <label for="nombre">comercio producto:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="nombre" v-model="comercio_producto" maxlength="20">
                </div>
            </div>
 
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">cliente:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="nombre" v-model="cliente" maxlength="20">
                </div>
                <div class="col-md-2">
                    <label for="nombre">cantidad:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" name="nombre" v-model="cantidad" maxlength="20">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">valor:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" name="nombre" v-model="valor" maxlength="20">
                </div>
                <div class="col-md-2">
                    <label for="nombre">subtotal:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" name="nombre" v-model="subtotal" maxlength="20">
                </div>
            </div>
           
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Comision:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" name="nombre" v-model="comision" maxlength="20">
                </div>
                <div class="col-md-2">
                    <label for="nombre">Total:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" name="nombre" v-model="total" maxlength="20">
                </div>
            </div>
          
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Estado:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="nombre" v-model="estado" maxlength="20">
                </div>
                <div class="col-md-2">
                    <label for="nombre">Fecha transacción:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="date" name="nombre" v-model="fecha_transaccion" maxlength="20">
                </div>
            </div>
           
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Fecha de proceso:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="date" name="nombre" v-model="fecha_proceso" maxlength="20">
                </div>
                <div class="col-md-2">
                    <label for="nombre">Fecha liquidación:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="date" name="nombre" v-model="fecha_liquidacion" maxlength="20">
                </div>
            </div>
           
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Factura:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="nombre" v-model="factura" maxlength="20">
                </div>
                <div class="col-md-2">
                    <label for="nombre">Tipo comisión :</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="nombre" v-model="nombre" maxlength="20">
                </div>
            </div>
           
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">valor comision:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" name="nombre" v-model="nombre" maxlength="20">
                </div>
            </div>
           </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" > Actualizar       </button>
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
                    <label for="nombre">Transaccion:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="nombre" v-model="transaccion" maxlength="20">
                </div>
                                <div class="col-md-2">
                    <label for="nombre">detalle transaccion:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="nombre" v-model="detalle_transaccion" maxlength="20">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Comercio:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="nombre" v-model="comercio" maxlength="20">
                </div>
                                <div class="col-md-2">
                    <label for="nombre">comercio producto:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="nombre" v-model="comercio_producto" maxlength="20">
                </div>
            </div>
 
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">cliente:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="nombre" v-model="cliente" maxlength="20">
                </div>
                <div class="col-md-2">
                    <label for="nombre">cantidad:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" name="nombre" v-model="cantidad" maxlength="20">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">valor:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" name="nombre" v-model="valor" maxlength="20">
                </div>
                <div class="col-md-2">
                    <label for="nombre">subtotal:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" name="nombre" v-model="subtotal" maxlength="20">
                </div>
            </div>
           
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Comision:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" name="nombre" v-model="comision" maxlength="20">
                </div>
                <div class="col-md-2">
                    <label for="nombre">Total:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" name="nombre" v-model="total" maxlength="20">
                </div>
            </div>
          
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Estado:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="nombre" v-model="estado" maxlength="20">
                </div>
                <div class="col-md-2">
                    <label for="nombre">Fecha transacción:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="date" name="nombre" v-model="fecha_transaccion" maxlength="20">
                </div>
            </div>
           
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Fecha de proceso:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="date" name="nombre" v-model="fecha_proceso" maxlength="20">
                </div>
                <div class="col-md-2">
                    <label for="nombre">Fecha liquidación:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="date" name="nombre" v-model="fecha_liquidacion" maxlength="20">
                </div>
            </div>
           
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Factura:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="nombre" v-model="factura" maxlength="20">
                </div>
                <div class="col-md-2">
                    <label for="nombre">Tipo comisión :</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="nombre" v-model="nombre" maxlength="20">
                </div>
            </div>
           
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">valor comision:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" name="nombre" v-model="nombre" maxlength="20">
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
                                       <h2>¿ ESTA SEGURO QUE DESEA ELIMINAR LA TRANSACCIÓN ?</h2>
                                        <button class="btn btn-primary" id="guardar" type="button" v-on:click="actualizar">Eliminar</button>
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">cancelar</button>
                                   </div>
                                </div>
                            </div>
                          </form>
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


                   guardar : function(){
                      //this.espaciosBlanco();
                      //this.validarCampos();

                      if(this.errores.length == 0){
                          
                            var url = 'comercio/store';
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

                    actualizar : function() {
                         //this.espaciosBlanco();
                      //this.validarCampos();

                      if(this.errores.length == 0){
                          
                           var url = 'comercio/update';
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

                }
            }
        );


    </script>
@endsection







