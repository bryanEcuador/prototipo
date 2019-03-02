@extends('layouts.admin')
@section('nombre_pagina','Fecha')
@section('css')
<link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('titulo de la pagina',' Fecha')
@section('subtitulo','')

@section('contenido')


    <div class="col-md-12" id="creacionProveedores">
        
        <div class="tile">
            <button class="btn btn-primary btn-lg btn-block mb-4" @click="crear"> Agregar fecha</button>


            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>fecha</th>
                    <th>fecha proceso</th>
                    <th>dia</th>
                    <th>feriado</th>
                   
     
                    <th>Accioes</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>fecha</td>
                    <td>fecha proceso</td>
                    <td>dia</td>
                    <td>feriado</td>
                    
               
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
                                        <h5 class="modal-title">Creación de fecha</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                       
                                           <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">fecha:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                   <input type="date" v-model="fecha">
                                                </div>
                                            </div> 

                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">fecha proceso:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                   <input type="date" v-model="fecha_proceso">
                                                </div>
                                            </div> 

                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">dia:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                   <input type="text" v-model="dia">
                                                </div>
                                            </div> 

                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">feriado:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                   <input type="text" v-model="feriado">
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

        {{-- editar --}}
         <div id="editar" class="modal fade" role="dialog" >
            
            <div class="modal-dialog modal-lg">
                <div class="col-lg-12">
                    <div class="bs-component">
                        <div class="modal" style="position: relative; top: auto; right: auto; left: auto; bottom: auto; z-index: 1; display: block;">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edición de fecha</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                               
                                        
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">fecha:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                   <input type="date"  class="form-control" v-model="e_fecha">
                                                </div>
                                            </div> 

                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">fecha proceso:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                   <input type="date"  class="form-control" v-model="e_fecha_proceso">
                                                </div>
                                            </div> 

                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">dia:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                   <input  class="form-control" type="text" v-model="e_dia">
                                                </div>
                                            </div> 

                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">feriado:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                   <input class="form-control" type="text" v-model="e_feriado">
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
                                       <h1>¿ ESTA SEGURO QUE DESEA ELIMINAR ESTA FECHA   ?</h1>
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
                   
                  fecha : '',
                  fecha_proceso : '',
                  dia : '',
                  feriado : '',

                  e_fecha : '',
                  e_fecha_proceso : '',
                  e_dia : '',
                  e_feriado : '',




                   
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
  
                   // validaciones
                    validarCampos : function() {
                       
                    },

                    suprimir : function() {
                        var url = 'fecha/delete';
                            axios.post(url, {
                               big_fc_idFecha   : this.e_id,
                                
                            }).then(response => {
                            toastr.success("registro eliminado con exito")
                            //this.limpiar();
                            
                            }).catch(error => {
                                    console.log(error);
                            });
                    }

                     guardar : function(){
                      //this.espaciosBlanco();
                      //this.validarCampos();

                      if(this.errores.length == 0){
                          
                            var url = 'fecha/store';
                            axios.post(url, {
                               // big_fc_idFecha   : this.e_id,
                                fch_fc_fecha   : this.fecha,
                                fch_fc_fechaProceso : this.fecha_proceso,
                                 var_fc_dia   : this.dia,
                                 var_fc_feriado   : this.feriado,

                            }).then(response => {
                            toastr.success("registro guardado con exito")
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
                          
                           var url = 'fecha/update';
                            axios.post(url, {
                                
                                big_fc_idFecha   : this.e_id,
                                fch_fc_fecha   : this.e_fecha,
                                fch_fc_fechaProceso : this.e_fecha_proceso,
                                var_fc_dia   : this.e_dia,
                                var_fc_feriado   : this.e_feriado,

                            }).then(response => {
                                toastr.success("registro guardado con exito")
                                this.limpiar();
                            
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







