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
                        <th>COMERCIO</th>
                        <th>PRODUCTO</th>
                        <th>TOTAL</th>
                        <th>TIPO COMISIÓN</th>
                        <th>VALOR COMISIÓN</th>
                        <th COLSPAN="3">ACCIONES</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      {{--  <td>subtotal</td>
                        <td>comision</td>
                        <td>total</td>
                        <td>cliente</td>
                        <td>tipo tarjeta</td>
                        <td>fecha</td>
                        <td>proceso</td>

                        <td>
                            <button class="btn btn-primary"  @click="editar" ><i class="fa fa-pencil-square-o 2x-fa" aria-hidden="true"></i></button>
                            <button class="btn btn-info" @click="ver"><i class="fa fa-eye" aria-hidden="true"></i></button>
                            <button class="btn btn-danger"  @click="eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </td>--}}
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
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">Login:</label>
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
                   fecha :'',
                   proceso : '',
                   fecha_transaccion : '',
                   estado_banco :'',
                   estado_comercio :'',
                   factura: '',
                   cliente : '',
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

                    consultar : function(){

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
                          
                            var url = '/transaccion/banco/store';
                            axios.post(url, {
                                
                           subtotal : this.subtotal,
                            comision: this.comision,
                            total: this.total,
                            cliente: this.cliente,
                            tarjeta : this.tarjeta,
                            fecha : this.fecha,
                            proceso : this.proceso ,
                            fecha_transaccion : this.fecha_transaccion ,
                            estado_banco : this.banco,
                            estado_comercio : this.estado_comercio,
                            factura:  this.factura,
                            cliente : this.cliente ,
                            numero_factura_banco : this.numero_factura_banco ,
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
                         //this.espaciosBlanco();
                      //this.validarCampos();

                      if(this.errores.length == 0){
                          
                           var url = 'transaccion/banco/update';
                            axios.post(url, {
                                
                          subtotal : this.subtotal,
                            comision: this.comision,
                            total: this.total,
                            cliente: this.cliente,
                            tarjeta : this.tarjeta,
                            fecha : this.fecha,
                            proceso : this.proceso ,
                            fecha_transaccion : this.fecha_transaccion ,
                            estado_banco : this.banco,
                            estado_comercio : this.estado_comercio,
                            factura:  this.factura,
                            cliente : this.cliente ,
                            numero_factura_banco : this.numero_factura_banco ,

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







