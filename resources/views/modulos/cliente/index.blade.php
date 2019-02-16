@extends('layouts.admin')
@section('nombre_pagina','Cliente')
@section('css')
<link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('titulo de la pagina',' Cliente')
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

    <div class="col-md-12" id="cliente">
        
        <div class="tile">

        <button class="btn btn-primary btn-lg btn-block mb-4" @click="crear"> Agregar cliente</button>
           
        <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>tipo identificacion</th>
                    <th>identificacion</th>
                    <th>nombres</th>
                    <th>apellidos</th>
                    <th>ciudad</th>
                   
                    <th>telefono</th>
                    <th>email</th>
                    <th>Accioes</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                     <td>tipo identificacion</td>
                    <td>identificacion</td>
                    <td>nombres</td>
                    <td>apellidos</td>
                    <td>ciudad</td>
                   
                    <td>telefono</td>
                    <td>email</td>
                    <td>
                        <button class="btn btn-primary"  @click="editar" ><i class="fa fa-pencil-square-o 2x-fa" aria-hidden="true"></i></button>
                        <button class="btn btn-info" @click="ver"><i class="fa fa-eye" aria-hidden="true"></i></button>
                        <button class="btn btn-danger"  @click="eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    </td>
                  </tr>

                </tbody>
              </table>
            

             
        </div>

        {{-- editar  --}}
         <div id="editarCliente" class="modal fade" role="dialog" >
            
            <div class="modal-dialog modal-lg">
                <div class="col-lg-12">
                    <div class="bs-component">
                        <div class="modal" style="position: relative; top: auto; right: auto; left: auto; bottom: auto; z-index: 1; display: block;">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edición de clientes</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                       <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <label for="nombre">Tipo identificacion:</label>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                                <select class="form-control" v-model="e_tipo_identificacion">
                                                                    <option>a</option>
                                                                    <option>b</option>
                                                                </select>
                                                            
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <label for="nombre">identificacion:</label>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                            <input class="form-control" type="text"  v-model="e_identificacion">
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <label for="nombre">Nombre:</label>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                            <input class="form-control" type="text" v-model="e_nombre">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <label for="nombre">Apellidos:</label>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                            <input class="form-control" type="text"  v-model="e_apellidos" >
                                                            </div>
                                                        </div>

                                                        

                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <label for="nombre">Ciudad:</label>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                                
                                                                <select class="form-control" v-model="e_ciudad">
                                                                    <option>a</option>
                                                                    <option>b</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <label for="nombre">Sector:</label>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                                <select class="form-control" v-model="e_sector">
                                                                    <option>a</option>
                                                                    <option>b</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <label for="nombre">Fecha:</label>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                            <input class="form-control" type="date"  v-model="e_fecha" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <label for="nombre">Telefono:</label>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                            <input class="form-control" type="text"  v-model="e_telefono">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <label for="nombre">Email:</label>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                            <input class="form-control" type="text"  v-model="e_email">
                                                            </div>
                                                        </div>
                                                             
                                       
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" id="Actualizar" type="button" v-on:click="guardar">Editar</button>
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>

    {{-- ver  --}}
         <div id="verCliente" class="modal fade" role="dialog" >
            
            <div class="modal-dialog modal-lg">
                <div class="col-lg-12">
                    <div class="bs-component">
                        <div class="modal" style="position: relative; top: auto; right: auto; left: auto; bottom: auto; z-index: 1; display: block;">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Ver clientes</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label for="nombre">Tipo identificacion:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                   <input class="form-control" type="text"  v-model="v_tipo_identificacion">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label for="nombre">identificacion:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                <input class="form-control" type="text"  v-model="v_identificacion">
                                                </div>
                                            </div>

                                            
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label for="nombre">Nombre:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                <input class="form-control" type="text" v-model="v_nombre">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label for="nombre">Apellidos:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                <input class="form-control" type="text"  v-model="v_apellidos" >
                                                </div>
                                            </div>

                                            

                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label for="nombre">Ciudad:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                    <input class="form-control" type="text"  v-model="v_ciudad" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label for="nombre">Sector:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                    <input class="form-control" type="text"  v-model="v_sector" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label for="nombre">Fecha:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                <input class="form-control" type="date"  v-model="v_fecha" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label for="nombre">Telefono:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                <input class="form-control" type="text"  v-model="v_telefono">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label for="nombre">Email:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                <input class="form-control" type="text"  v-model="v_email">
                                                </div>
                                            </div>
                                       
                                    </div>
                                   
                                </div>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>

    {{-- crear  --}}
         <div id="crearCliente" class="modal fade" role="dialog" >
            
            <div class="modal-dialog modal-lg">
                <div class="col-lg-12">
                    <div class="bs-component">
                        <div class="modal" style="position: relative; top: auto; right: auto; left: auto; bottom: auto; z-index: 1; display: block;">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Creación de clientes</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <label for="nombre">Tipo identificacion:</label>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                                <select class="form-control" v-model="c_tipo_identificacion">
                                                                    <option>a</option>
                                                                    <option>b</option>
                                                                </select>
                                                            
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <label for="nombre">identificacion:</label>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                            <input class="form-control" type="text"  v-model="c_identificacion">
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <label for="nombre">Nombre:</label>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                            <input class="form-control" type="text" v-model="c_nombre">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <label for="nombre">Apellidos:</label>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                            <input class="form-control" type="text"  v-model="c_apellidos" >
                                                            </div>
                                                        </div>

                                                        

                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <label for="nombre">Ciudad:</label>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                                <select class="form-control" v-model="c_ciudad">
                                                                    <option>a</option>
                                                                    <option>b</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <label for="nombre">Sector:</label>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                                <select class="form-control" v-model="c_sector">
                                                                    <option>a</option>
                                                                    <option>b</option>
                                                                </select>
                                                                
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <label for="nombre">Fecha:</label>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                            <input class="form-control" type="date"  v-model="c_fecha" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <label for="nombre">Telefono:</label>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                            <input class="form-control" type="text"  v-model="c_telefono">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <label for="nombre">Email:</label>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                            <input class="form-control" type="text"  v-model="c_email">
                                                            </div>
                                                        </div>
                                                
                                       
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" id="guardar" type="button" v-on:click="actualizar">Actualizar</button>
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        {{-- eliminar  --}}
         <div id="eliminarCliente" class="modal fade" role="dialog" >
            
            <div class="modal-dialog modal-lg">
                <div class="col-lg-12">
                    <div class="bs-component">
                        <div class="modal" style="position: relative; top: auto; right: auto; left: auto; bottom: auto; z-index: 1; display: block;">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"></h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                   <div class="modal-body">
                                       <h2>¿ ESTA SEGURO QUE DESEA ELIMINAR AL CLIENTE ?</h2>
                                        <button class="btn btn-primary" id="guardar" type="button" v-on:click="actualizar">Eliminar</button>
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">cancelar</button>
                                   </div>
                                </div>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
                $("#estado").val(1);
        });
    </script>
    
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>


    <script>
        var app = new Vue ({
                el:"#cliente",
                data: {
                    c_tipo_identificacion : '',
                    c_identificacion : '',
                    c_nombre : '' ,
                    c_apellidos : '' ,
                    c_ciudad : '',
                    c_sector : '' ,
                    c_fecha : '' ,
                    c_telefono : '' ,
                    c_email : '' ,

                    e_id : '',
                    e_tipo_identificacion : '',
                    e_identificacion : '',
                    e_nombre : '' ,
                    e_apellidos : '' ,
                    e_ciudad : '',
                    e_sector : '' ,
                    e_fecha : '' ,
                    e_telefono : '' ,
                    e_email : '' ,

                    v_id : '',
                    v_tipo_identificacion : '',
                    v_identificacion : '',
                    v_nombre : '' ,
                    v_apellidos : '' ,
                    v_ciudad : '',
                    v_sector : '' ,
                    v_fecha : '' ,
                    v_telefono : '' ,
                    v_email : '' ,

                    id : '',

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

                   eliminar : function () {
                       $("#eliminarCliente").modal('show');
                   },

                  
                   ver : function () {
                       $("#verCliente").modal('show');
                   },

                   crear : function () {
                       $("#crearCliente").modal('show');
                   },
                   
                   
                   editar : function () {
                       $("#editarCliente").modal('show');
                   },

                   suprimir : function() {

                   },
                   
                   // validaciones
                  
                    guardar : function(){
                      //this.espaciosBlanco();
                      //this.validarCampos();

                      if(this.errores.length == 0){
                          
                            var url = 'cliente/store';
                            axios.post(url, {
                                
                            var_cl_tipoIdentificacion   : this.c_tipo_identificacion,
                            var_cl_identificacion  : this.c_identificacion, 
                            var_cl_nombres : this.c_nombre , 
                            var_cl_apellidos : this.c_apellidos , 
                            var_cl_ciudad   : this.c_ciudad,
                            var_cl_sector  : this.c_sector ,
                            var_cl_fechaNacimiento  : this.c_fecha ,
                            var_cl_telefono : this.c_fecha ,
                            var_cl_email : this.c_email ,

                            }).then(response => {
                            
                            //this.limpiar();
                            
                            }).catch(error => {
                                    console.log(error);
                            });



                      }else {
                          var num = this.errores.length;
                          for(var i=0; i<num;i++) {
                              toastr.error(this.errores[i]);
                          }
                          this.errores = [];
                      }
                    },

                    actualizar : function() {
                         //this.espaciosBlanco();
                      //this.validarCampos();

                      if(this.errores.length == 0){
                          
                           var url = 'cliente/update';
                            axios.post(url, {
                                
                            var_cl_tipoIdentificacion   : this.e__tipo_identificacion,
                            var_cl_identificacion  : this.e__identificacion, 
                            var_cl_nombres : this.e__nombre , 
                            var_cl_apellidos : this.e__apellidos , 
                            var_cl_ciudad   : this.e__ciudad,
                            var_cl_sector  : this.e__sector ,
                            var_cl_fechaNacimiento  : this.e__fecha ,
                            var_cl_telefono : this.e__fecha ,
                            var_cl_email : this.e__email ,

                            }).then(response => {
                            
                            //this.limpiar();
                            
                            }).catch(error => {
                                    console.log(error);
                            });



                      }else {
                          var num = this.errores.length;
                          for(var i=0; i<num;i++) {
                              toastr.error(this.errores[i]);
                          }
                          this.errores = [];
                      }
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







