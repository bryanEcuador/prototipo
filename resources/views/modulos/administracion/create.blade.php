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
                   <input class="form-control" type="number" step="any" lang="end" name="Representante" v-model="Representante" id="Representante" placeholder="Fono" min="3" max="20">
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