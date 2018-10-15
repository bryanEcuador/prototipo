@extends('layouts.poveedor')
@section('nombre_pagina','Agregar')
@section('css')
@endsection
@section('titulo de la pagina','Agregar SubCategoria')
@section('contenido')
    <div class="col-md-12" id="Categoria">
        <div class="tile">
<label for="nombre">Marca :</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" name="Marca" v-model="Marca" id="Marca" placeholder="Marca" min="3" max="20">
                </div>
            </div>
          
            <br>
               <button type="button" class="btn btn-info" v-on:click="validar" name="guardar" id="guardar"> Agregar </button>
        </div>
        </form>
    </div>
@endsection
@section('js')
