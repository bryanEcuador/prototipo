@extends('layouts.admin')
@section('nombre_pagina','transaccion banco')
@section('css')
@endsection
@section('titulo de la pagina','transaccion banco')
@section('subtitulo','')

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
                <br>
            <button type="button" class="btn btn-info" id="guardar">Guardar</button>
               
        </div>
        </form>
    </div>
@endsection
@section('js')


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
                        var url = 'transaccion/banco/store';
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
                        
                    },
                    
                    limpiar : function() {
                          
                    }

                }
            }
        );


    </script>
@endsection

