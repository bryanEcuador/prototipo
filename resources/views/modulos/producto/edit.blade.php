@extends('layouts.admin')
@section('nombre_pagina','Editar Producto')
@section('css')
@endsection
@section('titulo de la pagina','Edición producto')
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
        <form action="{{route('administrador.proveedor.update')}}" method="post" id="administracion">
            @csrf
            <div class="tile">
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="nombre">comercio:</label>
                    </div>
                    <div class="col-md-6 ">
                        <select class="form-control" v-model="comercio">
                            <option> 1</option>
                            <option> 2</option>
                        </select>
                    </div>
                </div> 

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="nombre">nombre del producto:</label>
                    </div>
                    <div class="col-md-6 ">
                        <input v-model="producto" class="form-control">
                    </div>
                </div> 

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="nombre">tipo producto:</label>
                    </div>
                    <div class="col-md-6 ">
                        <select class="form-control" v-model="tipo_producto">
                            <option> 1</option>
                            <option> 2</option>
                        </select>
                    </div>
                </div> 

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="nombre">valor:</label>
                    </div>
                    <div class="col-md-6 ">
                        <input v-model="valor" type="number" class="form-control">
                    </div>
                </div> 

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="nombre">promocion:</label>
                    </div>
                    <div class="col-md-6 ">
                        <select class="form-control" v-model="promocion">
                            <option> si</option>
                            <option> no</option>
                        </select>
                    </div>
                </div> 

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="nombre">disponible:</label>
                    </div>
                    <div class="col-md-6 ">
                        <select class="form-control" v-model="disponible">
                            <option> si</option>
                            <option> no</option>
                        </select>
                    </div>
                </div> 

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="nombre">es mio:</label>
                    </div>
                    <div class="col-md-6 ">
                        <select class="form-control" v-model="mio">
                            <option> si</option>
                            <option> no</option>
                        </select>
                    </div>
                </div>
                <label>Productos</label>
                <hr>
                <div class="form-group row">
                    <div class="card" style="width:30%">
                        <img class="card-img-top" name="foto1" src="\storage\productos\92PuZUewSXGQCXn7HUcPMwFc6b9AZQGgIkbRVMje.jpeg" alt="Card image">
                        <div class="card-body">
                            <input type="file" class="form-control">
                        </div>
                    </div>
                    <div class="card" style="width:30%">
                        <img class="card-img-top" name="foto2" src="\storage\productos\92PuZUewSXGQCXn7HUcPMwFc6b9AZQGgIkbRVMje.jpeg" alt="Card image">
                        <div class="card-body">
                            <input type="file" class="form-control">
                        </div>
                    </div>
                    <div class="card" style="width:30%">
                        <img class="card-img-top" name="foto3" src="\storage\productos\92PuZUewSXGQCXn7HUcPMwFc6b9AZQGgIkbRVMje.jpeg" alt="Card image">
                        <div class="card-body">
                            <input type="file" class="form-control">
                        </div>
                    </div>
                    <div class="card" style="width:30%">
                        <img class="card-img-top" name="foto4" src="\storage\productos\92PuZUewSXGQCXn7HUcPMwFc6b9AZQGgIkbRVMje.jpeg" alt="Card image">
                        <div class="card-body">
                            <input type="file" class="form-control">
                        </div>
                    </div>
                    <div class="card" style="width:30%">
                        <img class="card-img-top" name="foto5" src="\storage\productos\92PuZUewSXGQCXn7HUcPMwFc6b9AZQGgIkbRVMje.jpeg" alt="Card image">
                        <div class="card-body">
                            <input type="file" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="col-md-6 ">
                    <input class="btn btn-primary" type="submit" name="id" value ="Actualizar">
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
                  comercio :'',
                   producto:'',
                   tipo_producto:'',
                   valor:'',
                    promocion: '',
                    disponible: '',
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
                        var url = 'comercio/update';
                        axios.post(url, {
                           big_cp_idComercioProducto : this.id, 
                           big_cp_idComercio : this.comercio ,
                           var_cp_nombreProducto : this.producto,
                           var_cp_tipoProducto : this.tipo_producto,
                            var_cp_valor : this.valor,
                           bit_cp_esPromocion : this.promocion,
                           bit_cp_disponible: this.disponible,
                           bit_cp_esMio : this.mio,
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

