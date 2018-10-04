@extends('layouts.proveedor')
@section('nombre_pagina','crear')
@section('css')
@endsection
@section('titulo de la pagina','Creacion de Usuarios')
@section('contenido')
    <div class="col-md-12" id="creacionProductos">
        <div class="tile">
           <form action="" method="post" enctype="multipart/form-data">

           <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Codigo Externo:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" name="Codigo" v-model="Codigo" id="Codigo" placeholder="Codigo Externo" min="3" max="20">
                </div>
            </div>
            <div class="form-group row ">
                    <div class="col-md-2">
                        <label for="nombre">Tipo de Empresa:</label>
                    </div>
                    <div class="col-md-6">
                         <select class="form-control" v-model="Empresa"  >
                            <option value='0'  disabled ></option>
                            <option></option>
                        </select>
                    </div>
                   
            </div>
            
           <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Ruc :</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="number" step="any" lang="end" name="Ruc" v-model="Ruc" id="Ruc" placeholder="Ruc" min="3" max="20">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Razon Social:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" name="Razon" v-model="Razon" id="Razon" placeholder="Razon Social" min="3" max="20">
                </div>
            </div>
           <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Representante Legal:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" name="Representante" v-model="Representante" id="Representante" placeholder="Representante Legal" min="3" max="20">
                </div>
            </div>
           <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Direccion:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" name="Direccion" v-model="Direccion" id="Direccion" placeholder="Direccion" min="3" max="20">
                </div>
            </div>
            <div class="form-group row ">
                    <div class="col-md-2">
                        <label for="nombre">Banco :</label>
                    </div>
                    <div class="col-md-6">
                         <select class="form-control" v-model="Banco"  >
                            <option value='0'  disabled ></option>
                            <option></option>
                        </select>
                    </div>
                   
            </div>
            
           <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Cuenta Bancaria:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="number" step="any" lang="end" name="Cuenta" v-model="Cuenta" id="Cuenta" placeholder="Cuenta Bancaria" min="3" max="20">
                </div>
            </div>
          <div class="form-group row ">
                    <div class="col-md-2">
                        <label for="nombre">Estado :</label>
                    </div>
                    <div class="col-md-6">
                         <select class="form-control" v-model="Estado"  >
                            <option value='0'  disabled ></option>
                            <option></option>
                        </select>
                    </div>
                   
            </div>
                    <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Gerente General:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" name="Gerente" v-model="Gerente" id="Gerente" placeholder="Gerente" min="3" max="20">
                </div>
            </div>  
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Fono Convencional:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="number" step="any" lang="end" name="Convencional" v-model="Convencional" id="Convencional" placeholder="Fono" min="3" max="20">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Fono Representante:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="number" step="any" lang="end" name="F_Representante" v-model="F_Representante" id="F_Representante" placeholder="Fono" min="3" max="20">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Fono Gerente:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" type="number" step="any" lang="end" name="FonoG" v-model="FonoG" id="FonoG" placeholder="Fono" min="3" max="20">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Usuario:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" name="Usuario" v-model="Usuario" id="Usuario" placeholder="Usuario" min="3" max="20">
                </div>
            </div>
             <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Contraseña:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" name="Contraseña" v-model="Contraseña" id="Contraseña" placeholder="Contraseña" min="3" max="20">
                </div>
            </div>

            </form>
          
        </div>

    </div>
@endsection
@section('js')
    <script src="/js/plugins/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>


@endsection
<script>
     var app = new Vue ({
         el:"#creacionProveedores",
         data: {
             Codigo: '',
            Empresa : '',
             Ruc : 0,
             Razon : '',
             Representante : '',
             Direccion : '',
             Banco : '',
             Cuenta Bancaria :0,
             Estado : '',
             Gerente : '',
             Convencional : 0,
             F_Representante:0,
             FonoG:0,
             Usuario:'',
             Contraseña:'',

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

            validar : function () {
                //this.validarCampos();

                // mensajes de alerta
                if( this.errores.length === 0) {
                    var form = document.getElementById('proveedor');
                    proveedor.submit();
                } else {
                    var num = this.errores.length;
                    for(i=0; i<num;i++) {
                        toastr.error(this.errores[i]);
                    }
                }
                this.errores = [];
            },
             validarCampos : function() {
                 var datos_sin_numeros =  /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/; // para la afinidad
                 var patt3 = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ,\s0-9]+$/; //para la observación
                 var er_numeros = /^[0-9,]+$/;

                 if(this.codigo !== "") {
                     // mas validaciones
                 } else {
                     this.errores.push("El campo Codigo no puede estar vacio");
                 }

                 if(this.Empresa !== ""){

                 }else {
                     this.errores.push("El campo Empresa no puede estar vacio");
                 }

                 if(this.Ruc !== 0) {
                     // mas validaciones
                     if(er_numeros .test(this.Ruc) == false)
                     {
                         this.errores.push("El campo Ruc solo puede obtener numeros");
                     }
                 } else {
                     this.errores.push("El Ruc debe tener");
                 }

                 if(this.Razon !== "") {
                     // mas validaciones
                     
                         this.errores.push("El campo Razon solo puede obtener numeros");
                 } else {
                     this.errores.push("La Razon debe tener ");
                 }


                 if(this.Representante !== "") {
                     // mas validaciones
                 } else {
                     this.errores.push("Debe tener un Representante");
                 }

                 if(this.Direccion !== "") {
                     // mas validaciones
                 } else {
                     this.errores.push("Debe tener Direccion");
                 }

                 if(this.Banco !== "") {
                     // mas validaciones
                 } else {
                     this.errores.push("Debe elegir un Banco");
                 }
                 if(this.Cuenta Bancaria !== 0) {
                     // mas validaciones
                     if(er_numeros .test(this.precio) == false)
                     {
                         this.errores.push("El campo Cuenta solo puede obtener numeros");
                     }
                 } else {
                     this.errores.push("Debe tener una Cuenta");
                 }                
                  if(this.Estado !== "") {
                     // mas validaciones
                 } else {
                     this.errores.push("Debe elegirun Estado");
                 }
                 if(this.Gerente !== "") {
                     // mas validaciones
                 } else {
                     this.errores.push("Debe poner el nombre");
                 }
                 if(this.Convencional !== 0) {
                     // mas validaciones
                     if(er_numeros .test(this.Convencional) == false)
                     {
                         this.errores.push("El campo Convencional solo puede obtener numeros");
                     }
                 } else {
                     this.errores.push("Debe tener Convencional");
                 }
                 if(this.F_Representante !== 0) {
                     // mas validaciones
                     if(er_numeros .test(this.F_Representante) == false)
                     {
                         this.errores.push("El F_Representante precio solo puede obtener numeros");
                     }
                 } else {
                     this.errores.push("Debe tener F_Representante");
                 }
                 if(this.FonoG !== 0) {
                     // mas validaciones
                     if(er_numeros .test(this.FonoG) == false)
                     {
                         this.errores.push("El campo FonoG solo puede obtener numeros");
                     }
                 } else {
                     this.errores.push("debe tener un FonoG");
                 }
                 if(this.Usuario !== "") {
                     // mas validaciones
                 } else {
                     this.errores.push("Debe ingresar Usuario");
                 }
                 if(this.Contraseña !== "") {
                     // mas validaciones
                 } else {
                     this.errores.push("Debe ingresar Contraseña");
                 }
             },
            enviarFormulario : function(){
            },
             
               }
         }
     );
 </script>
