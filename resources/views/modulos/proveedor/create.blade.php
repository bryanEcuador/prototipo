@extends('layouts.proveedor')
@section('nombre_pagina','crear')
@section('css')
@endsection
@section('titulo de la pagina','Crear articulos')
@section('contenido')
    <div class="col-md-12">
        <div class="tile">
            <form action="" method="post" enctype="multipart/form-data">

            </form>
            <h4>DATOS BASICOS</h4>
            <hr>
                <div class="form-group row justify-content-md-center">
                    <div class="col-md-4">
                        <select class="form-control col-md-8" >
                            <option value='disabled'  disabled selected>Categoria</option>
                            <option>2</option>
                        </select>
                    </div>
                    <div class="col-md-4 ">
                        <select class="form-control col-md-8">
                            <option value='disabled'  disabled selected>Sub-Categoria</option>
                            <option>2</option>
                        </select>
                    </div>
                    <div class="col-md-4 ">
                        <select class="form-control col-md-8">
                            <option value='disabled'  disabled selected>Marca</option>
                            <option>2</option>
                        </select>
                    </div>
                </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Nombre:</label>
                </div>
                <div class="col-md-6 ">
                   <input class="form-control" name="nombre" id="nombre" placeholder="nombre del producto" min="3" max="20">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="descripcion">Descripción:</label>
                </div>
                <div class="col-md-8 ">
                   <textarea class="form-control" minlength="15" maxlength="50" rows="2" placeholder="descripción del producto">
                   </textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <input class="form-control" type="number" placeholder="Precio" name="precio" id="precio">
                </div>
                <div class="col-md-4 ">
                   <input class="form-control" type="number" placeholder="iva" name="iva" id="iva">
                </div>
            </div>
            <br>
            <h4>Imagenes del prodcuto</h4>
            <hr>
            <label for="colores">Seleccione los colores en orden:</label>
            <select class="js-example-basic-multiple form-control" name="colores[]" id="colores" multiple="multiple">
                <option value="AL">rojo</option>
                <option value="WY">amarillo</option>
            </select>
            <br>
            <input type="file" multiple accept="image/png, .jpeg">>
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
 <script>
     
 </script>

@endsection