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
                    <tr v-for="dato in tabla">
                       <td>@{{dato.int_cd_idCatalogoCabecera}}</td>
                       <td>@{{dato.var_cd_codigoMiembro}}</td>
                       <td>@{{dato.var_cd_descripcion}}</td>
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
                       var url = '/catalogo/detalle/consult/'+id
                        axios.get(url).then(response => {
                            var data = response.data
                            this.e_cabecera =  data[0].int_cd_idCatalogoCabecera
                            this.e_codigo_miembro = data[0].var_cd_codigoMiembro
                            this.e_descripcion = data[0].var_cd_descripcion
                            this.e_valor1 = data[0].var_cd_valor1
                            this.e_valor2 = data[0].var_cd_valor2
                            this.e_valor3 = data[0].var_cd_valor3
                            this.e_valor4 = data[0].var_cd_valor4
                            this.e_valor5 = data[0].var_cd_valor5
                            this.e_valor6 = data[0].var_cd_valor6
                            this.e_valor7 = data[0].var_cd_valor7
                            
                           
                        }).catch(error => {
                            toastr.error("Error al consultar los datos.")
                            
                         });
                       $("#editar").modal('show');
                   },

                    ver : function () {
                        var url = '/catalogo/detalle/consult/'+id
                        axios.get(url).then(response => {
                            var data = response.data
                            this.v_cabecera =  data[0].int_cd_idCatalogoCabecera
                            this.v_codigo_miembro = data[0].var_cd_codigoMiembro
                            this.v_descripcion = data[0].var_cd_descripcion
                            this.v_valor1 = data[0].var_cd_valor1
                            this.v_valor2 = data[0].var_cd_valor2
                            this.v_valor3 = data[0].var_cd_valor3
                            this.v_valor4 = data[0].var_cd_valor4
                            this.v_valor5 = data[0].var_cd_valor5
                            this.v_valor6 = data[0].var_cd_valor6
                            this.v_valor7 = data[0].var_cd_valor7
                            
                           
                        }).catch(error => {
                            toastr.error("Error al consultar los datos.")
                            
                         });
                       $("#ver").modal('show');
                   },

                   limpiar : function() {
                    
                    this.cabecera = "" ;
                   this.codigo_miembro = "" ;
                   this.descripcion = "";
                   this.valor1 = "";
                   this.valor2 = "";
                   this.valor3 = "";
                   this.valor4 = "";
                   this.valor5 = "";
                   this.valor6 = "";
                   this.valor7 = "";
                   },


                   actualizar : function() {
                        this.espaciosBlanco();
                        this.validarCampos("a");

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

                espaciosBlanco : function() {

                    this.cabecera = this.cabecera.trim() ;
                   this.codigo_miembro = this.codigo_miembro.trim() ;
                   this.descripcion = this.descripcion.trim();
                   this.valor1 = this.valor1.trim();
                   this.valor2 = this.valor2.trim();
                   this.valor3 = this.valor3.trim();
                   this.valor4 = this.valor4.trim();
                   this.valor5 = this.valor5.trim();
                   this.valor6 = this.valor6.trim();
                   this.valor7 = this.valor7.trim();

                    this.e_cabecera = this.e_cabecera.trim() ;
                   this.e_codigo_miembro = this.e_codigo_miembro.trim() ;
                   this.e_descripcion = this.e_descripcion.trim();
                   this.e_valor1 = this.e_valor1.trim();
                   this.valor2 = this.e_valor2.trim();
                   this.e_valor3 = this.e_valor3.trim();
                   this.e_valor4 = this.e_valor4.trim();
                   this.e_valor5 = this.e_valor5.trim();
                   this.e_valor6 = this.e_valor6.trim();
                   this.e_valor7 = this.e_valor7.trim();

                   },
  
                   // validaciones
                    validarCampos : function(tipo) {
                       if(tipo == "g"){
                            if(this.cabecera == '' ){
                                this.errores.push("El campo cabecera no puede estar en blanco.")
                            }
                             if(this.codigo_miembro == '' ){
                                this.errores.push("El campo cabecera no puede estar en blanco.")
                            }
                             if(this.descripcion == '' ){
                                this.errores.push("El campo cabecera no puede estar en blanco.")
                            }
                             if(this.valor1 == '' ){
                                this.errores.push("El campo cabecera no puede estar en blanco.")
                            }
                             if(this.valor2 == '' ){
                                this.errores.push("El campo cabecera no puede estar en blanco.")
                            }
                             if(this.valor3 == '' ){
                                this.errores.push("El campo cabecera no puede estar en blanco.")
                            }
                             if(this.valor4 == '' ){
                                this.errores.push("El campo cabecera no puede estar en blanco.")
                            }
                             if(this.valor5 == '' ){
                                this.errores.push("El campo cabecera no puede estar en blanco.")
                            }
                             if(this.valor6 == '' ){
                                this.errores.push("El campo cabecera no puede estar en blanco.")
                            }
                             if(this.valor7 == '' ){
                                this.errores.push("El campo cabecera no puede estar en blanco.")
                            }
                           
                       }else {
                            if(this.e_cabecera == '' ){
                                this.errores.push("El campo cabecera no puede estar en blanco.")
                            }
                             if(this.e_codigo_miembro == '' ){
                                this.errores.push("El campo cabecera no puede estar en blanco.")
                            }
                             if(this.e_descripcion == '' ){
                                this.errores.push("El campo descripción no puede estar en blanco.")
                            }
                             if(this.e_valor1 == '' ){
                                this.errores.push("El campo valor 1 no puede estar en blanco.")
                            }
                             if(this.e_valor2 == '' ){
                                this.errores.push("El campo valor 2 no puede estar en blanco.")
                            }
                             if(this.e_valor3 == '' ){
                                this.errores.push("El campo valor 3 no puede estar en blanco.")
                            }
                             if(this.e_valor4 == '' ){
                                this.errores.push("El campo valor 4 no puede estar en blanco.")
                            }
                             if(this.e_valor5 == '' ){
                                this.errores.push("El campo valor 5 no puede estar en blanco.")
                            }
                             if(this.e_valor6 == '' ){
                                this.errores.push("El campo valor 6 no puede estar en blanco.")
                            }
                             if(this.e_valor7 == '' ){
                                this.errores.push("El campo valor 7 no puede estar en blanco.")
                            }
                           
                       }
                    },

                guardar : function(){
                      this.espaciosBlanco();
                      this.validarCampos("g");

                      if(this.errores.length == 0){
                          
                            var url = 'catalogo/detalle/store';
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
                            
                            this.limpiar();
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

                               //--------------------- PAGINACION ---------------------------------------//
               
               
               
                
                load : function(page, consulta) {

                   var url = page !== undefined ?  '/catalogo/detalle/'+this.datosPorPagina+'/'+page : '/catalogo/detalle/'+this.datosPorPagina;

                   if(page !== undefined && consulta !== undefined){
                        // 1 1
                        var url = '/catalogo/detalle/'+this.datosPorPagina+'/'+page+'/'+consulta
                   }else if(page !== undefined && consulta == undefined )
                   {
                     // 1 0
                      var url = '/catalogo/detalle/'+this.datosPorPagina+'/'+page;
                   }else if(page == undefined && consulta !== undefined){
                        
                        var url = '/catalogo/detalle/'+this.datosPorPagina+'/'+0+'/'+consulta;
                   }else if(page == undefined && consulta == undefined ){
                     // 0 0
                     var url = '/catalogo/detalle/'+this.datosPorPagina
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







