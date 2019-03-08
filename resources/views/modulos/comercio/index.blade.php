@extends('layouts.admin')
@section('nombre_pagina','Comercio')
@section('css')
<link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('titulo de la pagina',' Comercio')
@section('subtitulo','')

@section('contenido')

    <div class="col-md-12" id="creacionProveedores">
        
       <div class="tile">
            <button class="btn btn-primary btn-lg btn-block mb-4" @click="crear"> Agregar comercio</button>
            <input type="text" class="form-control" v-model="consulta" v-on:keyup.13="consultar" placeholder="Ingrese el nombre del comercio a consultar y presione la tecla enter"><br>  

            <div class="table-responsive">

                 <table class="table table-striped" >
                <thead>
                  <tr>
                    <th>NOMBRE COMERCIO</th>
                    <th>RAZÓN SOCIAL</th>
                    <th>RUC</th>
                    <th>REPRESENTANTE LEGAL</th>
                    <th>IDENTIFICACIÓN</th>
                    <th>TIPO COMERCIO</th>
                    <th colspan="3">ACCIONES</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="dato in tabla">
                     <td>@{{dato.var_co_nombreComercio}}</td>
                    <td>@{{dato.var_co_razonSocial}}</td>
                    <td>@{{dato.var_co_ruc}}</td>
                    <td>@{{dato.var_co_representanteLegal}}</td>
                    <td>@{{dato.var_co_identificacionRepresentanteLegal}}</td>
                    <td>@{{dato.var_co_tipoComercio}}</td>
                    <td>
                       <button class="btn btn-primary"  @click="editar(dato.big_co_idComercio)" ><i class="fa fa-pencil-square-o 2x-fa" aria-hidden="true"></i></button>
                    </td>
                    <td>
                        <button class="btn btn-info" @click="ver(dato.big_co_idComercio)"><i class="fa fa-eye" aria-hidden="true"></i></button>
                    </td>
                    <td>
                        <button class="btn btn-danger"  @click="eliminar(dato.big_co_idComercio)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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
       




         <!-- Modal crear -->
  <div class="modal fade"  role="dialog" id="crear">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
          <h4 class="modal-title">Crear comercio</h4>
        </div>
        <div class="modal-body">
           <div class="col-md-12" >
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">Nombre:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                    <input class="form-control" type="text" name="nombre" v-model="nombre" maxlength="20">
                                                </div>
                                                  <div class="col-md-2">
                                                    <label for="nombre">Razón social:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                <input class="form-control" type="text" name="razon" v-model="razon" maxlength="20">
                                                </div>
                                            </div>

                                            
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">Ruc:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                <input class="form-control" type="text" name="ruc" v-model="ruc" maxlength="20">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="nombre">Representante legal:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                <input class="form-control" type="text" name="representante" v-model="representante" maxlength="20">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">Identificacion representante legal:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                <input class="form-control" type="text" name="representante_ci" v-model="representante_ci" maxlength="20">
                                                </div>

                                                <div class="col-md-2">
                                                    <label for="nombre"> Fecha de creación:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                <input class="form-control" type="date" name="fecha" v-model="fecha" maxlength="20">
                                                </div>
                                            </div>

                                          
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">Dirección:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                <input class="form-control" type="text" name="direccion" v-model="direccion" maxlength="20">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="nombre">Ciudad:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                    <select class="form-control"  v-model="ciudad" >
                                                        <option>guayaquil</option>
                                                        <option>quito</option>
                                                    </select>
                                                </div>
                                            </div>
                                        
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">Sector:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                    <select class="form-control"  v-model="sector" >
                                                        <option>sur</option>
                                                        <option>norte</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="nombre">Nombre del gerente:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                <input class="form-control" type="text" name="nombre_gerente" v-model="nombre_gerente" maxlength="20">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">Identificacion del gerente:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                <input class="form-control" type="text" name="gerente_ci" v-model="gerente_ci" maxlength="20">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="nombre">Tipo Comercio:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                <select class="form-control"  v-model="tipo_comercio" >
                                                        <option>ejemplo1</option>
                                                        <option>ejmeplo 2</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">Email:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                <input class="form-control" type="email" name="email" v-model="email" maxlength="20">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="nombre">Teléfono:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                <input class="form-control" type="telf" name="telefono" v-model="telefono" maxlength="20">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">Mio:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                    <select class="form-control"  v-model="mio" >
                                                        <option>si</option>
                                                        <option>no</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-2">
                                                    <label for="nombre">Estado:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                    <select class="form-control"  v-model="estado" >
                                                        <option>si</option>
                                                        <option>no</option>
                                                    </select>
                                                </div>

                                            </div>

                                           <div class="form-group row">
                                               <div class="col-md-2">
                                                   <label for="nombre"> Login</label>
                                               </div>
                                               <div class="col-md-4 ">
                                                   <input class="form-control" type="text" v-model="login" >
                                               </div>

                                               <div class="col-md-2">
                                                   <label for="nombre">Password:</label>
                                               </div>
                                               <div class="col-md-4 ">
                                                   <input class="form-control" type="password" v-model="pass" >
                                               </div>
                                           </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" @click="guardar" > Guardar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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
          <h4 class="modal-title">Editar comercio</h4>
        </div>
        <div class="modal-body">
           <div class="col-md-12" >
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">Nombre:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                    <input class="form-control" type="text" name="nombre" v-model="e_nombre" maxlength="20">
                                                </div>
                                                  <div class="col-md-2">
                                                    <label for="nombre">Razon social:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                <input class="form-control" type="text" name="razon" v-model="e_razon" maxlength="20">
                                                </div>
                                            </div>

                                            
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">Ruc:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                <input class="form-control" type="text" name="ruc" v-model="e_ruc" maxlength="20">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="nombre">Representante legal:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                <input class="form-control" type="text" name="representante" v-model="e_representante" maxlength="20">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">Identificación Representante legal:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                <input class="form-control" type="text" name="representante_ci" v-model="e_representante_ci" maxlength="20">
                                                </div>

                                                <div class="col-md-2">
                                                    <label for="nombre"> Fecha de creación:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                <input class="form-control" type="date" name="fecha" v-model="e_fecha" maxlength="20">
                                                </div>
                                            </div>

                                          
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">Dirección:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                <input class="form-control" type="text" name="direccion" v-model="e_direccion" maxlength="20">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="nombre">Ciudad:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                    <select class="form-control"  v-model="e_ciudad" >
                                                        <option>guayaquil</option>
                                                        <option>quito</option>
                                                    </select>
                                                </div>
                                            </div>
                                        
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">Sector:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                    <select class="form-control"  v-model="e_sector" >
                                                        <option>sur</option>
                                                        <option>norte</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="nombre">Nombre del gerente:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                <input class="form-control" type="text" name="nombre_gerente" v-model="e_nombre_gerente" maxlength="20">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">Identificación del gerente:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                <input class="form-control" type="text" name="gerente_ci" v-model="e_gerente_ci" maxlength="20">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="nombre">Tipo Comercio:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                <select class="form-control"  v-model="e_tipo_comercio" >
                                                        <option>ejemplo1</option>
                                                        <option>ejmeplo 2</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">Email:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                <input class="form-control" type="text" name="email" v-model="e_email" maxlength="20">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="nombre">Teléfono:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                <input class="form-control" type="text" name="telefono" v-model="e_telefono" maxlength="20">
                                                </div>
                                            </div>
                                            
                                           

                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">Mio:</label>
                                                </div>
                                                <div class="col-md-10 ">
                                                    <select class="form-control"  v-model="e_mio" >
                                                        <option>si</option>
                                                        <option>no</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="nombre">Estado:</label>
                                                </div>
                                               <div class="col-md-4 ">
                                                   <select class="form-control"  v-model="e_estado" >
                                                       <option>si</option>
                                                       <option>no</option>
                                                   </select>
                                               </div>
                                            </div>

                                               <div class="form-group row">
                                                   <div class="col-md-2">
                                                       <label for="nombre"> Login</label>
                                                   </div>
                                                   <div class="col-md-4 ">
                                                       <input class="form-control" type="text" v-model="e_login" >
                                                   </div>

                                                   <div class="col-md-2">
                                                       <label for="nombre">Password:</label>
                                                   </div>
                                                   <div class="col-md-4 ">
                                                       <input class="form-control" type="password" v-model="e_pass" >
                                                   </div>
                                               </div>



           </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" @click="actualizar">Actualizar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

     <!-- Modal ver -->
  <div class="modal fade"  role="dialog" id="ver">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
          <h4 class="modal-title">Ver comercio</h4>
        </div>
        <div class="modal-body">
           <div class="col-md-12" >
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">Nombre:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                    <input class="form-control" type="text" name="nombre" v-model="v_nombre" maxlength="20">
                                                </div>
                                                  <div class="col-md-2">
                                                    <label for="nombre">Razon social:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                <input class="form-control" type="text" name="razon" v-model="v_razon" maxlength="20">
                                                </div>
                                            </div>

                                            
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">Ruc:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                <input class="form-control" type="text" name="ruc" v-model="v_ruc" maxlength="20">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="nombre">Representante legal:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                <input class="form-control" type="text" name="representante" v-model="v_representante" maxlength="20">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">Identificacion Representante legal:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                <input class="form-control" type="text" name="representante_ci" v-model="v_representante_ci" maxlength="20">
                                                </div>

                                                <div class="col-md-2">
                                                    <label for="nombre"> Fecha de creación:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                <input class="form-control" type="date" name="fecha" v-model="v_fecha" maxlength="20">
                                                </div>
                                            </div>

                                          
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">Direccion:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                <input class="form-control" type="text" name="direccion" v-model="v_direccion" maxlength="20">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="nombre">Ciudad:</label>
                                                </div>
                                                
                                                <div class="col-md-4 ">
                                                    <input class="form-control" type="text" v-model="v_ciudad">    
                                                </div>
                                            </div>
                                        
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">Sector:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                    <input class="form-control" type="text" v-model="v_sector">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="nombre">Nombre del gerente:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                <input class="form-control" type="text" name="nombre_gerente" v-model="v_nombre_gerente" maxlength="20">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">Identificacion del gerente:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                <input class="form-control" type="text" name="gerente_ci" v-model="v_gerente_ci" maxlength="20">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="nombre">Tipo Comercio:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                    <input class="form-control" type="text"  v-model="v_tipo_comercio" maxlength="20">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">Email:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                <input class="form-control" type="text" name="email" v-model="v_email" maxlength="20">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="nombre">Telefono:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                <input class="form-control" type="text" name="telefono" v-model="v_telefono" maxlength="20">
                                                </div>
                                            </div>
                                            
                                           

                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">Mio:</label>
                                                </div>
                                                <div class="col-md-10 ">
                                                    <input class="form-control" type="text"  v-model="v_mio" maxlength="20">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="nombre">Estado:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                    <input class="form-control" type="text" v-model="v_estado" >
                                                </div>
                                            </div>
           </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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
                                       <h4>¿ ESTA SEGURO QUE DESEA ELIMINAR EL COMERCIO ?</h4>
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
  

       
    </div>
    
