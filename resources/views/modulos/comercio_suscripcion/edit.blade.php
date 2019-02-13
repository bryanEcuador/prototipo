@extends('layouts.admin')
@section('nombre_pagina','Editar suscripción comercio')
@section('css')
@endsection
@section('titulo de la pagina','Editar suscripción comercio')
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
                        <label for="nombre">comercio:</label>
                    </div>
                    <div class="col-md-6 ">
                        <select class="form-control" v-model="comercio">
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>
                </div> 
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="nombre">piso local:</label>
                    </div>
                    <div class="col-md-6 ">
                                            <select class="form-control" v-model="piso_local">
                            <option>1</option>
                            <option>2</option>
                        </select>
                    
                    </div>
                </div> 

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="nombre">Fecha inicio subscripcion:</label>
                    </div>
                    <div class="col-md-6 ">
                    <input class="form-control" type="date" name="id" v-model="fecha_suscripcion" maxlength="20">
                    </div>
                </div> 

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="nombre">Años contratado:</label>
                    </div>
                    <div class="col-md-6 ">
                    <input class="form-control" type="number" name="id" v-model="años_contratado" maxlength="20">
                    </div>
                </div>
                
                                
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="nombre">Fecha fin suscripción :</label>
                    </div>
                    <div class="col-md-6 ">
                    <input class="form-control" type="date" name="id" v-model="fecha_fin_suscripcion" maxlength="20">
                    </div>
                </div> 

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="nombre">Dias alerta fin suscripcion:</label>
                    </div>
                    <div class="col-md-6 ">
                    <input class="form-control" type="date" name="id" v-model="alerta" maxlength="20">
                    </div>
                </div> 

                 <div class="form-group row">
                    <div class="col-md-2">
                        <label for="nombre">Activo:</label>
                    </div>
                    <div class="col-md-6 ">
                    <input class="form-control" type="text" name="id" v-model="activo" maxlength="20">
                    </div>
                </div> 

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="nombre">Tipo condición:</label>
                    </div>
                    <div class="col-md-6 ">
                    <input class="form-control" type="text" name="id" v-model="condicion" maxlength="20">
                    </div>
                </div> 

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="nombre">Valor condición:</label>
                    </div>
                    <div class="col-md-6 ">
                    <input class="form-control" type="number" name="id" v-model="valor_condicion" maxlength="20">
                    </div>
                </div> 



                <div class="col-md-6 ">
                    
                    <button class="btn btn-primary">
                        Editar
                    </button>
                </div>
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
                    comercio: '',
                    piso_local : '',
                    fecha_suscripcion : '',
                    años_contratado : '',
                   fecha_fin_suscripcion : '',
                   alerta: '',
                    activo : '',
                    condicion : '',
                    valor_condicion : '',
                   
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
                        var url = 'comercio/subscripcion/update';
                        axios.post(url, {
                           
                           /*  big_cs_idComercio = this.piso_local;
                            big_cs_idComercioPisoLocal = this.piso_local;
                            fch_cs_fechaInicioSuscripcion = this.fecha_suscripcion;
                            int_cs_aniosContratados = this.años_contratado;
                            fch_cs_fechaFinSuscripcion = this.fecha_suscripcion;
                            int_cs_diasAlertasFinSuscripcion = this.alerta;
                            bit_cs_activo = this.activo,
                            var_cs_tipoComision = this.condicion;
                            mon_cs_vañprComision = this.valor_condicion; */


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

