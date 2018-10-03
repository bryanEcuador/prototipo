@extends('layouts.proveedor')
@section('nombre_pagina','crear')
@section('css')
@endsection
@section('titulo de la pagina','Crear articulos')
@section('contenido')
    <div class="col-md-12" id="">
        <div class="tile">
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