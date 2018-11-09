@extends('layouts.proveedor')
@section('nombre_pagina','Configuración')
@section('css')
@endsection
@section('titulo de la pagina','Configuración')
@section('breadcrumbs')
    {{ Breadcrumbs::render('configuracion') }}    
                
@endsection
@section('contenido')
 <div class="col-md-12">
        <!-- contenido -->
        <div class="tile">
<div class="form-group row">
                <div class="col-md-2">
                    <label for="codigo">Correo Electronico</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" name="correo" v-model="correo" id="correo" placeholder="Correo Electronico" min="3" maxlength="20">
                </div>
            </div><div class="form-group row">
                <div class="col-md-2">
                    <label for="codigo">Contraseña</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" name="contraseña" v-model="contraseña" id="contraseña" placeholder="Contraseña" min="3" maxlength="20">
                </div>
            </div>
   <center>
               <button type="button" class="btn btn-info" v-on:click="editar"  id="editar">Editar</button>
                <input type="hidden" v-model="guardar" id="guardar">
        </div>
        </form>
    </div>
</center>
@endsection
@section('script')
@endsection