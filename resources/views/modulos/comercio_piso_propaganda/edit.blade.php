@extends('layouts.admin')
@section('nombre_pagina','Edición de comercio piso propoganda')
@section('css')
@endsection
@section('titulo de la pagina','Edición de comercio piso propoganda')
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
                    <label for="nombre">piso propaganda:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="nombre" v-model="nombre" maxlength="20">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">comercio:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="razon" v-model="razon" maxlength="20">
                </div>
            </div>

            
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">piso:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="ruc" v-model="ruc" maxlength="20">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">propaganda:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="representante" v-model="representante" maxlength="20">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">imagen:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="file" name="representante_ci" v-model="representante_ci" maxlength="20">
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">activo:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="direccion" v-model="direccion" maxlength="20">
                </div>
            </div>
            
                <br>
               <!--<button type="input" class="btn btn-info" name="guardar" id="guardar">Agregar Proveedor</button> --><!-- v-on:click="guardar" -->
            <button type="submit" class="btn btn-info" id="guardar">Actualizar</button>
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
                    comercio: '',
                    piso : '',
                    propaganda : '',
                    imagen : '',
                    activo : '',
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
                        var url = 'comercio/piso/propaganda/update';
                        axios.post(url, {
                           big_pp_idComercioPisoPropaganda : this.id, 
                           big_pp_idComercio : this.comercio,
                            var_pp_propaganda : this.piso ,
                           var_pp-imagen : this.propaganda ,
                            var_pp_imagen : this.imagen ,
                            var bit_pp_activo : this.activo ,

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
                          
                            this.errores = [];           
                    }

                }
            }
        );


    </script>
@endsection

