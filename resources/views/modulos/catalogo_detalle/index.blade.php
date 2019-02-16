@extends('layouts.admin')
@section('nombre_pagina','Catalogo detalle')
@section('css')
<link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('titulo de la pagina',' Catalogo detalle')
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
           
                    <button class="btn btn-primary btn-lg btn-block mb-4" @click="crear"> Agregar catalogo</button>
            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>cabecera</th>
                    <th>miembro</th>
                    <th>descripcion</th>
                    
     
                    <th>Accioes</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>cabecera</td>
                    <td>miembro</td>
                    <td>descripcion</td>
                   
               
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

        <!-- Modal crear -->
  <div class="modal fade"  role="dialog" id="crear">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
          <h4 class="modal-title">Crear catalogo</h4>
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
                 

                }
            }
        );


    </script>
@endsection







