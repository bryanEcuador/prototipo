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
            <input type="text" class="form-control" v-model="consulta" v-on:keyup.13="consultar" placeholder="Ingrese el nombre del comercio a consultar y presione la tecla enter"><br>  

            <div class="table-responsive">
                <table class="table table-striped" >
                <thead>
                  <tr>
                    <th>CÓDIGO</th>  
                    <th>FECHA</th>
                    <th>FECHA DE PROCESO</th>
                    <th>DÍA</th>
                    <th>FERIADO</th>
                    <th colspan="2">ACCIONES</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for = "dato in tabla">
                    <td>@{{dato.big_fc_idFecha}}</td>
                    <td>@{{dato.fch_fc_fecha}}</td>
                    <td>@{{dato.fch_fc_fechaProceso}}</td>
                    <td>@{{dato.var_fc_dia}}</td>
                    <td>@{{dato.bit_fc_feriado}}</td>
                                   
                    <td>
                        <button class="btn btn-primary"  @click="editar(big_fc_idFecha)" ><i class="fa fa-pencil-square-o 2x-fa" aria-hidden="true"></i></button>
                    </td>
                     <td>
                        <button class="btn btn-danger"  @click="eliminar(big_fc_idFecha)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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
                                        <h5 class="modal-title">Creación de fecha</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                       
                                           <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">fecha:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                   <input type="date" v-model="fecha" class="form-control">
                                                </div>
                                            </div> 

                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">fecha proceso:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                   <input type="date" v-model="fecha_proceso" class="form-control">
                                                </div>
                                            </div> 

                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">dia:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                   <input type="text" v-model="dia" class="form-control">
                                                </div>
                                            </div> 

                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">feriado:</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                   <input type="text" v-model="feriado" class="form-control">
                                                </div>
                                            </div> 

               
                                       
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" id="Actualizar" type="button" v-on:click="guardar">Guardar</button>
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
                                    </div>
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
                                       <h4>¿ ESTA SEGURO QUE DESEA ELIMINAR ESTA FECHA   ?</h4>
                                        <button class="btn btn-primary" id="guardar" type="button" v-on:click="actualizar">Eliminar</button>
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">cancelar</button>
                                   </div>
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
        var app = new Vue ({
                el:"#creacionProveedores",
                data: {
                   
                  fecha : '',
                  fecha_proceso : '',
                  dia : '',
                  feriado : '',

                   datos_editar : '',  
                  e_id : '',
                  e_fecha : '',
                  e_fecha_proceso : '',
                  e_dia : '',
                  e_feriado : '',
                   
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

                    this.load()
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
                        

                        var url = '/fecha/consult/'+id
                        axios.get(url).then(response => {  
                                this.datos_editar = response.data

                                this.e_id = datos_editar[0].big_fc_idFecha
                                this.e_fecha =  datos_editar[0].fch_fc_fecha
                                this.e_fecha_proceso =  datos_editar[0].fch_fc_fechaProceso
                                this.e_dia  =  datos_editar[0].var_fc_dia
                                this.e_feriado =   datos_editar[0].bit_fc_feriado
                        }).catch(error => {
                            toastr.error("Error al consultar los datos.")
                            
                         });
                       $("#editar").modal('show');
                   },
  
                   // validaciones
                    validarCampos : function(tipo) {
                       if(tipo == "g"){
                            if(this.fecha == ""){
                                this.errores.push("El campo fecha no puede estar vacio");
                            }
                             if(this.fecha_proceso == ""){
                                this.errores.push("El campo fecha no puede estar vacio");
                            }
                             if(this.dia == ""){
                                this.errores.push("El campo fecha no puede estar vacio");
                            }
                             if(this.feriado == ""){
                                this.errores.push("El campo fecha no puede estar vacio");
                            }
                       }else {
                             if(this.e_fecha == ""){
                                this.errores.push("El campo fecha no puede estar vacio");
                            }
                             if(this.e_fecha_proceso == ""){
                                this.errores.push("El campo fecha no puede estar vacio");
                            }
                             if(this.e_dia == ""){
                                this.errores.push("El campo fecha no puede estar vacio");
                            }
                             if(this.e_feriado == ""){
                                this.errores.push("El campo fecha no puede estar vacio");
                            }
                       }
                    },

                    espaciosBlanco : function() {
                        this.dia : this.dia.trim();
                        this.feriado : this.feriado.trim();

                         this.e_dia : this.dia.trim();
                        this.e_feriado : this.feriado.trim();
                    }

                    suprimir : function() {
                        var url = 'fecha/delete';
                            axios.post(url, {
                               big_fc_idFecha   : this.seleccionado,
                                
                            }).then(response => {
                            if(respose.data == this.respuesta )
                            toastr.success("registro eliminado con exito")
                            
                            
                            }).catch(error => {
                                    console.log(error);
                            });
                    },

                     guardar : function(){
                      this.espaciosBlanco();
                      this.validarCampos("g");

                      if(this.errores.length == 0){
                          
                            var url = 'fecha/store';
                            axios.post(url, {
                               // big_fc_idFecha   : this.e_id,
                                fch_fc_fecha   : this.fecha,
                                fch_fc_fechaProceso : this.fecha_proceso,
                                 var_fc_dia   : this.dia,
                                 var_fc_feriado   : this.feriado,

                            }).then(response => {
                            if(response.data == this.respuesta){
                            toastr.success("Registro guardado con exito")
                             $('#crear').modal('hide')   
                             this.limpiar()
                            }else {
                                toastr.error("Error al guardar el registro")
                            }
                            
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

                    actualizar : function() {
                         //this.espaciosBlanco();
                      this.validarCampos("a");

                      if(this.errores.length == 0){
                          
                           var url = 'fecha/update';
                            axios.post(url, {
                                
                                big_fc_idFecha   : this.e_id,
                                fch_fc_fecha   : this.e_fecha,
                                fch_fc_fechaProceso : this.e_fecha_proceso,
                                var_fc_dia   : this.e_dia,
                                var_fc_feriado   : this.e_feriado,

                            }).then(response => {
                                 if(response.data == this.respuesta){
                                    toastr.success("Registro actualizado con exito")
                                    $('#crear').modal('hide')   
                                }else {
                                        toastr.error("Error al actualizar el registro")
                                }
                            }).catch(error => {
                                toastr.error("Error al actualizar el registro")
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

                   var url = page !== undefined ?  '/fecha/search/'+this.datosPorPagina+'/'+page : '/fecha/search/'+this.datosPorPagina;

                   if(page !== undefined && consulta !== undefined){
                        // 1 1
                        var url = '/fecha/search/'+this.datosPorPagina+'/'+page+'/'+consulta
                   }else if(page !== undefined && consulta == undefined )
                   {
                     // 1 0
                      var url = '/fecha/search/'+this.datosPorPagina+'/'+page;
                   }else if(page == undefined && consulta !== undefined){
                        
                        var url = '/fecha/search/'+this.datosPorPagina+'/'+0+'/'+consulta;
                   }else if(page == undefined && consulta == undefined ){
                     // 0 0
                     var url = '/fecha/search/'+this.datosPorPagina
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







