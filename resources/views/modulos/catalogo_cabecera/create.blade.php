@extends('layouts.admin')
@section('nombre_pagina','Catalogo cabecera')
@section('css')
@endsection
@section('titulo de la pagina','Catalogo cabecera')
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
                    <label for="nombre">Nombre:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="nombre" v-model="nombre" maxlength="20">
                </div>
            </div>

              <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Descripcion :</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="nombre" v-model="descripcion" maxlength="20">
                </div>
            </div>

              <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">etiqueta 1:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="nombre" v-model="etiqueta1" maxlength="20">
                </div>
            </div>
             <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">etiqueta 2:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="nombre" v-model="etiqueta2" maxlength="20">
                </div>
            </div>
             <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">etiqueta 3:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="nombre" v-model="etiqueta3" maxlength="20">
                </div>
            </div>
             <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">etiqueta 4:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="nombre" v-model="etiqueta4" maxlength="20">
                </div>
            </div>
             <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">etiqueta 5:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="nombre" v-model="etiqueta5" maxlength="20">
                </div>
            </div>
             <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">etiqueta 6:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="nombre" v-model="etiqueta6" maxlength="20">
                </div>
            </div>
             <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">etiqueta 7:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="nombre" v-model="etiqueta7" maxlength="20">
                </div>
            </div>

           
                <br>
               <!--<button type="input" class="btn btn-info" name="guardar" id="guardar">Agregar Proveedor</button> --><!-- v-on:click="guardar" -->
            <button type="submit" class="btn btn-info" id="guardar">Agregar</button>
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
                    nombre : '',
                    descripcion : '',
                    etiqueta1 : '',
                    etiqueta2 : '',
                    etiqueta3 : '',
                    etiqueta2 : '',
                    etiqueta4 : '',
                    etiqueta5 : '',
                    etiqueta6 : '',
                    etiqueta7 : '',
                   

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
                        var url = 'catalogo/cabecera/store';
                        axios.post(url, {
                            
                       var_cc_nombreCatalogo     : this.nombre ,
                       var_cc_descripcionCatalogo    : this.descripcion ,
                       var_cc_etiqueta1     :this.etiqueta1 ,
                       var_cc_etiqueta2     :this.etiqueta2 ,
                        var_cc_etiqueta3   : this.etiqueta3 ,
                        var_cc_etiqueta4   : this.etiqueta4 ,
                        var_cc_etiqueta5   : this.etiqueta5 ,
                        var_cc_etiqueta6   : this.etiqueta6 ,
                        var_cc_etiqueta7   : this.etiqueta7 ,
                   

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

