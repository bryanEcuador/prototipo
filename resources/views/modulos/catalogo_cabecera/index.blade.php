@extends('layouts.admin')
@section('nombre_pagina','Catalogo cabecera')
@section('css')
<link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('titulo de la pagina',' Catalogo cabecera')
@section('subtitulo','')

@section('contenido')


    <div class="col-md-12" id="creacionProveedores">
        
        <div class="tile">
        <button class="btn btn-primary btn-lg btn-block mb-4" @click="crear"> Agregar catalogo</button>
            <input type="text" class="form-control" placeholder="Ingrese el [] del cliente a consultar y presione la tecla enter"><br>

            <div class="table-responsive">
               <table class="table table-striped" id="">
                   <thead>
                   <tr>
                       <th>NOMBRE</th>
                       <th>DESCRIPCIÓN</th>
                       <th COLSPAN="3">ACCIONES</th>
                   </tr>
                   </thead>
                   <tbody>
                   <tr>
                       {{--<td>nombre</td>--}}
                       {{--<td>descripcion</td>--}}
                        {{--<td>--}}
                            {{--<button class="btn btn-primary"  @click="editar" ><i class="fa fa-pencil-square-o 2x-fa" aria-hidden="true"></i></button>--}}
                        {{--</td>--}}
                        {{--<td>--}}
                            {{--<button class="btn btn-info" @click="ver"><i class="fa fa-eye" aria-hidden="true"></i></button>--}}
                        {{--</td>--}}
                       {{--<td>--}}
                           {{--<button class="btn btn-danger"  @click="eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></button>--}}
                       {{--</td>--}}
                   </tr>

                   </tbody>
               </table>
           </div>

        </div>
        <div class="modal fade"  role="dialog" id="crear">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
                        <h4 class="modal-title">Crear catalogo</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12" >

                            <p>Cabecera</p>
                            <hr>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">Nombre:</label>
                                </div>
                                <div class="col-md-4 ">
                                    <input class="form-control" type="text" name="nombre" v-model="nombre" maxlength="20">
                                </div>

                                <div class="col-md-2">
                                    <label for="nombre">Descripcion :</label>
                                </div>
                                <div class="col-md-4 ">
                                    <input class="form-control" type="text" name="nombre" v-model="descripcion" maxlength="20">
                                </div>
                            </div>



                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">etiqueta 1:</label>
                                </div>
                                <div class="col-md-4 ">
                                    <input class="form-control" type="text" name="nombre" v-model="etiqueta1" maxlength="20">
                                </div>
                                <div class="col-md-2">
                                    <label for="nombre">etiqueta 2:</label>
                                </div>
                                <div class="col-md-4 ">
                                    <input class="form-control" type="text" name="nombre" v-model="etiqueta2" maxlength="20">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">etiqueta 3:</label>
                                </div>
                                <div class="col-md-4 ">
                                    <input class="form-control" type="text" name="nombre" v-model="etiqueta3" maxlength="20">
                                </div>
                                <div class="col-md-2">
                                    <label for="nombre">etiqueta 4:</label>
                                </div>
                                <div class="col-md-4 ">
                                    <input class="form-control" type="text" name="nombre" v-model="etiqueta4" maxlength="20">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">etiqueta 5:</label>
                                </div>
                                <div class="col-md-4 ">
                                    <input class="form-control" type="text" name="nombre" v-model="etiqueta5" maxlength="20">
                                </div>
                                <div class="col-md-2">
                                    <label for="nombre">etiqueta 6:</label>
                                </div>
                                <div class="col-md-4 ">
                                    <input class="form-control" type="text" name="nombre" v-model="etiqueta6" maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">etiqueta 7:</label>
                                </div>
                                <div class="col-md-4 ">
                                    <input class="form-control" type="text" name="nombre" v-model="etiqueta7" maxlength="20">
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" @click="guardar" > Guardar  </button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>


    <!-- Modal crear -->


 


  
    <!-- Modal crear -->
  <div class="modal fade"  role="dialog" id="ver">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
          <h4 class="modal-title">Ver catalogo</h4>
        </div>
        <div class="modal-body">
           <div class="col-md-12" >

                <p>Cabecera</p>
                <hr>
                           <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Nombre:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="nombre" v-model="nombre" maxlength="20">
                </div>

                <div class="col-md-2">
                    <label for="nombre">Descripcion :</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="nombre" v-model="descripcion" maxlength="20">
                </div>
            </div>

         

              <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">etiqueta 1:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="nombre" v-model="etiqueta1" maxlength="20">
                </div>
                <div class="col-md-2">
                    <label for="nombre">etiqueta 2:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="nombre" v-model="etiqueta2" maxlength="20">
                </div>
            </div>

             <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">etiqueta 3:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="nombre" v-model="etiqueta3" maxlength="20">
                </div>
                <div class="col-md-2">
                    <label for="nombre">etiqueta 4:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="nombre" v-model="etiqueta4" maxlength="20">
                </div>
            </div>
            
             <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">etiqueta 5:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="nombre" v-model="etiqueta5" maxlength="20">
                </div>
                <div class="col-md-2">
                    <label for="nombre">etiqueta 6:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="nombre" v-model="etiqueta6" maxlength="20">
                </div>
            </div>
             <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">etiqueta 7:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="nombre" v-model="etiqueta7" maxlength="20">
                </div>
            </div>
            
            
        </div>
        <div class="modal-footer">
            
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
                    

                   nombre : '',
                   descripcion : '',
                   etiqueta1 : '',
                   etiqueta2 : '',
                   etiqueta3 : '',
                   etiqueta4 : '',
                   etiqueta5 : '',
                   etiqueta6 : '',
                   etiqueta7 : '',

                   e_id : '', 
                   e_nombre : '',
                   e_descripcion : '',
                   e_etiqueta1 : '',
                   e_etiqueta2 : '',
                   e_etiqueta3 : '',
                   e_etiqueta4 : '',
                   e_etiqueta5 : '',
                   e_etiqueta6 : '',
                   e_etiqueta7 : '',


                    v_nombre : '',
                   v_descripcion : '',
                   v_etiqueta1 : '',
                   v_etiqueta2 : '',
                   v_etiqueta3 : '',
                   v_etiqueta4 : '',
                   v_etiqueta5 : '',
                   v_etiqueta6 : '',
                   v_etiqueta7 : '',

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

                    ver : function () {
                       $("#ver").modal('show');
                   },

                   suprimir : function() {
                       axios.post(url, {
                               int_cc_idCatalogoCabecera : this.e_id,
                       
                            }).then(response => {
                            
                            //this.limpiar();
                            
                            }).catch(error => {
                                    console.log(error);
                            });
                   },
  
                   // validaciones
                    validarCampos : function() {
                       
                    },

                     guardar : function(){
                      //this.espaciosBlanco();
                      //this.validarCampos();

                      if(this.errores.length == 0){
                          
                            var url = '/catalogo/cabecera/store';
                            axios.post(url, {
                                var_cc_nombreCatalogo : this.nombre,
                                var_cc_descripcionCatalogo : this.descripcion,
                                var_cc_etiqueta1 : this.etiqueta1,    
                                var_cc_etiqueta2 : this.etiqueta2,    
                                var_cc_etiqueta3 : this.etiqueta3,    
                                var_cc_etiqueta4 : this.etiqueta4,    
                                var_cc_etiqueta5 : this.etiqueta5,    
                                var_cc_etiqueta6 : this.etiqueta6,    
                                var_cc_etiqueta7 : this.etiqueta7,    
                       
                            }).then(response => {
                            
                            //this.limpiar();
                            
                            }).catch(error => {
                                    toastr.error("Error al guardar el registro.")
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
                          
                           var url = 'catalogo/cabecera/update';
                            axios.post(url, {
                                
                                int_cc_idCatalogoCabecera : this.e_id,
                                var_cc_nombreCatalogo : this.e_nombre,
                                var_cc_descripcionCatalogo : this.e_descripcion,
                                var_cc_etiqueta1 : this.e_etiqueta1,    
                                var_cc_etiqueta2 : this.e_etiqueta2,    
                                var_cc_etiqueta3 : this.e_etiqueta3,    
                                var_cc_etiqueta4 : this.e_etiqueta4,    
                                var_cc_etiqueta5 : this.e_etiqueta5,    
                                var_cc_etiqueta6 : this.e_etiqueta6,    
                                var_cc_etiqueta7 : this.e_etiqueta7,  
                         

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







