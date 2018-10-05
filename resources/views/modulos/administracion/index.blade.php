@extends('layouts.proveedor')
@section('nombre_pagina','Lista de Proveedores')
@section('css')
@endsection
@section('titulo de la pagina','Proveedores')
@section('contenido')
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap-grid.min.css">
    <body>
        <div class="tile">
    <div class="col-md-12" id="tabe">
        <table class="table">
            <thead>
                <tr>
                    <th>Codigo Externo</th>
                    <th>Tipo De Empresa</th>
                    <th>Ruc</th>
                    <th>Razon Social</th>
                    <th>Representante Legal</th>
                    <th>Direccion</th>
                    <th>Banco</th>
                    <th>Cuenta Bancaria</th>
                    <th>Estado</th>
                    <th>Gerente General</th>
                    <th>Fono Convencional</th>
                    <th>Fono Representante</th>
                    <th>Fono Gerente</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
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