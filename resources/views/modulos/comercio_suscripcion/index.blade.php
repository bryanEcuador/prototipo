@extends('layouts.admin')
@section('nombre_pagina','Comercio suscripcion')
@section('css')
<link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('titulo de la pagina',' Comercio suscripcion')
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
           
            <button class="btn btn-primary btn-lg btn-block mb-4" @click="crear"> Agregar suscripción</button>

          
            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>nombre comercio</th>
                    <th>piso</th>
                    <th>propaganda</th>
                    <th>fecha suscripcion</th>
                    <th>fecha fin suscripcion</th>
                    <th>valor comision</th>
                    <th>acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>nombre comercio</td>
                    <td>piso</td>
                    <td>propaganda</td>
                    <td>fecha suscripcion</td>
                    <td>fecha fin suscripcion</td>
                    <td>valor comision</td>
                    
               
                    <td>
                          <button class="btn btn-primary"  @click="editar" ><i class="fa fa-pencil-square-o 2x-fa" aria-hidden="true"></i></button>
                        <button class="btn btn-info" @click="ver"><i class="fa fa-eye" aria-hidden="true"></i></button>
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
                                        <h5 class="modal-title">Creación de suscripcion</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                       
                                                                                       <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="nombre">comercio:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                                <select class="form-control" v-model="v_comercio">
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
                                                                    <select class="form-control" v-model="v_piso_local">
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
                                            <input class="form-control" type="date" name="id" v-model="v_fecha_suscripcion" maxlength="20">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="nombre">Años contratado:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="number" name="id" v-model="v_años_contratado" maxlength="20">
                                            </div>
                                        </div>
                                        
                                                        
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="nombre">Fecha fin suscripción :</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="date" name="id" v-model="v_fecha_fin_suscripcion" maxlength="20">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="nombre">Dias alerta fin suscripcion:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="date" name="id" v-model="v_alerta" maxlength="20">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="nombre">Activo:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="text" name="id" v-model="v_activo" maxlength="20">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="nombre">Tipo condición:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="text" name="id" v-model="v_condicion" maxlength="20">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="nombre">Valor condición:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="number" name="id" v-model="v_valor_condicion" maxlength="20">
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


    </div>

      {{-- ver  --}}
         <div id="ver" class="modal fade" role="dialog" >
            
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
                                                <select class="form-control" v-model="v_comercio">
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
                                                                    <select class="form-control" v-model="v_piso_local">
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
                                            <input class="form-control" type="date" name="id" v-model="v_fecha_suscripcion" maxlength="20">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="nombre">Años contratado:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="number" name="id" v-model="v_años_contratado" maxlength="20">
                                            </div>
                                        </div>
                                        
                                                        
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="nombre">Fecha fin suscripción :</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="date" name="id" v-model="v_fecha_fin_suscripcion" maxlength="20">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="nombre">Dias alerta fin suscripcion:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="date" name="id" v-model="v_alerta" maxlength="20">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="nombre">Activo:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="text" name="id" v-model="v_activo" maxlength="20">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="nombre">Tipo condición:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="text" name="id" v-model="v_condicion" maxlength="20">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="nombre">Valor condición:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="number" name="id" v-model="v_valor_condicion" maxlength="20">
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
                                            <div class="col-md-2">
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
                                            <div class="col-md-2">
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
                                            <div class="col-md-2">
                                                <label for="nombre">Fecha inicio subscripcion:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="date" name="id" v-model="e_fecha_suscripcion" maxlength="20">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="nombre">Años contratado:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="number" name="id" v-model="e_años_contratado" maxlength="20">
                                            </div>
                                        </div>
                                        
                                                        
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="nombre">Fecha fin suscripción :</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="date" name="id" v-model="e_fecha_fin_suscripcion" maxlength="20">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="nombre">Dias alerta fin suscripcion:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="date" name="id" v-model="e_alerta" maxlength="20">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="nombre">Activo:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="text" name="id" v-model="e_activo" maxlength="20">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="nombre">Tipo condición:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="text" name="id" v-model="e_condicion" maxlength="20">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="nombre">Valor condición:</label>
                                            </div>
                                            <div class="col-md-6 ">
                                            <input class="form-control" type="number" name="id" v-model="e_valor_condicion" maxlength="20">
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
        $(document).ready(function(){
                $("#estado").val(1);
        });
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

                     e_comercio: '',
                    e_piso_local : '',
                    e_fecha_suscripcion : '',
                    e_años_contratado : '',
                   e_fecha_fin_suscripcion : '',
                   e_alerta: '',
                    e_activo : '',
                    e_condicion : '',
                    e_valor_condicion : '',


                    v_comercio: '',
                    v_piso_local : '',
                    v_fecha_suscripcion : '',
                    v_años_contratado : '',
                   v_fecha_fin_suscripcion : '',
                   v_alerta: '',
                    v_activo : '',
                    v_condicion : '',
                    v_valor_condicion : '',



                 
              
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
  
                   // validaciones
                    validarCampos : function() {
                       
                    },

                     guardar : function(){
                      //this.espaciosBlanco();
                      //this.validarCampos();

                      if(this.errores.length == 0){
                          
                            var url = 'comercio/subscripcion/store';
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
                          
                           var url = 'comercio/subscripcion/update';
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







