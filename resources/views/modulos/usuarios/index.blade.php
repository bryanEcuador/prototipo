@extends('layouts.admin')
@section('nombre_pagina','usuarios')
@section('css')
<link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('titulo de la pagina',' usuarios')
@section('subtitulo','')

@section('contenido')


    <div class="col-md-12" id="creacionProveedores">
        
        <div class="tile">
            <button class="btn btn-primary btn-lg btn-block mb-4" @click="crear"> Agregar feriado</button>


            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>usuario</th>
                    <th>sistema</th>
                    <th>login</th>
                    <th>password</th>
                    <th>tipo usuario</th>
                   
                   
     
                    <th>Accioes</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>usuario</td>
                    <td>sistema</td>
                    <td>login</td>
                    <td>password</td>
                    <td>tipo usuario</td>
                   
                    
               
                    <td>
                        <button class="btn btn-primary"  @click="editar" ><i class="fa fa-pencil-square-o 2x-fa" aria-hidden="true"></i></button>
                        <button class="btn btn-danger"  @click="eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    </td>
                  </tr>

                </tbody>
              </table>
          
            

             
        </div>
       
    </div>

           {{-- crear  --}}
         <div id="crear" class="modal fade" role="dialog" >
            
            <div class="modal-dialog modal-lg">
                <div class="col-lg-12">
                    <div class="bs-component">
                        <div class="modal" style="position: relative; top: auto; right: auto; left: auto; bottom: auto; z-index: 1; display: block;">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Creación de usuario</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                       
                                                                             <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">usuario:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                   <input type="text" v-model="e_usuario">
                                                </div>
                                        </div> 

                                        <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">sistema:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                   <input type="text" v-model="e_sistema">
                                                </div>
                                        </div> 

                                        <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">login:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                   <input type="text" v-model="e_login">
                                                </div>
                                        </div> 

                                        <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">password:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                   <input type="text" v-model="e_password">
                                                </div>
                                        </div> 
                                         <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">tipo usuario:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                   <input type="text" v-model="e_tipo_usuario">
                                                </div>
                                        </div>  

                                           

               
                                       
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" id="Actualizar" type="button" v-on:click="guardar">Guardar</button>
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

        {{-- editar --}}
         <div id="editar" class="modal fade" role="dialog" >
            
            <div class="modal-dialog modal-lg">
                <div class="col-lg-12">
                    <div class="bs-component">
                        <div class="modal" style="position: relative; top: auto; right: auto; left: auto; bottom: auto; z-index: 1; display: block;">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edición de usuario</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                               
                                         <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">usuario:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                   <input type="text" v-model="e_usuario">
                                                </div>
                                        </div> 

                                        <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">sistema:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                   <input type="text" v-model="e_sistema">
                                                </div>
                                        </div> 

                                        <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">login:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                   <input type="text" v-model="e_login">
                                                </div>
                                        </div> 

                                        <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">password:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                   <input type="text" v-model="e_password">
                                                </div>
                                        </div> 
                                         <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">tipo usuario:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                   <input type="text" v-model="e_tipo_usuario">
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
         <div id="eliminar" class="modal fade" role="dialog" >
            
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
                                       <h1>¿ ESTA SEGURO QUE DESEA ELIMINAR ESTE FERIADO   ?</h1>
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
@endsection
@section('js')
   
    
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>


    <script>
        var app = new Vue ({
                el:"#creacionProveedores",
                data: {
               
               usuario : '',
               sistema : '',
               login : '',
               password:'',
               tipo_usuario : '',

               e_usuario : '',
               e_sistema : '',
               e_login : '',
               e_password:'',
               e_tipo_usuario : '',



                   
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
                       $("#eliminar").modal('show');
                   },

                   crear : function () {
                       $("#crear").modal('show');
                   },
                   
                   
                   editar : function () {
                       $("#editar").modal('show');
                   },
  
                  

                     guardar : function(){
                      //this.espaciosBlanco();
                      //this.validarCampos();

                      if(this.errores.length == 0){
                          
                            var url = 'usuarios/store';
                            axios.post(url, {
                                big_us_idUsuario  : this.usuario,
                                big_us_idSistema  : this.sistema,
                                var_us_login  : this.login,
                                var_us_pws  : this.password,
                                var_us_tipoUsuario : this.tipo_usuario,
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
                          
                           var url = 'usuarios/update';
                            axios.post(url, {
                                
                                
                               big_us_idUsuario  : this.e_usuario,
                                big_us_idSistema  : this.e_sistema,
                                var_us_login  : this.e_login,
                                var_us_pws  : this.e_password,
                                var_us_tipoUsuario : this.e_tipo_usuario,

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

                   

                  
                }
            }
        );


    </script>
@endsection







