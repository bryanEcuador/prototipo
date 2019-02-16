@extends('layouts.admin')
@section('nombre_pagina','Comercio')
@section('css')
<link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('titulo de la pagina',' Comercio')
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
                    <button class="btn btn-primary btn-lg btn-block mb-4" @click="crear"> Agregar comercio</button>

            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>nombre comercio</th>
                    <th>razon social</th>
                    <th>ruc</th>
                    <th>representante legal</th>
                    <th>identificacion representante</th>
                    <th>tipo comercio</th>
                   
     
                    <th>Accioes</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                     <td>nombre comercio</td>
                    <td>razon social</td>
                    <td>ruc</td>
                    <td>representante legal</td>
                    <td>identificacion representante</td>
                    <td>tipo comercio</td>
                   
               
                    <td>
                       <button class="btn btn-primary"  @click="editar" ><i class="fa fa-pencil-square-o 2x-fa" aria-hidden="true"></i></button>
                        <button class="btn btn-info" @click="ver"><i class="fa fa-eye" aria-hidden="true"></i></button>
                        <button class="btn btn-danger"  @click="eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    </td>
                  </tr>

                </tbody>
              </table>
       </div>
       <div class="container">
  
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
                                                    <label for="nombre">Razon social:</label>
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
                                                    <label for="nombre">Identificacion Representante legal:</label>
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
                                                    <label for="nombre">Direccion:</label>
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
                                                <input class="form-control" type="text" name="email" v-model="email" maxlength="20">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="nombre">Telefono:</label>
                                                </div>
                                                <div class="col-md-4 ">
                                                <input class="form-control" type="text" name="telefono" v-model="telefono" maxlength="20">
                                                </div>
                                            </div>
                                            
                                           

                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label for="nombre">Mio:</label>
                                                </div>
                                                <div class="col-md-10 ">
                                                    <select class="form-control"  v-model="mio" >
                                                        <option>si</option>
                                                        <option>no</option>
                                                    </select>
                                                </div>
                                            </div>
           </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" > Guardar       </button>
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
                                                    <label for="nombre">Identificacion Representante legal:</label>
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
                                                    <label for="nombre">Direccion:</label>
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
                                                    <label for="nombre">Identificacion del gerente:</label>
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
                                                    <label for="nombre">Telefono:</label>
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
                                            </div>
           </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" >Actualizar       </button>
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
                                                    <select class="form-control"  v-model="v_ciudad" >
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
                                                    <select class="form-control"  v-model="v_sector" >
                                                        <option>sur</option>
                                                        <option>norte</option>
                                                    </select>
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
                                                <select class="form-control"  v-model="v_tipo_comercio" >
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
                                                    <select class="form-control"  v-model="v_mio" >
                                                        <option>si</option>
                                                        <option>no</option>
                                                    </select>
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
                                       <h1>¿ ESTA SEGURO QUE DESEA ELIMINAR EL COMERCIO ?</h1>
                                        <button class="btn btn-primary" id="guardar" type="button" v-on:click="suprimir">Eliminar</button>
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
       
    </div>
    
@endsection
@section('js')

    <
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>


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

                 // validar

                 validar : function () {
                     
                 },

                 // metodos 

                 
                   eliminar : function () {
                       $("#eliminar").modal('show');
                   },

                  
                   ver : function () {
                       $("#ver").modal('show');
                   },

                   crear : function () {
                       $("#crear").modal('show');
                   },
                   
                   
                   editar : function () {
                       $("#editar").modal('show');
                   },

                   suprimir : function() {

                   },


                   guardar : function(){
                      //this.espaciosBlanco();
                      //this.validarCampos();

                      if(this.errores.length == 0){
                          
                            var url = 'comercio/store';
                            axios.post(url, {
                                
                           var_co_nombreComercio : this.nombre,
                            ruc: this.ruc,
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
                          
                           var url = 'comercio/update';
                            axios.post(url, {
                                
                           var_co_nombreComercio : this.nombre,
                            ruc: this.ruc,
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


                    

                    espaciosBlanco : function() {
                        this.codigo= this.codigo.trim();
                        this.empresa = this.empresa.trim();
                        this.razon = this.razon.trim();
                        this.representante = this.representante.trim();
                        this.direccion = this.direccion.trim();
                        this.banco = this.banco.trim();
                        this.gerente = this.gerente.trim();
                        this.convencional = this.convencional.trim();
                        this.telefono_representante = this.telefono_representante.trim();
                        this.telefono_gerente = this.telefono_gerente.trim();
                        this.usuario = this.usuario.trim();
                        this.pass=this.usuario.trim();
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
                    }

                }
            }
        );


    </script>
@endsection







