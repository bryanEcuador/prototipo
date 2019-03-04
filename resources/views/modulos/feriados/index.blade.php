@extends('layouts.admin')
@section('nombre_pagina','Feriado')
@section('css')
<link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('titulo de la pagina',' Feriados')
@section('subtitulo','')

@section('contenido')


    <div class="col-md-12" id="creacionProveedores">
        
        <div class="tile">
            <button class="btn btn-primary btn-lg btn-block mb-4" @click="crear"> Agregar feriado</button>
            <input type="text" class="form-control" v-model="consulta" v-on:keyup.13="consultar" placeholder="Ingrese el nombre del comercio a consultar y presione la tecla enter"><br>  

            <div class="table-responsive">
                 <table class="table  table-striped">
                <thead>
                  <tr>
                    <th>FECHA</th>
                    <th>FECHA FERIADO</th>
                    <th colspan="2">ACCIONES</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for = "dato in tabla">
                    <td>@{{dato.big_ff_idFechaFeriado}}</td>
                    <td>@{{dato.fch_ff_fecha}}</td>
                    <td>
                        <button class="btn btn-primary"  @click="editar(big_ff_idFechaFeriado)" ><i class="fa fa-pencil-square-o 2x-fa" aria-hidden="true"></i></button>
                    </td>
                    <td>
                        <button class="btn btn-danger"  @click="eliminar(big_ff_idFechaFeriado)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    </td>
                  </tr>

                </tbody>
              </table>

              <div class="form-inline" v-if="datosNumber !== 0">
                    <div class="col-md-4">
                        <span> @{{ paginacion.to }} de @{{paginacion.total}} registros</span>
                    </div>

                    <div class="col-md-8">
                        <div>
                            <!-- corregir -->
                            <ul class="pagination">
                                <li class="page-item" v-if="paginacion.current_page > 1">
                                    <a class="page-link" href="#" @click.prevent="changePage(paginacion.current_page - 1 )" >
                                        <i class="fa fa-angle-left"></i>
                                    </a>
                                </li>
                                <li class="page-item" v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'page-item active' : 'page-item']">
                                    <a class="page-link" href="#" @click.prevent="changePage(page)"  >@{{page}}</a>
                                </li>
                                <li class="page-item" v-if="paginacion.current_page < paginacion.last_page"  >
                                    <a class="page-link" href="#"  @click.prevent="changePage(paginacion.current_page + 1 )">
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div> 
                </div>

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
                                        <h5 class="modal-title">Creación de feriado</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                    

                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">fecha feriado:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                   <input type="date" class="form-control" v-model="fecha_feriado">
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
                                        <h5 class="modal-title">Edición de feriado</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                               
                                         <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">fecha:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                   <input type="text" v-model="e_fecha">
                                                </div>
                                            </div> 

                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">fecha feriado:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                   <input type="date" v-model="e_fecha_feriado">
                                                </div>
                                            </div> 
                                  
                                                
                                       
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary"  type="button" v-on:click="actualizar">Actualizar</button>
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
                                    </div>
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
                                        <button class="btn btn-primary"  type="button" v-on:click="actualizar">Eliminar</button>
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">cancelar</button>
                                   </div>
                                </div>
                            </div>
                          
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
                  fecha_feriado : '',

                  e_fechaFeriado : '',  
                  e_fecha : '',
                 



                   
                    errores : [],

                    
                     /* paginacion */
                paginacion : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to': 0,
                },
                datosPorPagina : 10,
                offset: 3,
                datos :[],
                tabla : [],
                consulta :'',

                  /* configuracion */
                    respuesta : 0,

                    /*  */
                    seleccionado : 0,
                
                /* nuevas variables */
                   datos_editar : [],
                   datos_ver : [], 

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

                    computed : {
                
                isActived : function () {
                    return this.paginacion.current_page;
                },
                pagesNumber: function() {

                    if(!this.paginacion.to){
                        return [];
                    }
                    var from = this.paginacion.current_page - this.offset;
                    if(from < 1){
                        from = 1;
                    }
                    var to = from + (this.offset * 2);
                    if(to >= this.paginacion.last_page){
                        to = this.paginacion.last_page;
                    }
                    var pagesArray = [];
                    while(from <= to){
                        pagesArray.push(from);
                        from++;
                    }
                    return pagesArray;
                },

                datosNumber : function() {

                    //return this.tabla.length;

                        var tamaño = 0;
                   
                   if(this.tabla !== undefined){
                         tamaño  = this.tabla.length
                    return tamaño;
                   }else{
                       return tamaño;
                   }
                },

                cantidadPorPagina : function () {
                
                   var inicial = 0;
                    var datos = [];

                   while(true) {
                         inicial = inicial + 5;
                        if(this.paginacion.total <= inicial) { 
                           break;
                       } else {
                           this.datosPorPagina = 5;
                         datos.push(inicial)
                       }
                      
                   }  
                    return datos;           
                },
    }, 

                methods : {

                     eliminar : function (id) {
                       this.seleccionado = id
                       $("#eliminar").modal('show');

                   },

                   crear : function (id) {
                       $("#crear").modal('show');
                   },
                   
                   
                   editar : function (id) {
                        var url = '/feriados/consult';
                            axios.post(url, {
                               big_ff_idFechaFeriado   : id,

                            }).then(response => {
                                this.datos_editar = response.data
                                    this.e_fechaFeriado = datos.editar[0].big_ff_idFechaFeriado  
                                    this.e_fecha = datos.editar[0].fch_ff_fecha
                                 
                            }).catch(error => {
                                       toastr.success("Hubo un error al cargar el registro")
                                    console.log(error);
                            });
                       $("#editar").modal('show');
                   },

                   suprimir :  function() {
                            var url = '/feriados/delete';
                            axios.post(url, {
                               big_ff_idFechaFeriado   : this.seleccionado,

                            }).then(response => {
                                  if(respose.data == this.respuesta ){
                                    toastr.success("registro eliminado con exito")
                                  }else {
                                       toastr.error("Hubo un error al eliminar el registro")
                                  }
                            }).catch(error => {
                                       toastr.error("Hubo un error al eliminar el registro")
                                    console.log(error);
                            });
                   },
  
                  

                     guardar : function(){
                      //this.espaciosBlanco();
                      //this.validarCampos();

                      if(this.errores.length == 0){
                          
                            var url = '/feriados/store';
                            axios.post(url, {
                               // big_fc_idFecha   : this.id,
                                big_ff_idFechaFeriado   : this.fecha,
                                 fch_ff_fecha   : this.feriado,

                            }).then(response => {
                                if(response.data == this.respuesta){
                                    toastr.success("Registro guardado con exito ")
                                    $("#crear").modal('hide')
                                }else {
                                    toastr.success("Hubo un error al guardar el registro ")
                                }
                            this.limpiar();
                            
                            }).catch(error => {
                                    toastr.success("Hubo un error al guardar el registro ")
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
                          
                           var url = '/feriados/update';
                            axios.post(url, {
                                
                                 big_ff_idFechaFeriado   : this.e_fecha,
                                 fch_ff_fecha   : this.e_feriado,

                            }).then(response => {
                                 if(response.data == this.respuesta){
                                    toastr.success("Registro actualizado con exito ")
                                    $("#crear").modal('hide')
                                }else {
                                    toastr.success("Hubo un error al actualizar el registro ")
                                }                                                        
                            }).catch(error => {
                                    toastr.success("Hubo un error al actualizar el registro ")
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

                                        //--------------------- PAGINACION ---------------------------------------//
               
               
                load : function(page, consulta) {

                   var url = page !== undefined ?  '/comercio/search/'+this.datosPorPagina+'/'+page : '/comercio/search/'+this.datosPorPagina;

                   if(page !== undefined && consulta !== undefined){
                        // 1 1
                        var url = '/comercio/search/'+this.datosPorPagina+'/'+page+'/'+consulta
                   }else if(page !== undefined && consulta == undefined )
                   {
                     // 1 0
                      var url = '/comercio/search/'+this.datosPorPagina+'/'+page;
                   }else if(page == undefined && consulta !== undefined){
                        
                        var url = '/comercio/search/'+this.datosPorPagina+'/'+0+'/'+consulta;
                   }else if(page == undefined && consulta == undefined ){
                     // 0 0
                     var url = '/comercio/search/'+this.datosPorPagina
                   }

                    axios.get(url).then(response => {

                    this.datos = response.data;
                    this.tabla = this.datos.data

                    this.paginacion.total = this.datos.total;
                    if(page == undefined) {
                        this.paginacion.current_page = this.datos.current_page;
                    }
                    this.paginacion.per_page = this.datos.per_page;
                    this.paginacion.last_page = this.datos.last_page;
                    this.paginacion.from = this.datos.from;
                    this.paginacion.to = this.datos.to;
                }).catch(error => {
                        console.log(error);
                    this.load();
                });
                },

                 changePage: function(page) {
                     this.paginacion.current_page = page;
                     if(this.consulta == ''){
                        this.load(page) 
                     }else {
                           this.load(page,this.consulta) 
                     }
                     
                    
                },

                changeNumberPage :function(page) {
                   if(this.consulta == ''){
                        this.load(page) 
                     }else {
                           this.load(page,this.consulta) 
                     }
                },

                
                //--------------------- PAGINACION ---------------------------------------//

                consultar : function(){
                     this.load(0,this.consulta) 
                },  

                  
                }
            }
        );


    </script>
@endsection







