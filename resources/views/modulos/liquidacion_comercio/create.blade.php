@extends('layouts.admin')
@section('nombre_pagina','Liquidacion comercio')
@section('css')
@endsection
@section('titulo de la pagina','Liquidacion comercio')
@section('subtitulo','Formulario de comercio')

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

    <div class="col-md-12" id="creacionProveedores">
        <form action="{{route('administrador.proveedor.store')}}" method="post" id="administracion">
            @csrf
        <div class="tile">
           
            
           <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Transaccion:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="nombre" v-model="transaccion" maxlength="20">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">detalle transaccion:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="nombre" v-model="detalle_transaccion" maxlength="20">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Comercio:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="nombre" v-model="comercio" maxlength="20">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">comercio producto:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="nombre" v-model="comercio_producto" maxlength="20">
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
                    <label for="nombre">cantidad:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="number" name="nombre" v-model="cantidad" maxlength="20">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">valor:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="number" name="nombre" v-model="valor" maxlength="20">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">subtotal:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="number" name="nombre" v-model="subtotal" maxlength="20">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Comision:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="number" name="nombre" v-model="comision" maxlength="20">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Total:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="number" name="nombre" v-model="total" maxlength="20">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Estado:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="nombre" v-model="estado" maxlength="20">
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
                    <label for="nombre">Fecha de proceso:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="date" name="nombre" v-model="fecha_proceso" maxlength="20">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Fecha liquidación:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="date" name="nombre" v-model="fecha_liquidacion" maxlength="20">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Factura:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="nombre" v-model="factura" maxlength="20">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Tipo comisión :</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="nombre" v-model="nombre" maxlength="20">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">valor comision:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="number" name="nombre" v-model="nombre" maxlength="20">
                </div>
            </div>











            

                <br>
               <!--<button type="input" class="btn btn-info" name="guardar" id="guardar">Agregar Proveedor</button> --><!-- v-on:click="guardar" -->
            <button type="submit" class="btn btn-info" id="guardar">Guardar</button>
                <input type="hidden" v-model="estado" id="estado">
        </div>
        </form>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
                $("#estado").val(1);
        });
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

                   

                   // validaciones
                    validarCampos : function() {
                        // expresiones regulares para evaluar información

                    },

                    guardar : function(){
                      //this.espaciosBlanco();
                      //this.validarCampos();
                      if(this.errores.length == 0){
                          this.enviarFormulario();
                      }else {
                          var num = this.errores.length;
                          for(var i=0; i<num;i++) {
                              toastr.error(this.errores[i]);
                          }
                          this.errores = [];
                      }
                    },

                    enviarFormulario : function(){
                        var url = 'liquidacion/comercio/store';
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
                        if(error.status === 422)
                        {
                            // captura los errores en una variable
                            var errors = $.parseJSON(error.errorText);
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
                                    console.log(error);
                                    toastr.error('Error '+error+' al momento guardar el nuevo proveedor.', 'Error', {timeOut: 5000});
                                }
                            });
                        } else {
                            console.log(error.errorText);
                            toastr.error('Error: '+error.status, 'Error', {timeOut: 5000});
                        }
                        //toastr.error('Error al momento de crear el permiso.', 'Alerta', {timeOut: 8000});

                    });

                    },

                    espaciosBlanco : function() {
                        this.codigo= this.codigo.trim();
                        this.empresa = this.empresa.trim();
                        this.razon = this.razon.trim();
                        this.representante = this.representante.trim();
                        this.direccion = this.direccion.trim();
                        this.banco = this.banco.trim();
                        this.gerente = this.gerente.trim();
                        this.convencional = this.convencional.trim();
                        this.telefono_representante = this.telefono_representante.trim();
                        this.telefono_gerente = this.telefono_gerente.trim();
                        this.usuario = this.usuario.trim();
                        this.pass=this.usuario.trim();
                    },
                    
                    limpiar : function() {
                            this.ruc = '';
                             this.cuenta_bancaria ='';
                             this.convencional = '';
                            this.codigo= '';
                            this.empresa = '';
                            this.ruc = 0;
                            this.razon = '';
                            this.representante = '';
                            this.direccion = '';
                            this.banco = '';
                            this.cuenta_bancaria =0;
                            this.estado = '';
                            this.gerente = '';
                            this.convencional = 0;
                            this.telefono_representante=0;
                            this.telefono_gerente=0;
                            this.usuario='';
                            this.pass='';
                            this.errores = [];           
                    }

                }
            }
        );


    </script>
@endsection

