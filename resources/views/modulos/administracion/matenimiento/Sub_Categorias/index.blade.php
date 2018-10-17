@extends('layouts.proveedor')
@section('nombre_pagina','Lista de Marcas')
@section('css')
@endsection
@section('titulo de la pagina','Marca')
@section('contenido')
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap-grid.min.css">
    <body>
        <div class="tile">
    <div class="col-md-12" id="tabe">
        <table class="table">
            <thead>
                <tr>
                    <th>Marcas</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
</body>
@endsection
@section('js')
    <script src="/js/plugins/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>


@endsection