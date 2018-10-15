@extends('layouts.proveedor')
@section('nombre_pagina','Agregar')
@section('css')
@endsection
@section('titulo de la pagina','Agregar Categoria')
@section('contenido')
    <div class="col-md-12" id="Categoria">
        <div class="tile">
<label for="nombre">Categoria :</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" name="categoria" v-model="categoria" id="categoria" placeholder="categoria" min="3" max="20">
                </div>
            </div>
            <label for="nombre">Despcricion :</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" name="Despcricion" v-model="Despcricion" id="Despcricion" placeholder="" min="3" max="20">
                </div>
            </div>
            <br>
               <button type="button" class="btn btn-info" v-on:click="validar" name="guardar" id="guardar"> Agregar </button>
        </div>
        </form>
    </div>
@endsection
@section('js')
