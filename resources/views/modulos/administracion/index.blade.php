@extends('layouts.admin')
@section('nombre_pagina','Lista de Proveedores')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap-grid.min.css">
    <style type="text/css" media="screen">
        @charset "UTF-8";
        /* CSS Document *//*estilos visuales de la tabla*/
        table {
            font-family: Arial, Helvetica, sans-serif;
            color: #666;
            font-size: 12px;
            text-shadow: 1px 1px 0px #fff;
            background: #eaebec;
            margin: 20px;
            border: #ccc 1px solid;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            -moz-box-shadow: 0 1px 2px #d1d1d1;
            -webkit-box-shadow: 0 1px 2px #d1d1d1;
            box-shadow: 0 1px 2px #d1d1d1;
        }
        table th {
            padding: 21px 25px 22px 25px;
            border-top: 1px solid #fafafa;
            border-bottom: 1px solid #e0e0e0;
            background: #ededed;
            background: -webkit-gradient(linear, left top, left bottom, from(#ededed), to(#ebebeb));
            background: -moz-linear-gradient(top, #ededed, #ebebeb);
        }
        table tr {
            text-align: center;
            padding-left: 20px;
        }
        table td {
            padding: 18px;
            border-top: 1px solid #ffffff;
            border-bottom: 1px solid #e0e0e0;
            border-left: 1px solid #e0e0e0;
            background: #fafafa;
            background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
            background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
        }
        table tr.even td {
            background: #f6f6f6;
            background: -webkit-gradient(linear, left top, left bottom, from(#f8f8f8), to(#f6f6f6));
            background: -moz-linear-gradient(top, #f8f8f8, #f6f6f6);
        }
        table tr:hover td {
            background: #f2f2f2;
            background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
            background: -moz-linear-gradient(top, #f2f2f2, #f0f0f0);
        }

        /*fin estilos visuales de la tabla*/

        .table-container
        {
            width: 100%;
            overflow-y: auto;
            _overflow: auto;
            margin: 0 0 1em;
        }
        /* añadimos las barras para dispositivos IOS */

        .table-container::-webkit-scrollbar
        {
            -webkit-appearance: none;
            width: 14px;
            height: 14px;
        }
        .table-container::-webkit-scrollbar-thumb
        {
            border-radius: 8px;
            border: 3px solid #fff;
            background-color: rgba(0, 0, 0, .3);
        }

    </style>
@endsection
@section('titulo de la pagina','Proveedores')
@section('subtitulo','lista de proveedores')
@section('contenido')
    <div class="table-container">
        <table width="700px">
            <thead>
                <tr>
                     <th > Codigo Externo </th>
                    <th>  Tipo de Empresa  </th>
                    <th > Ruc </th>
                    <th > Razon Social </th>
                    <th > Representante legal </th>
                    <th > Direccion </th>
                    <th > Estado </th>
                    <th> Gerente General </th>
                    <th> Telefono Convencional  </th>
                    <th colspan="3">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @forelse($datos as $dato)
            <tr>
                <td>{{$dato->codigo_externo}}</td>
                <td>{{$dato->tipo_empresa}}</td>
                <td>{{$dato->ruc}}</td>
                <td>{{$dato->razon_social}}</td>
                <td>{{$dato->representante_legal}}</td>
                <td>{{$dato->direccion}}</td>
                <td>{{$dato->estado}}</td>
                <td>{{$dato->gerente_general}}</td>
                <td>{{$dato->telefono_representante}}</td>
                <td>

                    <a href="{{route('administrador.proveedor.show',$dato->id)}}"> <button class="btn btn-primary" type="button">Ver</button> </a>

                </td>
                <td>
                    <a href="{{route('administrador.proveedor.edit',$dato->id)}}"> <button class="btn btn-success" type="button">Editar</button> </a>

                </td>
                <td>
                    <a href="{{route('administrador.proveedor.delete',$dato->id)}}"> <button class="btn btn-danger" type="button">Eliminar</button> </a>
                </td>


            </tr>
             @empty

            @endforelse
            </tbody>

        </table>
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