@endsection
@section('js')


    <script>
        var app = new Vue ({
                el:"#creacionProveedores",
                data: {
                    nombre: '',
                    ruc : '',
                    razon : '',
                    representante : '',
                    representante_ci : '',
                   identificacion : '',
                   fecha: '',
                    direccion : '',
                    ciudad : '',
                    sector : '',
                    nombre_gerente : '',
                    gerente_ci : '',
                    tipo_comercio : '',
                    email:'',
                    telefono: '',
                    mio: '',
                    login : '',
                    pass : '',

                    datos_editar : '',
                    e_id : '',
                    e_nombre: '',
                    e_ruc : '',
                    e_razon : '',
                    e_representante : '',
                    e_representante_ci : '',
                    e_identificacion : '',
                    e_fecha: '',
                    e_direccion : '',
                    e_ciudad : '',
                    e_sector : '',
                    e_nombre_gerente : '',
                    e_gerente_ci : '',
                    e_tipo_comercio : '',
                    e_email:'',
                    e_telefono: '',
                    e_mio: '',
                    e_login : '',
                    e_pass : '',

                    ver_datos : '',
                    v_id : '',
                    v_nombre: '',
                    v_ruc : '',
                    v_razon : '',
                    v_representante : '',
                    v_representante_ci : '',
                    v_identificacion : '',
                    v_fecha: '',
                    v_direccion : '',
                    v_ciudad : '',
                    v_sector : '',
                    v_nombre_gerente : '',
                    v_gerente_ci : '',
                    v_tipo_comercio : '',
                    v_email:'',
                    v_telefono: '',
                    v_mio: '',




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

                 // validar

                 validarCampos : function (tipo) {

                     if(tipo == 'g'){

                        if(this.nombre == ''){
                            this.errores.push("El campo nombre no puede estar en vacio")
                        }
                        if(this.ruc == ''){
                            this.errores.push("El campo ruc no puede estar en vacio")
                        }
                        if(this.razon == ''){
                            this.errores.push("El campo razón no puede estar en vacio")
                        }
                        if(this.representante == ''){
                            this.errores.push("El campo representante legal no puede estar en vacio")
                        }
                        if(this.representante_ci == ''){
                            this.errores.push("El campo identificación del representante  no puede estar en vacio")
                        }
                        if(this.identificacion == ''){
                            this.errores.push("El campo nombre no puede estar en vacio")
                        }
                        if(this.fecha == ''){
                            this.errores.push("El campo fecha no puede estar en vacio")
                        }
                        if(this.direccion == ''){
                            this.errores.push("El campo dirección no puede estar en vacio")
                        }
                        if(this.ciudad == ''){
                            this.errores.push("El campo ciudad no puede estar en vacio")
                        }
                        if(this.sector == ''){
                            this.errores.push("El campo sector no puede estar en vacio")
                        }
                        if(this.nombre_gerente == ''){
                            this.errores.push("El campo nombre del gerente no puede estar en vacio")
                        }
                        if(this.gerente_ci == ''){
                            this.errores.push("El campo nombre identificación del gerente puede estar en vacio")
                        }
                        if(this.tipo_comercio == ''){
                            this.errores.push("El campo tipo de comercio no puede estar en vacio")
                        }
                        if(this.email == ''){
                            this.errores.push("El campo email no puede estar en vacio")
                        }
                        if(this.telefono == ''){
                            this.errores.push("El campo telefono no puede estar en vacio")
                        }
                        if(this.mio == ''){
                            this.errores.push("El campo mio no puede estar en vacio")
                        }
                     }else {
                         if(this.e_nombre == ''){
                            this.errores.push("El campo nombre no puede estar en vacio")
                        }
                        if(this.e_ruc == ''){
                            this.errores.push("El campo ruc no puede estar en vacio")
                        }
                        if(this.e_razon == ''){
                            this.errores.push("El campo razón no puede estar en vacio")
                        }
                        if(this.e_representante == ''){
                            this.errores.push("El campo representante legal no puede estar en vacio")
                        }
                        if(this.e_representante_ci == ''){
                            this.errores.push("El campo identificación del representante  no puede estar en vacio")
                        }
                        if(this.e_identificacion == ''){
                            this.errores.push("El campo nombre no puede estar en vacio")
                        }
                        if(this.e_fecha == ''){
                            this.errores.push("El campo fecha no puede estar en vacio")
                        }
                        if(this.e_direccion == ''){
                            this.errores.push("El campo dirección no puede estar en vacio")
                        }
                        if(this.e_ciudad == ''){
                            this.errores.push("El campo ciudad no puede estar en vacio")
                        }
                        if(this.sector == ''){
                            this.errores.push("El campo sector no puede estar en vacio")
                        }
                        if(this.nombre_gerente == ''){
                            this.errores.push("El campo nombre del gerente no puede estar en vacio")
                        }
                        if(this.gerente_ci == ''){
                            this.errores.push("El campo nombre identificación del gerente puede estar en vacio")
                        }
                        if(this.tipo_comercio == ''){
                            this.errores.push("El campo tipo de comercio no puede estar en vacio")
                        }
                        if(this.e_email == ''){
                            this.errores.push("El campo email no puede estar en vacio")
                        }
                        if(this.e_telefono == ''){
                            this.errores.push("El campo telefono no puede estar en vacio")
                        }
                        if(this.e_mio == ''){
                            this.errores.push("El campo mio no puede estar en vacio")
                        }
                     }


                   
                   
                   
                 },

                 // metodos 

                 
                   eliminar : function (id) {
                       $("#eliminar").modal('show');
                   },

                  
                   ver : function (id) {
                           var url = '/comercio/consult/'+id
                        axios.get(url).then(response => {
                            
                            this.datos_ver = response.data
                            this.v_id = data[0].big_co_idComercio
                            this.v_nombre= data[0].var_co_nombreComercio
                            this.v_ruc = data[0].var_co_ruc
                            this.v_razon = data[0].var_co_razonSocial
                            this.v_representante = data[0].var_co_representanteLegal
                            this.v_representante_ci = data[0].var_co_identificacionRepresentanteLegal
                            
                            this.v_fecha= data[0].var_co_fechaCreacion
                            this.v_direccion = data[0].var_co_direccion
                            this.v_ciudad = data[0].var_co_ciudad
                            this.v_sector = data[0].var_co_sector
                            this.v_nombre_gerente = data[0].var_co_nombreGerente
                            this.v_gerente_ci = data[0].var_co_identificacionGerente
                            this.v_tipo_comercio = data[0].var_co_tipoComercio
                            this.v_email=data[0].var_co_email
                            this.v_telefono= data[0].var_co_telefono
                            this.v_mio= data[0].var_co_esMio
                            
                         
                            
                        }).catch(error => {
                            toastr.error("Error al consultar los datos.")
                            
                         });
                        
                       $("#ver").modal('show');
                   },

                   crear : function () {
                       $("#crear").modal('show');
                   },
                   
                   
                   editar : function (id) {

                             var url = '/comercio/consult/'+id
                        axios.get(url).then(response => {
                            
                             this.datos_editar = response.data
                            this.e_id = datos_editar[0].big_co_idComercio
                            this.e_nombre= datos_editar[0].var_co_nombreComercio
                            this.e_ruc = datos_editar[0].var_co_ruc
                            this.e_razon = datos_editar[0].var_co_razonSocial
                            this.e_representante = datos_editar[0].var_co_representanteLegal
                            this.e_representante_ci = datos_editar[0].var_co_identificacionRepresentanteLegal
                            
                            this.e_fecha= datos_editar[0].var_co_fechaCreacion
                            this.e_direccion = datos_editar[0].var_co_direccion
                            this.e_ciudad = datos_editar[0].var_co_ciudad
                            this.e_sector = datos_editar[0].var_co_sector
                            this.e_nombre_gerente = datos_editar[0].var_co_nombreGerente
                            this.e_gerente_ci = datos_editar[0].var_co_identificacionGerente
                            this.e_tipo_comercio = datos_editar[0].var_co_tipoComercio
                            this.e_email=datos_editar[0].var_co_email
                            this.e_telefono= datos_editar[0].var_co_telefono
                            this.e_mio= datos_editar[0].var_co_esMio
                            
                         
                            
                        }).catch(error => {
                            toastr.error("Error al consultar los datos.")
                            
                         });
                            
                           

                       $("#editar").modal('show');
                   },

                   suprimir : function() {
                        var url = '/comercio/delete';
                            axios.post(url, {
                              big_co_idComercio : this.e_id,     
                            }).then(response => {
                                toastr.success("registro eliminado con exito")
                                if(response.data == this.correcto){
                                      toastr.success("registro eliminado con exito")
                                     
                                     $("#crear").modal('hide');
                                }else {
                                    toastr.error("ha ocurrido un error a eliminar el registro")
                                }
                            }).catch(error => {
                                    console.log(error);
                               toastr.error("ha ocurrido un error a eliminar el registro")
                               console.log(error)     
                            });
                   },


                   guardar : function(){
                      this.espaciosBlanco();
                      this.validarCampos("g");

                      if(this.errores.length == 0){
                          
                            var url = '/comercio/store';
                            axios.post(url, {
                                
                           var_co_nombreComercio : this.nombre,
                            var_co_ruc: this.ruc,
                            var_co_razonSocial : this.razon,
                            var_co_representanteLegal : this.representante,
                            var_co_representante_identificacionRepresentanteLocal : this.representante_ci,    
                            var_co_fechaCreacion : this.fecha,
                            var_co_direccion: this.direccion,
                            var_co_ciudad: this.ciudad,
                            var_co_sector: this.sector,
                            var_co_nombreGerente: this.nombre_gerente,
                            var_co_identificacionGerente: this.gerente_ci,
                            var_co_tipoComercio : this.tipo_comercio,
                            var_co_email : this.email,
                            var_co_telefono:this.telefono,
                            var_co_esMio:this.mio,

                            }).then(response => {
                            
                            
                            if(response.data == this.correcto){
                                     toastr.success("registro guardado con exito")
                                     this.limpiar();
                                     $("#crear").modal('hide');
                                }else {
                                    toastr.error("Ha ocurrido un error al crear el  comercio")
                                }
                            this.limpiar();
                            
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
                         this.espaciosBlanco();
                        this.validarCampos("a");

                      if(this.errores.length == 0){
                          
                           var url = 'comercio/update';
                            axios.post(url, {
                           big_co_idComercio : this.e_id,     
                           var_co_nombreComercio : this.e_nombre,
                            var_co_ruc: this.e_ruc,
                            var_co_razonSocial : this.e_razon,
                            var_co_representanteLegal : this.e_representante,
                            var_co_representante_identificacionRepresentanteLocal : this.e_representante_ci,    
                            var_co_fechaCreacion : this.e_fecha,
                            var_co_direccion: this.e_direccion,
                            var_co_ciudad: this.e_ciudad,
                            var_co_sector: this.e_sector,
                            var_co_nombreGerente: this.e_nombre_gerente,
                            var_co_identificacionGerente: this.e_gerente_ci,
                            var_co_tipoComercio : this.e_tipo_comercio,
                            var_co_email : this.e_email,
                            var_co_telefono:this.e_telefono,
                            var_co_esMio:this.e_mio,

                            }).then(response => {
                              if(response.data == this.correcto){
                                     toastr.success("registro actualizado con exito")
                                     this.limpiar();
                                     $("#editar").modal('hide');
                                }else {
                                    toastr.error("Ha ocurrido un error al actualizar el registro")
                                }  
                           
                            
                            
                            }).catch(error => {
                                toastr.error("Ha ocurrido un error al actualizar el registro")
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
                        
                        this.nombre= this.nombre.trim()
                        this.ruc = this.ruc.trim()
                        this.razon = this.razon.trim() 
                        this.representante =  this.representante.trim() 
                        this.representante_ci = this.representante_ci.trim()
                        this.identificacion = this.identificacion.trim() 
                        this.fecha= this.fecha.trim()
                        this.direccion = this.direccion.trim()
                        this.ciudad = this.ciudad.trim()
                        this.sector = this.sector.trim()
                        this.nombre_gerente = this.nombre_gerente.trim()
                        this.gerente_ci = this.gerente_ci.trim() 
                        this.tipo_comercio = this.tipo_comercio.trim() 
                        this.email = this.email.trim()
                        this.telefono = this.telefono.trim()
                        this.mio= this.mio.trim()

                        this.e_id =  this.e_id.trim()
                        this.e_nombre= this.e_nombre.trim()
                        this.e_ruc = this.e_ruc.trim() 
                        this.e_razon = this.e_razon.trim()
                        this.e_representante = this.e_representante.trim()
                        this.e_representante_ci = this.e_representante_ci.trim()
                        this.e_identificacion = this.e_identificacion.trim()
                        this.e_fecha= this.e_fecha.trim()
                        this.e_direccion = this.e_direccion.trim()
                        this.e_ciudad = this.e_ciudad.trim()
                        this.e_sector = this.e_sector.trim()
                        this.e_nombre_gerente = this.e_nombre_gerente.trim()
                        this.e_gerente_ci = this.e_gerente_ci.trim()
                        this.e_tipo_comercio = this.e_tipo_comercio.trim()
                        this.e_email = this.e_email.trim()
                        this.e_telefono = this.e_telefono.trim()
                        this.e_mio= this.e_mio.trim()
                    },
                    
                    limpiar : function() {
                            this.ruc = '';
                             this.cuenta_bancaria ='';
                             this.convencional = '';
                            this.codigo= '';
                            this.empresa = '';
                            this.ruc = 0;
                            this.razon = '';
                            this.representante = '';
                            this.direccion = '';
                            this.banco = '';
                            this.cuenta_bancaria =0;
                            this.estado = '';
                            this.gerente = '';
                            this.convencional = 0;
                            this.telefono_representante=0;
                            this.telefono_gerente=0;
                            this.usuario='';
                            this.pass='';
                            this.errores = [];           

                    } ,




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







