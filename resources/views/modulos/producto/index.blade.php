@extends('layouts.admin')
@section('nombre_pagina','Producto')
@section('css')
<link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('titulo de la pagina',' Producto')
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
        
        <div class="tile">
            <button class="btn btn-primary btn-lg btn-block mb-4" @click="crear"> Agregar producto</button>


            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>nombre comercio</th>
                    <th>producto</th>
                    <th>tipo producto</th>
                    <th>valor</th>
                    <th>promocion</th>
                    <th>disponible</th>
                    <th>mio</th>
     
                    <th>Accioes</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>nombre comercio</td>
                    <td>producto</td>
                    <td>tipo producto</td>
                    <td>valor</td>
                    <td>promocion</td>
                    <td>disponible</td>
                    <td>mio</td>
               
                    <td>
                        <button class="btn btn-primary"  @click="editar" ><i class="fa fa-pencil-square-o 2x-fa" aria-hidden="true"></i></button>
                        <button class="btn btn-danger"  @click="eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    </td>
                  </tr>

                </tbody>
              </table>
          
            

             
        </div>
       
    </div>

           {{-- editar  --}}
         <div id="crear" class="modal fade" role="dialog" >
            
            <div class="modal-dialog modal-lg">
                <div class="col-lg-12">
                    <div class="bs-component">
                        <div class="modal" style="position: relative; top: auto; right: auto; left: auto; bottom: auto; z-index: 1; display: block;">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Creación de productos</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                       
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

        {{-- crear  --}}
         <div id="editar" class="modal fade" role="dialog" >
            
            <div class="modal-dialog modal-lg">
                <div class="col-lg-12">
                    <div class="bs-component">
                        <div class="modal" style="position: relative; top: auto; right: auto; left: auto; bottom: auto; z-index: 1; display: block;">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edición de productos</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                               
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="nombre">comercio:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                                <select class="form-control" v-model="e_comercio">
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
                                                <input v-model="e_producto" class="form-control">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="nombre">tipo producto:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                                <select class="form-control" v-model="e_tipo_producto">
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
                                                <input v-model="e_valor" type="number" class="form-control">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="nombre">promocion:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                                <select class="form-control" v-model="e_promocion">
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
                                                <select class="form-control" v-model="e_disponible">
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
                                                <select class="form-control" v-model="e_mio">
                                                    <option> si</option>
                                                    <option> no</option>
                                                </select>
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
                                       <h1>¿ ESTA SEGURO QUE DESEA ELIMINAR EL PRODUCTO ?</h1>
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
                   
                    comercio :'',
                   producto:'',
                   tipo_producto:'',
                   valor:'',
                    promocion: '',
                    disponible: '',
                    mio: '',

                      e_comercio :'',
                   e_producto:'',
                   e_tipo_producto:'',
                   e_valor:'',
                    e_promocion: '',
                    e_disponible: '',
                    e_mio: '',

                   
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

                     guardar : function(){
                      //this.espaciosBlanco();
                      //this.validarCampos();

                      if(this.errores.length == 0){
                          
                            var url = 'producto/store';
                            axios.post(url, {
                                
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
                          
                           var url = 'producto/update';
                            axios.post(url, {
                                
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







