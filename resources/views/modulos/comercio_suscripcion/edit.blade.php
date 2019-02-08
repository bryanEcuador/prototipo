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
                    <input class="form-control" type="text" name="id" v-model="comercio" maxlength="20">
                    </div>
                </div> 
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="nombre">piso local:</label>
                    </div>
                    <div class="col-md-6 ">
                    <input class="form-control" type="text" name="id" v-model="piso_local" maxlength="20">
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
                    <input class="btn btn-primary" type="button" name="id" value ="guardar suscripcion" v-model="id" maxlength="20">
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

                    validarRuc : function() {
                        var er_numeros = /^[0-9,]+$/; // solo para los numeros
                        if(this.ruc !== 0) {
                            // mas validaciones
                            if(er_numeros .test(this.ruc) == false)
                            {
                                this.errores.push("El campo Ruc solo puede obtener numeros");
                            }else {
                                var dto = this.ruc.length;
                                var valor;
                                var acu=0;
                                for (var i=0; i<dto; i++){
                                    valor = this.ruc.substring(i,i+1);
                                    if(valor==0||valor==1||valor==2||valor==3||valor==4||valor==5||valor==6||valor==7||valor==8||valor==9){
                                        acu = acu+1;
                                    }
                                }
                                if(acu==dto){
                                    // modifica aquí para agregar el 002,003
                                    while(this.ruc.substring(10,13)!=001){
                                        alert('Los tres últimos dígitos no tienen el código del RUC 001.');
                                        return;
                                    }
                                    while(this.ruc.substring(0,2)>24){
                                        alert('Los dos primeros dígitos no pueden ser mayores a 24.');
                                        return;
                                    }
                                    //this.errores.push('El RUC está escrito correctamente');
                                    //alert('Se procederá a analizar el respectivo RUC.');
                                    var porcion1 = this.ruc.substring(2,3);
                                    if(porcion1<6){
                                       // alert('El tercer dígito es menor a 6, por lo \ntanto el usuario es una persona natural.\n');
                                    } else{
                                        if(porcion1==6){
                                            alert('El tercer dígito es igual a 6, por lo \ntanto el usuario es una entidad pública.\n');
                                        }
                                        else{
                                            if(porcion1==9){
                                                alert('El tercer dígito es igual a 9, por lo \ntanto el usuario es una sociedad privada.\n');
                                            }
                                        }
                                    }
                                } else{
                                    this.errores.push("Ruc invalido");
                                }
                            }
                        } else {
                            this.errores.push("Ingrese la información sobre el ruc");
                        }
                    },

                   // validaciones
                    validarCampos : function() {
                        // expresiones regulares para evaluar información
                      
                        if(this.usuario !== "") {
                            // mas validaciones
                        } else {
                            this.errores.push("Debe ingresar el nombre del usuario");
                        }

                    },

                    guardar : function(){
                      this.espaciosBlanco();
                      this.validarCampos();
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
                        var url = 'comercio/store';
                        axios.post(url, {
                           
                            big_cs_idComercio = this.piso_local;
                            big_cs_idComercioPisoLocal = this.piso_local;
                            fch_cs_fechaInicioSuscripcion = this.fecha_suscripcion;
                            int_cs_aniosContratados = this.años_contratado;
                            fch_cs_fechaFinSuscripcion = this.fecha_suscripcion;
                            int_cs_diasAlertasFinSuscripcion = this.alerta;
                            bit_cs_activo = this.activo,
                            var_cs_tipoComision = this.condicion;
                            mon_cs_vañprComision = this.valor_condicion;


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

