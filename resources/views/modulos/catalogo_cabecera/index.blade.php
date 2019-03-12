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
            <input type="text" class="form-control" v-model="consulta" v-on:keyup.13="consultar" placeholder="Ingrese el [] del cliente a consultar y presione la tecla enter"><br>

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
                   <tr v-for="dato in tabla">
                       <td>@{{dato.var_cc_nombreCatalogo}}</td>
                       <td>@{{dato.var_cc_descripcionCatalogo}}</td>
                        <td>
                            <button class="btn btn-primary"  @click="editar" ><i class="fa fa-pencil-square-o 2x-fa" aria-hidden="true"></i></button>
                        </td>
                        <td>
                            <button class="btn btn-info" @click="ver"><i class="fa fa-eye" aria-hidden="true"></i></button>
                        </td>
                       <td>
                           <button class="btn btn-danger"  @click="eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                       </td>
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
                datos_editar : [],
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

                    this.load();
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

                    eliminar : function () {
                       $("#eliminar").modal('show');
                   },

                   crear : function () {
                       $("#crear").modal('show');
                   },
                   
                   
                   editar : function () {
                       var url = '/catalogo/cabecera/consult/'+id
                        axios.get(url).then(response => {
                            var data = response.data
                            this.e_nombre =  data[0].var_cc_nombreCatalogo
                            this.e_descripcion = data[0].var_cc_descripcionCatalogo
                            this.e_etiqueta1 = data[0].var_cc_etiqueta1
                            this.e_etiqueta2 = data[0].var_cc_etiqueta2
                            this.e_etiqueta3 = data[0].var_cc_etiqueta3
                            this.e_etiqueta4 = data[0].var_cc_etiqueta4
                            this.e_etiqueta5 = data[0].var_cc_etiqueta5
                            this.e_etiqueta6 = data[0].var_cc_etiqueta6
                            this.e_etiqueta7 = data[0].var_cc_etiqueta7
                           
                        
                            
                        }).catch(error => {
                            toastr.error("Error al consultar los datos.")
                            
                         });
                       $("#editar").modal('show');
                   },

                    ver : function (id) {
                        var url = '/catalogo/cabecera/consult/'+id
                        axios.get(url).then(response => {
                            var data = response.data
                            this.v_nombre =  data[0].var_cc_nombreCatalogo
                            this.v_descripcion = data[0].var_cc_descripcionCatalogo
                            this.v_etiqueta1 = data[0].var_cc_etiqueta1
                            this.v_etiqueta2 = data[0].var_cc_etiqueta2
                            this.v_etiqueta3 = data[0].var_cc_etiqueta3
                            this.v_etiqueta4 = data[0].var_cc_etiqueta4
                            this.v_etiqueta5 = data[0].var_cc_etiqueta5
                            this.v_etiqueta6 = data[0].var_cc_etiqueta6
                            this.v_etiqueta7 = data[0].var_cc_etiqueta7
                           
                        }).catch(error => {
                            toastr.error("Error al consultar los datos.")
                            
                         });
                       $("#ver").modal('show');
                   },

                   suprimir : function() {
                       axios.post(url, {
                               int_cc_idCatalogoCabecera : this.e_id,
                       
                            }).then(response => {


                            }).catch(error => {
                                    console.log(error);
                            });
                   },
  
                   // validaciones
                    validarCampos : function(tipo) {
                       if(tipo == 'g') {

                           if(this.this.nombre == ''){
                               this.errores.push('El campo nombre no puede estar en blanco')
                           }
                           if(this.this.descripcion == ''){
                               this.errores.push('El campo descripción 1 no puede estar en blanco')
                           }
                               if(this.etiqueta1 == ''){
                                this.errores.push('El campo etiqueta 1 no puede estar en blanco')
                               }
                           if(this.etiqueta2 == ''){
                               this.errores.push('El campo etiqueta 2 no puede estar en blanco')
                           }
                           if(this.etiqueta3 == ''){
                               this.errores.push('El campo etiqueta 3 no puede estar en blanco')
                           }
                           if(this.etiqueta4 == ''){
                               this.errores.push('El campo etiqueta 4 no puede estar en blanco')
                           }
                           if(this.etiqueta5 == ''){
                               this.errores.push('El campo etiqueta 5 no puede estar en blanco')
                           }
                           if(this.etiqueta6 == ''){
                               this.errores.push('El campo etiqueta 6 no puede estar en blanco')
                           }
                           if(this.etiqueta7 == ''){
                               this.errores.push('El campo etiqueta 7 no puede estar en blanco')
                           }

                       }else {
                           if(this.e_nombre == ''){
                               this.errores.push('El campo nombre no puede estar en blanco')
                           }
                           if(this.e_descripcion == ''){
                               this.errores.push('El campo descripción 1 no puede estar en blanco')
                           }
                           if(this.e_etiqueta1 == ''){
                               this.errores.push('El campo etiqueta 1 no puede estar en blanco')
                           }
                           if(this.e_etiqueta2 == ''){
                               this.errores.push('El campo etiqueta 2 no puede estar en blanco')
                           }
                           if(this.e_etiqueta3 == ''){
                               this.errores.push('El campo etiqueta 3 no puede estar en blanco')
                           }
                           if(this.e_etiqueta4 == ''){
                               this.errores.push('El campo etiqueta 4 no puede estar en blanco')
                           }
                           if(this.e_etiqueta5 == ''){
                               this.errores.push('El campo etiqueta 5 no puede estar en blanco')
                           }
                           if(this.e_etiqueta6 == ''){
                               this.errores.push('El campo etiqueta 6 no puede estar en blanco')
                           }
                           if(this.e_etiqueta7 == ''){
                               this.errores.push('El campo etiqueta 7 no puede estar en blanco')
                           }
                       }
                    },

                     guardar : function(){
                      this.espaciosBlanco();
                      this.validarCampos('g');

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
                         this.espaciosBlanco();
                        this.validarCampos('a');

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

                    espaciosBlanco : function(){
                            this.nombre =  this.nombre.trim();
                            this.descripcion = this.descripcion.trim() ;
                            this.etiqueta1 = this.etiqueta1.trim();
                            this.etiqueta2 = this.etiqueta2.trim();
                            this.etiqueta3 = this.etiqueta3.trim();
                            this.etiqueta4 = this.etiqueta4.trim();
                            this.etiqueta5 = this.etiqueta5.trim();
                            this.etiqueta6 = this.etiqueta6.trim();
                            this.etiqueta7 = this.etiqueta7.trim();

                           
                            this.e_nombre =  this.nombre.trim();
                            this.e_descripcion = this.e_descripcion.trim() ;
                            this.e_etiqueta1 = this.e_etiqueta1.trim();
                            this.e_etiqueta2 = this.e_etiqueta2.trim();
                            this.e_etiqueta3 = this.e_etiqueta3.trim();
                            this.e_etiqueta4 = this.e_etiqueta4.trim();
                            this.e_etiqueta5 = this.e_etiqueta5.trim();
                            this.e_etiqueta6 = this.e_etiqueta6.trim();
                            this.e_etiqueta7 = this.e_etiqueta7.trim();
                    },

                    limpiar : function(){

                    },

                        //--------------------- PAGINACION ---------------------------------------//
               
               
                load : function(page, consulta) {

                   var url = page !== undefined ?  '/catalogo/cabecera/'+this.datosPorPagina+'/'+page : '/catalogo/cabecera/'+this.datosPorPagina;

                   if(page !== undefined && consulta !== undefined){
                        // 1 1
                        var url = '/catalogo/cabecera/'+this.datosPorPagina+'/'+page+'/'+consulta
                   }else if(page !== undefined && consulta == undefined )
                   {
                     // 1 0
                      var url = '/catalogo/cabecera/'+this.datosPorPagina+'/'+page;
                   }else if(page == undefined && consulta !== undefined){
                        
                        var url = '/catalogo/cabecera/'+this.datosPorPagina+'/'+0+'/'+consulta;
                   }else if(page == undefined && consulta == undefined ){
                     // 0 0
                     var url = '/catalogo/cabecera/'+this.datosPorPagina
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







