@extends('layouts.admin')
@section('nombre_pagina','Creacion de comercio')
@section('css')
@endsection
@section('titulo de la pagina','Creacion de comercio')
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
                    <label for="nombre">Nombre:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="nombre" v-model="nombre" maxlength="20">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Razon social:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="razon" v-model="razon" maxlength="20">
                </div>
            </div>

            
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Ruc:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="ruc" v-model="ruc" maxlength="20">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Representante legal:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="representante" v-model="representante" maxlength="20">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Identificacion Representante legal:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="representante_ci" v-model="representante_ci" maxlength="20">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre"> Fecha de creación:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="date" name="fecha" v-model="fecha" maxlength="20">
                </div>
            </div>

            
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Direccion:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="direccion" v-model="direccion" maxlength="20">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Ciudad:</label>
                </div>
                <div class="col-md-6 ">
                    <select class="form-control"  v-model="ciudad" >
                        <option>guayaquil</option>
                        <option>quito</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Sector:</label>
                </div>
                <div class="col-md-6 ">
                    <select class="form-control"  v-model="sector" >
                        <option>sur</option>
                        <option>norte</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Nombre del gerente:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="nombre_gerente" v-model="nombre_gerente" maxlength="20">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Identificacion del gerente:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="gerente_ci" v-model="gerente_ci" maxlength="20">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Tipo Comercio:</label>
                </div>
                <div class="col-md-6 ">
                   <select class="form-control"  v-model="tipo_comercio" >
                        <option>ejemplo1</option>
                        <option>ejmeplo 2</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Email:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="email" v-model="email" maxlength="20">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Telefono:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="telefono" v-model="telefono" maxlength="20">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Mio:</label>
                </div>
                <div class="col-md-6 ">
                    <select class="form-control"  v-model="mio" >
                        <option>si</option>
                        <option>no</option>
                    </select>
                </div>
            </div>

                <br>
               <!--<button type="input" class="btn btn-info" name="guardar" id="guardar">Agregar Proveedor</button> --><!-- v-on:click="guardar" -->
            <button type="buttton" class="btn btn-info" id="guardar" @click="guardar">Agregar Comercio</button>
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
                    nombre: '',
                    ruc : '',
                    razon : '',
                    representante : '',
                    representante_ci : '',
                  
                   fecha: '',
                    direccion : '',
                    ciudad : '',
                    sector : '',
                    nombre_gerente : '',
                    gerente_ci : '',
                    tipo_comercio : '',
                    email:'',
                    telefono: '',
                    mio: '',
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
                        
                        if(this.nombre !== "") {
                           
                        } else {
                            this.errores.push("el nombre no puede estar en blanco");
                        }
                         if(this.ruc !== "") {
                           
                        } else {
                            this.errores.push("el ruc no puede estar en blanco");
                        }
                          if(this.razon !== "") {
                           
                        } else {
                            this.errores.push("la razon social no puede estar en blanco");
                        }

                           if(this.representante !== "") {
                           
                        } else {
                            this.errores.push("el representante no puede estar en blanco");
                        }

                          if(this.representante_ci !== "") {
                           
                        } else {
                            this.errores.push("la cedula del representante no puede estar en blanco");
                        }
                        
                          if(this.fecha !== "") {
                           
                        } else {
                            this.errores.push("la fecha no puede estar en blanco");
                        }

                          if(this.dirreccion !== "") {
                           
                        } else {
                            this.errores.push("la direccion no puede estar en blanco");
                        }

                          if(this.ciudad !== "") {
                           
                        } else {
                            this.errores.push("la ciudad no puede estar en blanco");
                        }

                          if(this.sector !== "") {
                           
                        } else {
                            this.errores.push("el sector no puede estar en blanco");
                        }

                          if(this.nombre_gerente !== "") {
                           
                        } else {
                            this.errores.push("el nombre del gerente no puede estar en blanco");
                        }

                          if(this.gerente_ci !== "") {
                           
                        } else {
                            this.errores.push("la cedula del gerente no puede estar en blanco");
                        }

                          if(this.tipo_comercio !== "") {
                           
                        } else {
                            this.errores.push("el tipo de comercio no puede estar en blanco");
                        }

                          if(this.email !== "") {
                           
                        } else {
                            this.errores.push("el emmail la identificacion no puede estar en blanco");
                        }

                          if(this.telefono !== "") {
                           
                        } else {
                            this.errores.push("el telefono no puede estar en blanco");
                        }

                          if(this.mio !== "") {
                           
                        } else {
                            this.errores.push("mio no puede estar en blanco");
                        }











                       
                    },

                    guardar : function(){
                     // this.espaciosBlanco();
                     // this.validarCampos();
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
                            var_co_nombreComercio : this.nombre,
                            ruc: this.ruc,
                            var_co_razonSocial : this.razon,
                            var_co_representanteLegal : this.representante,
                            var_co_representante_identificacionRepresentanteLocal : this.representante_ci,    
                            var_co_fechaCreacion : this.fecha,
                            var_co_direccion: this.direccion,
                            var_co_ciudad: this.ciudad,
                            var_co_sector: this.sector,
                            var_co_nombreGerente: this.nombre_gerente,
                            var_co_identificacionGerente: this.gerente_ci,
                            var_co_tipoComercio : this.tipo_comercio,
                            var_co_email : this.email
                            var_co_telefono:this.telefono;
                            var_co_esMio:this.mio;

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
                        this.nombre= this.nombre.trim();
                        this.ruc = this.ruc.trim()  ;
                        this.razon = this.razon.trim() ;
                        this.representante = this.representante.trim() ;
                        this.representante_ci = this.representante_ci.trim();
                        this.identificacion = this.identificacion.trim() ;
                        this.fecha= this.fecha.trim();
                        this.direccion =this.direccion.trim()  ;
                        this.ciudad = this.ciudad.trim();
                        this.sector = this.sector.trim();
                        this.nombre_gerente = this.nombre_gerente.trim() ;
                        this.gerente_ci =  this.gerente_ci.trim();
                        this.tipo_comercio = this.tipo_comercio.trim();
                        this.email: this.email.trim();
                        this.telefono =  this.telefono.trim();
                        this.mio =  this.mio.trim();
                    
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

