@extends('layouts.admin')
@section('nombre_pagina','Catalogo detalle')
@section('css')
<link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('titulo de la pagina',' Catalogo detalle')
@section('subtitulo','')

@section('contenido')

    <div class="col-md-12" id="creacionProveedores">
        
        <div class="tile">
           
                    <button class="btn btn-primary btn-lg btn-block mb-4" @click="crear"> Agregar catalogo</button>
                    <input type="text" class="form-control" placeholder="Ingrese el nombre del [] a consultar y presione la tecla enter"><br>

            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="">
                    <thead>
                    <tr>
                        <th>CABECERA</th>
                        <th>MIEMBRO</th>
                        <th>DESCRIPCIÓN</th>
                        <th>ACCIONES</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>

                    </tr>

                    </tbody>
                </table>
            </div>

            

             
        </div>
        <!-- Modal crear -->
        <div class="modal fade"  role="dialog" id="crear">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
                        <h4 class="modal-title">Crear catalogo detalle</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12" >

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nombre">Cabecera:</label>
                                </div>
                                <div class="col-md-4 ">
                                    <select class="form-control" v-model="cabecera">
                                        <option>1</option>
                                        <option>2</option>
                                    </select>

                                </div>

                                <div class="col-md-2">
                                    <label for="nombre">Codigo miembro:</label>
                                </div>
                                <div class="col-md-4 ">
                                    <input class="form-control" type="text" name="mio" v-model="codigo_miembro" maxlength="20">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="nombre">Descripcion:</label>
                            </div>
                            <div class="col-md-4 ">
                                <input class="form-control" type="text" name="mio" v-model="descripcion" maxlength="20">
                            </div>
                            <div class="col-md-2">
                                <label for="nombre">valor 1:</label>
                            </div>
                            <div class="col-md-4 ">
                                <input class="form-control" type="number" name="valor1" v-model="valor1" maxlength="20">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="nombre">valor 2:</label>
                            </div>
                            <div class="col-md-4 ">
                                <input class="form-control" type="number" name="mio" v-model="valor2" maxlength="20">
                            </div>
                            <div class="col-md-2">
                                <label for="nombre">valor 3:</label>
                            </div>
                            <div class="col-md-4 ">
                                <input class="form-control" type="number" name="mio" v-model="valor3" maxlength="20">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="nombre">valor 4:</label>
                            </div>
                            <div class="col-md-4 ">
                                <input class="form-control" type="number" name="mio" v-model="valor4" maxlength="20">
                            </div>
                            <div class="col-md-2">
                                <label for="nombre">valor 5:</label>
                            </div>
                            <div class="col-md-4 ">
                                <input class="form-control" type="number" name="mio" v-model="valor5" maxlength="20">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="nombre">valor 6:</label>
                            </div>
                            <div class="col-md-4 ">
                                <input class="form-control" type="number" name="mio" v-model="valor6" maxlength="20">
                            </div>
                            <div class="col-md-2">
                                <label for="nombre">valor 7:</label>
                            </div>
                            <div class="col-md-4 ">
                                <input class="form-control" type="number" name="mio" v-model="valor7" maxlength="20">
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click="guardar"> Guardar       </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>


          <!-- Modal editar -->
  <div class="modal fade"  role="dialog" id="editar">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
          <h4 class="modal-title">Editar catalogo</h4>
        </div>
        <div class="modal-body">
           <div class="col-md-12" >
            
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Cabecera:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="mio" v-model="cabecera" maxlength="20">
                </div>
                 
                <div class="col-md-2">
                    <label for="nombre">Codigo miembro:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="mio" v-model="codigo_miembro" maxlength="20">
                </div>
            </div>
            </div>

             <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Descripcion:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="mio" v-model="descripcion" maxlength="20">
                </div>
                <div class="col-md-2">
                    <label for="nombre">valor 1:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" name="valor1" v-model="mio" maxlength="20">
                </div>
            </div>
             
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">valor 2:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" name="mio" v-model="valor2" maxlength="20">
                </div>
                <div class="col-md-2">
                    <label for="nombre">valor 3:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" name="mio" v-model="valor3" maxlength="20">
                </div>
            </div>
           
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">valor 4:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" name="mio" v-model="valor4" maxlength="20">
                </div>
                 <div class="col-md-2">
                    <label for="nombre">valor 5:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" name="mio" v-model="valor5" maxlength="20">
                </div>
            </div>
           
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">valor 6:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" name="mio" v-model="valor6" maxlength="20">
                </div>
                <div class="col-md-2">
                    <label for="nombre">valor 7:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" name="mio" v-model="valor7" maxlength="20">
            </div>
                
            </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" > actualizar       </button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

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
            
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Cabecera:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="mio" v-model="cabecera" maxlength="20">
                </div>
                 
                <div class="col-md-2">
                    <label for="nombre">Codigo miembro:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="mio" v-model="codigo_miembro" maxlength="20">
                </div>
            </div>
            </div>

             <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Descripcion:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="text" name="mio" v-model="descripcion" maxlength="20">
                </div>
                <div class="col-md-2">
                    <label for="nombre">valor 1:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" name="valor1" v-model="mio" maxlength="20">
                </div>
            </div>
             
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">valor 2:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" name="mio" v-model="valor2" maxlength="20">
                </div>
                <div class="col-md-2">
                    <label for="nombre">valor 3:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" name="mio" v-model="valor3" maxlength="20">
                </div>
            </div>
           
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">valor 4:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" name="mio" v-model="valor4" maxlength="20">
                </div>
                 <div class="col-md-2">
                    <label for="nombre">valor 5:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" name="mio" v-model="valor5" maxlength="20">
                </div>
            </div>
           
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">valor 6:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" name="mio" v-model="valor6" maxlength="20">
                </div>
                <div class="col-md-2">
                    <label for="nombre">valor 7:</label>
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" name="mio" v-model="valor7" maxlength="20">
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
                   
                   cabecera : '',
                   codigo_miembro : '',
                   descripcion : '',
                   valor1 : '',
                   valor2 : '',
                   valor3 : '',
                   valor4 : '',
                   valor5 : '',
                   valor6 : '',
                   valor7 : '',

                   e_id : '', 
                   e_cabecera : '',
                   e_codigo_miembro : '',
                   e_descripcion : '',
                   e_valor1 : '',
                   e_valor2 : '',
                   e_valor3 : '',
                   e_valor4 : '',
                   e_valor5 : '',
                   e_valor6 : '',
                   e_valor7 : '',

                   v_cabecera : '',
                   v_codigo_miembro : '',
                   v_descripcion : '',
                   v_valor1 : '',
                   v_valor2 : '',
                   v_valor3 : '',
                   v_valor4 : '',
                   v_valor5 : '',
                   v_valor6 : '',
                   v_valor7 : '',

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


                   actualizar : function() {
                         //this.espaciosBlanco();
                      //this.validarCampos();

                      if(this.errores.length == 0){
                          
                           var url = 'catalogo/cabecera/update';
                            axios.post(url, {
                                
                               int_cd_idCatalogoDetalle :  this.id,
                                int_cd_idCatalogoCabecera : this.cabecera ,
                                var_cd_codigoMiembro : this.codigo_miembro ,
                                var_cd_descripcion : this.descripcion ,
                                var_cd_valor1 : this.valor1 ,
                                var_cd_valor2 : this.valor2 ,
                                var_cd_valor3 :this.valor3 ,
                                var_cd_valor4 :this.valor4 ,
                                var_cd_valor5 :this.valor5 ,
                                var_cd_valor6 :this.valor6 ,
                               var_cd_valor7 : this.valor7 ,
                         

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
                          
                            var url = 'catalogo/cabecera/store';
                            axios.post(url, {
                                int_cd_idCatalogoCabecera : this.cabecera ,
                                var_cd_codigoMiembro : this.codigo_miembro ,
                                var_cd_descripcion : this.descripcion ,
                                var_cd_valor1 : this.valor1 ,
                                var_cd_valor2 : this.valor2 ,
                                var_cd_valor3 :this.valor3 ,
                                var_cd_valor4 :this.valor4 ,
                                var_cd_valor5 :this.valor5 ,
                                var_cd_valor6 :this.valor6 ,
                               var_cd_valor7 : this.valor7 , 
                       
                            }).then(response => {
                            
                            //this.limpiar();
                                toastr.error("Error al guardar el registro")
                            
                            }).catch(error => {
                                toastr.error("Error al guardar el registro")
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







