@extends('layouts.admin')
@section('nombre_pagina','Comercio suscripcion')
@section('css')
<link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('titulo de la pagina',' Comercio suscripción')
@section('subtitulo','')

@section('contenido')

    <div class="col-md-12" id="creacionProveedores">
        
        <div class="tile">
           
            <button class="btn btn-primary btn-lg btn-block mb-4" @click="crear"> Agregar suscripción</button>
            <input type="text" class="form-control" v-model="consulta" v-on:keyup.13="consultar" placeholder="Ingrese el nombre de la [] a consultar y presione la tecla enter"><br>  

          <div class="table-responsive">
              <table class="table table-striped" id="">
                <thead>
                  <tr>
                    <th>COMERCIO</th>
                    <th>FECHA INICIO</th>
                    <th>FECHA FIN</th>
                    <th>AÑOS CONTRATADOS</th>
                    <th>ESTADO</th>
                    <th colspan="3">ACCIONES</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for = "dato in tabla">
                    <td>@{{dato.big_cs_idComercio}}</td>
                    <td>@{{dato.fch_cs_fechaInicioSuscripcion}}</td>
                    <td>@{{dato.fch_cs_fechaFinSuscripcion}}</td>
                    <td>@{{dato.int_cs_aniosContratados}}</td>
                    <td>@{{dato.var_cl_estado}}</td>
                    
                    <td>
                          <button class="btn btn-primary"  @click="editar(big_cs_idComercioSuscripcion)" ><i class="fa fa-pencil-square-o 2x-fa" aria-hidden="true"></i></button>
                    </td>
                    <td>
                        <button class="btn btn-info" @click="ver(big_cs_idComercioSuscripcion)"><i class="fa fa-eye" aria-hidden="true"></i></button>
                    </td>
                    <td>
                        <button class="btn btn-danger"  @click="eliminar(big_cs_idComercioSuscripcion)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    </td>
                  </tr>

                </tbody>
              </table>

          </div>
            
          
           <div id="crear" class="modal fade" role="dialog" >
             <div class="modal-dialog modal-lg">
                <div class="col-lg-12">
                    <div class="bs-component">
                        <div class="modal" style="position: relative; top: auto; right: auto; left: auto; bottom: auto; z-index: 1; display: block;">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Creación de suscripción</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                       
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Comercio:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                                <select class="form-control" v-model="comercio">
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Piso local:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                                                    <select class="form-control" v-model="piso_local">
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>
                                            
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Fecha inicio subscripción:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="date" name="id" v-model="fecha_suscripcion" maxlength="20">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Años contratado:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="number" name="id" v-model="años_contratado" maxlength="20">
                                            </div>
                                        </div>
                                        
                                                        
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Fecha fin suscripción :</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="date" name="id" v-model="fecha_fin_suscripcion" maxlength="20">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Días alerta fin suscripción:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="date" name="id" v-model="alerta" maxlength="20">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Activo:</label>
                                            </div>
                                            <div class="col-md-6 "> 
                                                <select class="form-control" v-model="activo" >
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Tipo condición:</label>
                                            </div>
                                            <div class="col-md-6 ">

                                            <select class="form-control" v-model="condicion" >
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Valor condición:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                                <input type="number" class="form-control" v-model="valor_condicion">
                                            </div>
                                        </div>  

                                         <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Login:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                                <input type="text" class="form-control" v-model="login">
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
        </div>
        </div>

                 {{-- crear  --}}
        
       
    

      



      {{-- ver  --}}
         <div id="ver" class="modal fade" role="dialog" >
            
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
                                                <label for="nombre">comercio:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                                <input  class="form-control" v-model="v_comercio" type="text">

                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">piso local:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                                <input  class="form-control" v-model="v_piso_local" type="text">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Fecha inicio subscripcion:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="date" name="id" v-model="v_fecha_suscripcion" maxlength="20">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Años contratado:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="number" name="id" v-model="v_años_contratado" maxlength="20">
                                            </div>
                                        </div>
                                        
                                                        
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Fecha fin suscripción :</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="date" name="id" v-model="v_fecha_fin_suscripcion" maxlength="20">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Días alerta fin suscripcion:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="date" name="id" v-model="v_alerta" maxlength="20">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Activo:</label>
                                            </div>
                                            <div class="col-md-6 "> 
                                                <input class="form-control" type="text"  v-model="v_activo" maxlength="20">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Tipo condición:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="text" name="id" v-model="v_condicion" maxlength="20">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Valor condición:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                                <input class="form-control" type="text" name="id" v-model="v_valor_condicion" maxlength="20">
                                               
                                            
                                            </div>
                                        </div>  
                   
                                    </div>
                                   
                                </div>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            {{-- editar  --}}
         <div id="editar" class="modal fade" role="dialog" >
            
            <div class="modal-dialog modal-lg">
                <div class="col-lg-12">
                    <div class="bs-component">
                        <div class="modal" style="position: relative; top: auto; right: auto; left: auto; bottom: auto; z-index: 1; display: block;">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edición de suscripcion prodcuto</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                               

                                           <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">comercio:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                                <select class="form-control" v-model="e_comercio">
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">piso local:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                                                    <select class="form-control" v-model="e_piso_local">
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>
                                            
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Fecha inicio subscripcion:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="date" name="id" v-model="e_fecha_suscripcion" maxlength="20">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Años contratado:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="number" name="id" v-model="e_años_contratado" maxlength="20">
                                            </div>
                                        </div>
                                        
                                                        
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Fecha fin suscripción :</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="date" name="id" v-model="e_fecha_fin_suscripcion" maxlength="20">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Dias alerta fin suscripcion:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="date" name="id" v-model="e_alerta" maxlength="20">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Activo:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                                <select class="form-control" v-model="e_activo" >
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>
                                            </div>
                                            </div>
                                        

                                       <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Tipo condición:</label>
                                            </div>
                                            <div class="col-md-6 ">

                                            <select class="form-control" v-model="e_condicion" >
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Valor condición:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                                <input type="number" class="form-control" v-model="valor_condicion">
                                            </div>
                                        </div>  

                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="nombre">Login:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                                <input type="text" class="form-control" v-model="e_login">
                                            </div>
                                        </div>  
                          
                                  
                                                
                                       
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" type="button" v-on:click="actualizar">Actualizar</button>
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
         <div id="crear" class="modal fade" role="dialog" >
            
            <div class="modal-dialog modal-lg">
                <div class="col-lg-12">
                    <div class="bs-component">
                        <div class="modal" style="position: relative; top: auto; right: auto; left: auto; bottom: auto; z-index: 1; display: block;">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edición de suscripcion prodcuto</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                               

                                           <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="nombre">comercio:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                                <select class="form-control" v-model="comercio">
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="nombre">piso local:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                                                    <select class="form-control" v-model="piso_local">
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>
                                            
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="nombre">Fecha inicio subscripcion:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="date" name="id" v-model="fecha_suscripcion" maxlength="20">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="nombre">Años contratado:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="number" name="id" v-model="años_contratado" maxlength="20">
                                            </div>
                                        </div>
                                        
                                                        
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="nombre">Fecha fin suscripción :</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="date" name="id" v-model="fecha_fin_suscripcion" maxlength="20">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="nombre">Dias alerta fin suscripcion:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="date" name="id" v-model="alerta" maxlength="20">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="nombre">Activo:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="text" name="id" v-model="activo" maxlength="20">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="nombre">Tipo condición:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="text" name="id" v-model="condicion" maxlength="20">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="nombre">Valor condición:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="number" name="id" v-model="valor_condicion" maxlength="20">
                                            </div>
                                        </div>              
                                  
                                                
                                       
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary"  type="button" v-on:click="actualizar">Actualizar</button>
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
                                       <h4>¿ ESTA SEGURO QUE DESEA ELIMINAR EL PRODUCTO ?</h4>
                                        <button class="btn btn-danger"  type="button" v-on:click="actualizar">Eliminar</button>
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
       
    </script>
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>


    <script>
        var app = new Vue ({
                el:"#creacionProveedores",
                data: {
                    comercio: '',
                    piso_local : '',
                    fecha_suscripcion : '',
                    años_contratado : '',
                   fecha_fin_suscripcion : '',
                   alerta: '',
                    activo : '',
                    condicion : '',
                    valor_condicion : '',
                    login :'',
                    estado : '',

                    datos_editar : [],
                    e_id : '',
                     e_comercio: '',
                    e_piso_local : '',
                    e_fecha_suscripcion : '',
                    e_años_contratado : '',
                   e_fecha_fin_suscripcion : '',
                   e_alerta: '',
                    e_activo : '',
                    e_condicion : '',
                    e_valor_condicion : '',
                    e_login : '',
                    e_estado : '',

                    datos_ver : [],
                    v_id : '',
                    v_comercio: '',
                    v_piso_local : '',
                    v_fecha_suscripcion : '',
                    v_años_contratado : '',
                   v_fecha_fin_suscripcion : '',
                   v_alerta: '',
                    v_activo : '',
                    v_condicion : '',
                    v_valor_condicion : '',
                    v_estado : '',

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
                correcto : 0,
                    


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

                
                   eliminar : function (id) {
                       this.selecionado = id
                       $("#eliminar").modal('show');
                   },


                   crear : function (id) {
                       $("#crear").modal('show');
                   },
                   
                   
                   editar : function (id) {
                          var url = '/comercio/subscripcion/consult/'+id
                        axios.get(url).then(response => {
                             this.datos_editar = response.data 
                                this.e_id = datos[0].big_cs_idComercioSuscripcion
                                this.e_comercio= datos[0].big_cs_idComercio
                                this.e_piso_local = datos[0].big_cs_idComercio
                                this.e_fecha_suscripcion = datos[0].fch_cs_fechaInicioSuscripcion
                                this.e_años_contratado = datos[0].int_cs_aniosContratados
                                this.e_fecha_fin_suscripcion = datos[0].fch_cs_fechaFinSuscripcion
                                this.e_alerta= datos[0].int_cs_diasAlertasFinSuscripcion
                                this.e_activo = datos[0].bit_cs_activo
                                this.e_condicion = datos[0].var_cs_tipoComision
                                this.e_valor_condicion = datos[0].mon_cs_valorComision
                                this.e_estado = datos[0].var_cl_estado
                            
                        }).catch(error => {
                            toastr.error("Error al consultar los datos.")
                            
                         });
                       $("#editar").modal('show');

                   },

                    ver : function (id) {
                       $("#ver").modal('show');
                        var url = '/comercio/subscripcion/consult/'+id
                        axios.get(url).then(response => {
                             this.datos_ver = response.data 
                                this.v_id = datos[0].big_cs_idComercioSuscripcion
                                this.v_comercio= datos[0].big_cs_idComercio
                                this.v_piso_local = datos[0].big_cs_idComercio
                                this.v_fecha_suscripcion = datos[0].fch_cs_fechaInicioSuscripcion
                                this.v_años_contratado = datos[0].int_cs_aniosContratados
                                this.v_fecha_fin_suscripcion = datos[0].fch_cs_fechaFinSuscripcion
                                this.v_alerta= datos[0].int_cs_diasAlertasFinSuscripcion
                                this.v_activo = datos[0].bit_cs_activo
                                this.v_condicion = datos[0].var_cs_tipoComision
                                this.v_valor_condicion = datos[0].mon_cs_valorComision
                                this.v_estado = datos[0].var_cl_estado
                            
                        }).catch(error => {
                            toastr.error("Error al consultar los datos.")
                            
                         });
                   },


                   suprimir : function(){
                       var url = '/comercio/subscripcion/delete';
                            axios.post(url, {
                            big_cs_idComercioSuscripcion : this.selecionado

                            }).then(response => {
                                if(response.data == this.correcto){
                                    toastr.success("Registro eleminado con exito.")
                                }else {
                                     toastr.success("Error al eliminar el registro.")
                                }
                            }).catch(error => {
                                    console.log(error);
                            });
                   },
  
                   // validaciones
                    validarCampos : function() {
                       
                    },

                    espaciosBlanco : function() {

                    },

                     guardar : function(){
                      this.espaciosBlanco();
                      this.validarCampos();

                      if(this.errores.length == 0){
                          
                            var url = '/comercio/subscripcion/store';
                            axios.post(url, {
                            big_cs_idComercio : this.comercio,
                            big_cs_idComercioPisoLocal : this.piso_local,
                            fch_cs_fechaInicioSuscripcion : this.fecha_suscripcion,
                            int_cs_aniosContratados : this.años_contratado,
                            fch_cs_fechaFinSuscripcion : this.fecha_suscripcion,
                            int_cs_diasAlertasFinSuscripcion : this.alerta,
                            bit_cs_activo : this.activo,
                            var_cs_tipoComision : this.condicion,
                            mon_cs_vañprComision : this.valor_condicion,
                            var_lg_login : this.login,

                            }).then(response => {
                             if(response.data == this.correcto){
                                    toastr.success("Registro guardado con exito.")
                                     $("#crear").modal('hide');
                                     this.limpiar();

                                }else {
                                     toastr.error("Error al guardar el registro.")
                                }
                            
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
                          
                           var url = '/comercio/subscripcion/update';
                            axios.post(url, {
                                
                            big_cs_idComercioSuscripcion : this.e_id,    
                            big_cs_idComercio : this.e_comercio,
                            big_cs_idComercioPisoLocal : this.e_piso_local,
                            fch_cs_fechaInicioSuscripcion : this.e_fecha_suscripcion,
                            int_cs_aniosContratados : this.e_años_contratado,
                            fch_cs_fechaFinSuscripcion : this.e_fecha_suscripcion,
                            int_cs_diasAlertasFinSuscripcion : this.e_alerta,
                            bit_cs_activo : this.e_activo,
                            var_cs_tipoComision : this.e_condicion,
                            mon_cs_valorComision : this.e_valor_condicion,
                            var_lg_login : this.e_login,


                            }).then(response => {
                                
                                if(response.data == this.correcto){
                                     toastr.success("registro actualizado con exito")
                                     this.limpiar();
                                     $("#editar").modal('hide');
                                }else {
                                    toastr.error("Ha ocurrido un error al actualizar el  comercio")
                                }
                            }).catch(error => {
                                    toastr.error("Ha ocurrido un error al actualizar el  comercio")
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


                   if(page !== undefined && consulta !== undefined){
                        // 1 1
                        var url = '/comercio/subscripcion/search/'+this.datosPorPagina+'/'+page+'/'+consulta
                   }else if(page !== undefined && consulta == undefined )
                   {
                     // 1 0
                      var url = '/comercio/subscripcion/search/'+this.datosPorPagina+'/'+page;
                   }else if(page == undefined && consulta !== undefined){
                        
                        var url = '/comercio/subscripcion/search/'+this.datosPorPagina+'/'+0+'/'+consulta;
                   }else if(page == undefined && consulta == undefined ){
                     // 0 0
                     var url = '/comercio/subscripcion/search/'+this.datosPorPagina
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







