@extends('layouts.admin')
@section('nombre_pagina','Cliente')
@section('css')
<link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('titulo de la pagina',' Cliente')
@section('subtitulo','')

@section('contenido')



    <div class="col-md-12" id="cliente" v-cloak >
        {{-- MODALES --}}
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
                                                            <div class="col-md-3">
                                                                <label for="nombre">Tipo identificación</label>
                                                            </div>
                                                            <div class="col-md-8 ">
                                                                <select class="form-control" v-model="c_tipo_identificacion">
                                                                    <option>a</option>
                                                                    <option>b</option>
                                                                </select>
                                                            
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-md-3">
                                                                <label for="nombre">identificación</label>
                                                            </div>
                                                            <div class="col-md-8 ">
                                                            <input class="form-control" type="text" placeholder="0952013259"  v-model="c_identificacion">
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="form-group row">
                                                            <div class="col-md-3">
                                                                <label for="nombre">Nombre</label>
                                                            </div>
                                                            <div class="col-md-4 ">
                                                            <input class="form-control" type="text" v-model="c_nombre" placeholder="juan pablo">
                                                            </div>
                                                            <div class="col-md-4 ">
                                                                 <input class="form-control" type="text" placeholder="carrera cevallos"  v-model="c_apellidos" >
                                                            </div>
                                                           
                                                        </div>    

                                                        <div class="form-group row">
                                                            <div class="col-md-3">
                                                                <label for="nombre">Ciudad:</label>
                                                            </div>
                                                            <div class="col-md-8 ">
                                                                <select class="form-control" v-model="c_ciudad">
                                                                    <option>a</option>
                                                                    <option>b</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-3">
                                                                <label for="nombre">Sector:</label>
                                                            </div>
                                                            <div class="col-md-8 ">
                                                                <select class="form-control" v-model="c_sector">
                                                                    <option>a</option>
                                                                    <option>b</option>
                                                                </select>
                                                                
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">  
                                                             <div class="col-md-3">
                                                                <label for="nombre">Email:</label>
                                                            </div>
                                                            <div class="col-md-8 ">
                                                            <input class="form-control" type="text"  v-model="c_email">
                                                            </div>
                                                        </div>
                                                        
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Fecha de nacimiento</label>
                                            </div>
                                            <div class="col-md-8 ">
                                                <input class="form-control" type="date"  v-model="c_fecha" >
                                            </div>
                                        </div>              
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Teléfono</label>
                                            </div>
                                            <div class="col-md-8 ">
                                                <input class="form-control" type="text"  v-model="c_telefono">
                                            </div>
                                        </div>    
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Estado</label>
                                            </div>
                                            <div class="col-md-8 ">
                                               <select class="form-control" v-model="c_estado" > 
                                                    <option>a</option>
                                                    <option>b</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Usuario</label>
                                            </div>
                                            <div class="col-md-8 ">
                                                <input class="form-control" type="text"  v-model="c_login">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Contraseña</label>
                                            </div>
                                            <div class="col-md-8 ">
                                                <input class="form-control" type="password"  v-model="c_pass">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" id="guardar" type="button" @click="guardar">Guardar</button>
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>   
                            </div>
                        </div>   
                     </div>
                 </div>           
             </div>  
          </div>
          
          {{-- editar --}}
           
         
          <div id="editarCliente" class="modal fade" role="dialog" >
             <div class="modal-dialog modal-lg">
                 <div class="col-lg-12">
                     <div class="bs-component">
                        <div class="modal" style="position: relative; top: auto; right: auto; left: auto; bottom: auto; z-index: 1; display: block;">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                     <div class="modal-header">
                                        <h5 class="modal-title">Acualización de clientes</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                                        <div class="form-group row">
                                                            <div class="col-md-3">
                                                                <label for="nombre">Tipo identificación</label>
                                                            </div>
                                                            <div class="col-md-8 ">
                                                                <select class="form-control" v-model="e_tipo_identificacion">
                                                                    <option>a</option>
                                                                    <option>b</option>
                                                                </select>
                                                            
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-md-3">
                                                                <label for="nombre">identificación</label>
                                                            </div>
                                                            <div class="col-md-8 ">
                                                            <input class="form-control" type="text" placeholder="0952013259"  v-model="e_identificacion">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-md-3">
                                                                <label for="nombre">Nombre</label>
                                                            </div>
                                                            <div class="col-md-4 ">
                                                            <input class="form-control" type="text" v-model="e_nombre" placeholder="juan pablo">
                                                            </div>
                                                            <div class="col-md-4 ">
                                                                 <input class="form-control" type="text" placeholder="carrera cevallos"  v-model="e_apellidos" >
                                                            </div>
                                                           
                                                        </div>  
                                                         

                                                        <div class="form-group row">
                                                            <div class="col-md-3">
                                                                <label for="nombre">Ciudad:</label>
                                                            </div>
                                                            <div class="col-md-8 ">
                                                                <select class="form-control" v-model="e_ciudad">
                                                                    <option>a</option>
                                                                    <option>b</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-3">
                                                                <label for="nombre">Sector:</label>
                                                            </div>
                                                            <div class="col-md-8 ">
                                                                <select class="form-control" v-model="e_sector">
                                                                    <option>a</option>
                                                                    <option>b</option>
                                                                </select>
                                                                
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">  
                                                             <div class="col-md-3">
                                                                <label for="nombre">Email:</label>
                                                            </div>
                                                            <div class="col-md-8 ">
                                                            <input class="form-control" type="text"  v-model="e_email">
                                                            </div>
                                                        </div>  
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Fecha de nacimiento</label>
                                            </div>
                                            <div class="col-md-8 ">
                                                <input class="form-control" type="date"  v-model="e_fecha" >
                                            </div>
                                        </div>                                                             
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Teléfono</label>
                                            </div>
                                            <div class="col-md-8 ">
                                                <input class="form-control" type="text"  v-model="e_telefono">
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Estado</label>
                                            </div>
                                            <div class="col-md-8 ">
                                                <select class="form-control" v-model="e_estado" > 
                                                    <option>a</option>
                                                    <option>b</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Usuario</label>
                                            </div>
                                            <div class="col-md-8 ">
                                                <input class="form-control" type="text"  v-model="e_login">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Contraseña</label>
                                            </div>
                                            <div class="col-md-8 ">
                                                <input class="form-control" type="password"  v-model="e_pass">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" id="guardar" type="button" @click="actualizar">actualizar</button>
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>   
                            </div>
                        </div>   
                     </div>
                 </div>           
             </div>  
          </div>
          {{-- eliminar --}}

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
                                       <h4>¿ ESTA SEGURO QUE DESEA ELIMINAR ESTE REGISTRO ?</h2>
                                        <button class="btn btn-primary" id="guardar" type="button" v-on:click="suprimir">Eliminar</button>
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">cancelar</button>
                                   </div>
                                </div>      
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div> 
         </div>      
            

          {{-- ver --}}
          <div id="verCliente" class="modal fade" role="dialog" >
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
                                                        <div class="form-group row">
                                                            <div class="col-md-3">
                                                                <label for="nombre">Tipo identificación</label>
                                                            </div>
                                                            <div class="col-md-8 ">
                                                                <input class="form-control" type="text"  v-model="v_tipo_identificacion">
                                                            
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-md-3">
                                                                <label for="nombre">Identificación</label>
                                                            </div>
                                                            <div class="col-md-8 ">
                                                            <input class="form-control" type="text" placeholder="0952013259"  v-model="v_identificacion">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-md-3">
                                                                <label for="nombre">Nombre</label>
                                                            </div>
                                                            <div class="col-md-4 ">
                                                            <input class="form-control" type="text" v-model="v_nombre" placeholder="juan pablo">
                                                            </div>
                                                            <div class="col-md-4 ">
                                                                 <input class="form-control" type="text" placeholder="carrera cevallos"  v-model="v_apellidos" >
                                                            </div>
                                                           
                                                        </div>  

                                                        <div class="form-group row">
                                                            <div class="col-md-3">
                                                                <label for="nombre">Ciudad:</label>
                                                            </div>
                                                            <div class="col-md-8 ">
                                                                <input class="form-control" v-model="v_ciudad">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-3">
                                                                <label for="nombre">Sector:</label>
                                                            </div>
                                                            <div class="col-md-8 ">
                                                                <input class="form-control" v-model="v_sector">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">  
                                                             <div class="col-md-3">
                                                                <label for="nombre">Email:</label>
                                                            </div>
                                                            <div class="col-md-8 ">
                                                            <input class="form-control" type="emai"  v-model="v_email">
                                                            </div>
                                                        </div> 
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Fecha de nacimiento</label>
                                            </div>
                                            <div class="col-md-8 ">
                                                <input class="form-control" type="date"  v-model="v_fecha" >
                                            </div>
                                        </div>                                        
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Teléfono</label>
                                            </div>
                                            <div class="col-md-8 ">
                                                <input class="form-control" type="telf"  v-model="v_telefono">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Estado</label>
                                            </div>
                                            <div class="col-md-8 ">
                                                <input class="form-control" type="text"  v-model="e_estado">
                                            </div>
                                        </div>                            
                                    </div>
                                   
                                </div>   
                            </div>
                        </div>   
                     </div>
                 </div>           
             </div>  
          </div>

          {{-- /MODALES --}}
            
           
        
        
          <div class="tile">

        <button class="btn btn-primary btn-lg btn-block mb-4" @click="crear" > Agregar cliente</button>
          <input type="text" class="form-control" placeholder="Ingrese el nombre del cliente a consultar y presione la tecla enter"><br>  
        <div class="table-responsive">
         <table class="table table-striped" id="tabla-grande">
                <thead>
                  <tr>
                    <th>IDENTIFICACION</th>
                    <th>NOMBRES</th>
                    <th>APELLIDOS</th>
                    <th>CIUDAD</th>
                    <th>TELÉFONO</th>
                    <th>EMAIL</th>
                    <th colspan="3" >ACCIONES</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="dato in tabla" >
                    
                    <td>@{{dato.identificacion}}</td>
                    
                    <td>@{{dato.nombres}}</td>
                    <td>@{{dato.apellidos}}</td>
                    <td>@{{dato.ciudad}}</td>
                   
                    <td>@{{dato.telefono}}</td>
                    <td>@{{dato.email}}</td>
                    <td>
                        <button class="btn btn-primary"  @click="editar(dato.id)" ><i class="fa fa-pencil-square-o 2x-fa" aria-hidden="true"></i></button>
                    </td>
                    <td>
                        <button class="btn btn-info" @click="ver(dato.id)"><i class="fa fa-eye" aria-hidden="true"></i></button>
                    </td>
                    <td>
                        <button class="btn btn-danger"  @click="eliminar(dato.id)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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

                    /* configuracion */
                    correcto : 0,

                    /*  */
                    c_tipo_identificacion : '',
                    c_identificacion : '',
                    c_nombre : '' ,
                    c_apellidos : '' ,
                    c_ciudad : '',
                    c_sector : '' ,
                    c_fecha : '' ,
                    c_telefono : '' ,
                    c_email : '' ,
                    c_login : '',
                    c_pass : '',

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
                    e_login : '',
                    e_pass : '',

                    datos_editar : [],

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
                    datos_ver : [],

                    id : '',
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
                datosPorPagina : 5,
                offset: 3,
                datos :[],
                tabla : [],
                seleccionado : 0,
                   

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

                    return this.tabla.length;
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
                created : function() {
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": true,
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

                methods : {

                   eliminar : function (id) {
                       this.selecionado = id
                       $("#eliminarCliente").modal('show');
                   },

                 
                  
                   ver : function (id) {
                     
                         var url = 'cliente/consult/'+id
                        axios.get(url).then(response => {
                            this.datos_ver = response.data

                            this.v_id = data[0].big_cl_idCliente
                            this.v_tipo_identificacion = data[0].var_cl_tipoIdenticacion 
                            this.v_identificacion = data[0].var_cl_identificacion 
                            this.v_nombre  = data[0].var_cl_nombres
                            this.v_apellidos  = data[0].var_cl_apellidos
                            this.v_ciudad = data[0].var_cl_ciudad
                            this.v_sector = data[0].var_cl_sector
                            this.v_fecha = data[0].var_cl_telefono
                            this.v_email = data[0].var_cl_email
                            this.v_telegono = data[0].var_cl_telefono
                        }).catch(error => {
                            toastr.error("Error al consultar los datos.")
                            this.load();
                         });
                       $("#verCliente").modal('show');
                   },

                   crear : function () {
                       
                       $("#crearCliente").modal('show');
                   },
                   
                   
                   editar : function (id) {
                       var url = 'cliente/consult/'+id
                    axios.get(url).then(response => {
                        this.datos_editar = response.data

                            this.e_id = data[0].big_cl_idCliente
                            this.e_tipo_identificacion = data[0].var_cl_tipoIdenticacion 
                            this.e_identificacion = data[0].var_cl_identificacion 
                            this.e_nombre  = data[0].var_cl_nombres
                            this.e_apellidos  = data[0].var_cl_apellidos
                            this.e_ciudad = data[0].var_cl_ciudad
                            this.e_sector = data[0].var_cl_sector
                            this.e_fecha = data[0].var_cl_telefono
                            this.e_email = data[0].var_cl_email
                            this.e_telefono = data[0].var_cl_telefono
                            this.e_login = data[0].var_lg_login
                            this.e_pass = data[0].var_us_pws
                }).catch(error => {
                        toastr.error("Error al consultar los datos.")
                    this.load();
                });
                      
                       $("#editarCliente").modal('show');
                   },

                   suprimir : function() {
                        var url = '/cliente/delete';
                            axios.post(url, {
                               big_cl_idCliente : this.selecionado 
                            }).then(response => {
                            
                           if(response.data == this.correcto){
                                     toastr.success("registro eliminado con exito")
                                     this.limpiar();
                                     $("#eliminarCliente").modal('hide');
                                }else {
                                    toastr.error("Ha ocurrido un error al eliminar el registro")
                                }
                            }).catch(error => {
                                    console.log(error);
                               toastr.error("ha ocurrido un error a eliminar el registro")
                               console.log(error)     
                            });
                   },
                   
                   // validaciones
                  
                    guardar : function(){
                        
                      
                        this.espaciosBlanco()
                        this.validar('g')
                      if(this.errores.length == 0){
                          
                            var url = '/cliente/store';
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
                                var_lg_login : this.c_login,
                                var_lg_login : this.c_pass,

                            }).then(response => {
                                if(response.data == this.correcto){
                                     toastr.success("registro guardado con exito")
                                     this.limpiar();
                                     $("#crear").modal('hide');
                                }else {
                                    toastr.error("Ha ocurrido un error al crear el cliente")
                                }
                                                       
                            }).catch(error => {
                                    console.log(error);
                               toastr.error("Ha ocurrido un error al crear el cliente")
                               
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
                        this.espaciosBlanco()
                        this.validar('a')
                      if(this.errores.length == 0){
                           var url = '/cliente/update';
                            axios.post(url, {
                             big_cl_idCliente : this.e_id ,             
                            var_cl_tipoIdentificacion   : this.e__tipo_identificacion,
                            var_cl_identificacion  : this.e__identificacion, 
                            var_cl_nombres : this.e__nombre , 
                            var_cl_apellidos : this.e__apellidos , 
                            var_cl_ciudad   : this.e__ciudad,
                            var_cl_sector  : this.e__sector ,
                            var_cl_fechaNacimiento  : this.e__fecha ,
                            var_cl_telefono : this.e__fecha ,
                            var_cl_email : this.e__email ,
                                var_lg_login : this.e_login,
                                var_lg_login : this.e_pass,

                            }).then(response => {
                            if(response.data == this.correcto){
                                     toastr.success("registro actualizado con exito")
                                     this.limpiar();
                                     $("#editarCliente").modal('hide');
                                }else {
                                    toastr.error("Ha ocurrido un error al actualizar el cliente")
                                }
                            
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
                        // espacios en blanco para crear
                            this.c_tipo_identificacion = this.c_tipo_identificacion.trim(); 
                            this.c_identificacion = this.c_identificacion.trim() 
                            this.c_nombre  = this.c_nombre.trim()
                            this.c_apellidos  = this.c_apellidos.trim()
                            this.c_ciudad = this.c_ciudad.trim()
                            this.c_sector = this.c_sector.trim()
                            this.c_fecha = this.c_fecha.trim()
                            this.c_email = this.c_email.trim()

                        // espacios en blanco para actualizar
                            this.e_tipo_identificacion = this.e_tipo_identificacion.trim(); 
                            this.e_identificacion = this.e_identificacion.trim() 
                            this.e_nombre  = this.e_nombre.trim()
                            this.e_apellidos  = this.e_apellidos.trim()
                            this.e_ciudad = this.e_ciudad.trim()
                            this.e_sector = this.e_sector.trim()
                            this.e_fecha = this.e_fecha.trim()
                            this.e_email = this.e_email.trim()
                    },
                    
                    limpiar : function() {
                            this.c_tipo_identificacion = ""
                            this.c_identificacion = "" 
                            this.c_nombre  = ""
                            this.c_apellidos  = ""
                            this.c_ciudad = ""
                            this.c_sector = ""
                            this.c_fecha = ""
                            this.c_email = ""
                            this.errores = [];           
                    }, 

                    validar : function(tipo) {

                        if(tipo == 'g'){
                            if(this.c_tipo_identificacion == ""){
                                this.errores.push("ingrese el tipo identificación")
                                
                            }

                             if(this.c_identificacion == ""){
                                this.errores.push("ingrese la identificación")
                            }

                              if(this.c_nombre == ""){
                                this.errores.push("ingrese los nombres")
                            }

                             if(this.c_apellidos == ""){
                                this.errores.push("ingrese  los apellidos")
                            }

                             if(this.c_ciudad == ""){
                                this.errores.push("ingrese la ciudad")
                            }

                             if(this.c_sector == ""){
                                this.errores.push("ingrese el sector")
                            }

                             if(this.c_fecha == ""){
                                this.errores.push("ingrese la fecha")
                            }

                            
                             if(this.c_email == ""){
                                this.errores.push("ingrese el email")
                            }
                            
                        } else {
                            
                            if(this.e_tipo_identificacion == ""){
                                this.errores.push("ingrese el tipo identificación")
                            }

                             if(this.e_identificacion == ""){
                                this.errores.push("ingrese la identificación")
                            }

                              if(this.e_nombre == ""){
                                this.errores.push("ingrese los nombres")
                            }

                             if(this.e_apellidos == ""){
                                this.errores.push("ingrese  los apellidos")
                            }

                             if(this.e_ciudad == ""){
                                this.errores.push("ingrese la ciudad")
                            }

                             if(this.e_sector == ""){
                                this.errores.push("ingrese el sector")
                            }

                             if(this.e_fecha == ""){
                                this.errores.push("ingrese la fecha")
                            }

                            
                             if(this.e_email == ""){
                                this.errores.push("ingrese el email")
                            }
                        } 
                    },


                      //--------------------- PAGINACION ---------------------------------------//
                load : function(page) {

                   var url = page !== undefined ?  '/cliente/search/'+this.datosPorPagina+'/'+page : '/cliente/search/'+this.datosPorPagina;
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
                    this.load(page) 
                },

                changeNumberPage :function(page) {
                   this.load(page)
                }

                
                //--------------------- PAGINACION ---------------------------------------//

                    

                }
            }
        );


    </script>
@endsection







