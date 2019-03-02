@extends('layouts.admin')
@section('nombre_pagina',' Catalogo detalle')
@section('css')
@endsection
@section('titulo de la pagina','Creacion de catalogo detalle')
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
                    <label for="nombre">Cabecera:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="mio" v-model="cabecera" maxlength="20">
                </div>
            </div>

             <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Codigo miembro:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="mio" v-model="codigo_miembro" maxlength="20">
                </div>
            </div>

             <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Descripcion:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="text" name="mio" v-model="descripcion" maxlength="20">
                </div>
            </div>
             <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">valor 1:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="number" name="valor1" v-model="mio" maxlength="20">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">valor 2:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="number" name="mio" v-model="valor2" maxlength="20">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">valor 3:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="number" name="mio" v-model="valor3" maxlength="20">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">valor 4:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="number" name="mio" v-model="valor4" maxlength="20">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">valor 5:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="number" name="mio" v-model="valor5" maxlength="20">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">valor 6:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="number" name="mio" v-model="valor6" maxlength="20">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">valor 7:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="number" name="mio" v-model="valor7" maxlength="20">
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

                   descripcion : '',
                   codigo_miembro : '',
                   cabecera : '', 
                   valor1 : '',
                   valor2 : '',
                   valor3 : '',
                   valor4 : '',
                   valor5 : '',
                   valor6 : '',
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
                        var url = 'catalogo/detalle/store';
                        axios.post(url, {
                           var_cd_descripcion    : this.descripcion ,
                           var_cd_codgio_miembro    : this.codigo_miembro ,
                           var_cd_cabecera    : this.cabecera , 
                           var_cd_valor1    : this.valor1 ,.
                           var_cd_valor2    : this.valor2 ,
                           var_cd_valor3    : this.valor3 ,
                           var_cd_valor4    : this.valor4 ,
                           var_cd_valor5    : this.valor5 ,
                           var_cd_valor6    : this.valor6 ,

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

