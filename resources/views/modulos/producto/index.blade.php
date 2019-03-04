@extends('layouts.admin')
@section('nombre_pagina','Producto')
@section('css')
    <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('titulo de la pagina',' Producto')
@section('subtitulo','')

@section('contenido')


    <div class="col-md-12" id="creacionProveedores">

        <div class="tile">
            <a href="{{route('producto.create')}}" class="btn btn-primary btn-lg btn-block mb-4"> Crear producto</a>

            <div class="table-responsive">
                <table class="table table-striped" id="sampleTable">
                    <thead>
                    <tr>
                        <th>NOMBRE</th>
                        <th>TIPO</th>
                        <th>COMERCIO</th>
                        <th>VALOR</th>
                        <th>MIO</th>
                        <th>disponible</th>
                        <th>acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      {{--  <td>producto</td>
                        <td>tipo producto</td>
                        <td>nombre comercio</td>
                        <td>valor</td>
                        <td>mio</td>
                        <td>disponible</td>
                        --}}{{--<td>producto</td>
                        <td>tipo producto</td>
                        <td>nombre comercio</td>
                        <td>valor</td>
                        <td>MIO</td>
                        <td>disponible</td>--}}{{--

                        <td>
                            <button class="btn btn-primary"  @click="editar" ><i class="fa fa-pencil-square-o 2x-fa" aria-hidden="true"></i></button>
                            <button class="btn btn-danger"  @click="eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </td>--}}
                    </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection
@section('js')


    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
@endsection















{{--
<div class="table-responsive">
    <table class="table table-striped" id="sampleTable">
        <thead>
        <tr>
            <th>NOMBRE</th>
            <th>TIPO</th>
            <th>COMERCIO</th>
            <th>VALOR</th>
            <th>MIO</th>
            <th>disponible</th>

            <th colspan="2">Accioes</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>producto</td>
            <td>tipo producto</td>
            <td>nombre comercio</td>
            <td>valor</td>
            <td>MIO</td>
            <td>disponible</td>

            <td>
                <button class="btn btn-primary"  @click="editar" ><i class="fa fa-pencil-square-o 2x-fa" aria-hidden="true"></i></button>
            </td>
            <td>
                <button class="btn btn-success"  @click="ver" ><i class="fa fa-pencil-square-o 2x-fa" aria-hidden="true"></i></button>
            </td>
            <td>
                <button class="btn btn-danger"  @click="eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
            </td>
        </tr>

        </tbody>
    </table>
</div>--}}
