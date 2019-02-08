@extends('layouts.admin')
@section('nombre_pagina','Creacion de cliente')
@section('css')
@endsection
@section('titulo de la pagina','Creacion de cliente')
@section('subtitulo','Formulario de cliente')

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

    <div class="col-md-12" id="creacionClientes">
        <form action="{{route('administrador.proveedor.store')}}" method="post" id="administracion">
            @csrf
        <div class="tile">
           
            
           <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Tipo identificacion:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text"  v-model="tipo_identificacion" maxlength="20">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">identificacion:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text"  v-model="identificacion" maxlength="20">
                </div>
            </div>

            
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Nombre:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="ruc" v-model="nombre" maxlength="20">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Apellidos:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text"  v-model="apellidos" maxlength="20">
                </div>
            </div>

            

            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Ciudad:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="ciudad" v-model="ciudad" maxlength="20">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Sector:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="sector" v-model="sector" maxlength="20">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Fecha:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="date" name="fecha" v-model="fecha" maxlength="20">
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
            

                <br>
               <!--<button type="input" class="btn btn-info" name="guardar" id="guardar">Agregar Proveedor</button> --><!-- v-on:click="guardar" -->
            <button type="submit" class="btn btn-info" id="guardar" @click="guardar">Agregar Cliente</button>
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
                el:"#creacionClientes",
                data: {
                   tipo_identificacion = '',
                   identificacion = '',
                   nombre = '',
                   apellidos = '',
                   ciudad = '',
                   sector = '',
                   fecha = '',
                   telefono = '',
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

                   validarCampos : function() {
                
                       
                        if(this.tipo_identificacion !== "") {
                            // mas validaciones
                        } else {
                            this.errores.push("tipo identificacion no puede estar en blanco");
                        }

                          if(this.identificacion !== "") {
                            // mas validaciones
                        } else {
                            this.errores.push("identificacion no puede estar en blanco");
                        }

                          if(this.nombre !== "") {
                            // mas validaciones
                        } else {
                            this.errores.push("nombre no puede estar en blanco");
                        }

                          if(this.apellidos !== "") {
                            // mas validaciones
                        } else {
                            this.errores.push("apellidos no puede estar en blanco");
                        }

                          if(this.ciudad !== "") {
                            // mas validaciones
                        } else {
                            this.errores.push("ciudad no puede estar en blanco");
                        }

                          if(this.sector !== "") {
                            // mas validaciones
                        } else {
                            this.errores.push("sector no puede estar en blanco");
                        }

                          if(this.fecha !== "") {
                            // mas validaciones
                        } else {
                            this.errores.push("fecha no puede estar en blanco");
                        }
                          if(this.telefono !== "") {
                            // mas validaciones
                        } else {
                            this.errores.push("telefono no puede estar en blanco");
                        }
                       
                        
                    },

                 
                    guardar : function(){
                      this.espaciosBlanco();
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
                        var url = 'cliente/store';
                        axios.post(url, {
                            var_cl_tipoIdentificacion= this.tipo_identificacion,
                            thisvar_cl_identificacion= this.tipo_identificacion,
                            var_cl_nombres =  this.nombre,
                            var_cl_apellidos = this.apellidos,
                            var_cl_ciudad = this.ciudad,
                            var_cl_sector = this.sector,
                            var_cl_fechaNacimiento =  this.fecha,
                            var_cl_telefono = this.telefono,

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
                            this.tipo_identificacion = this.tipo_identificacion.trim(),
                            this.identificacion = this.tipo_identificacion.trim(),
                            this.nombre =  this.nombre.trim(),
                            this.apellidos = this.apellidos.trim(),
                            this.ciudad = this.ciudad.trim(),
                            this.sector = this.sector.trim(),
                            this.fecha =  this.fecha.trim(),
                            this.telefono = this.telefono.trim(),
                    },
                    
                    limpiar : function() {
                            this.tipo_identificacion = '',
                            this.identificacion = '',
                            this.nombre = '',
                            this.apellidos = '',
                            this.ciudad = '',
                            this.sector = '',
                            this.fecha = '',
                            this.telefono = '',
                             
                    }

                }
            }
        );


    </script>
@endsection

