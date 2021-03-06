@extends('layouts.admin')
@section('nombre_pagina','Productos')
@section('css')
@endsection
@section('titulo de la pagina','productos')
@section('breadcrumbs')
    {{ Breadcrumbs::render('productos') }}
@endsection
@section('contenido')
    <div class="col-md-12">
        <div class="tile">
            <br><br>
            <div class="tile-body">
                <table class="table table-hover table-bordered table-responsive" id="sampleTable">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Codigo</th>
                        <th>Categoria</th>
                        <th>Sub categoria</th>
                        <th>Marca</th>
                        <th>Precio</th>
                        <th>Iva</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($datos as $dato)
                        <tr>
                            <td>{{$dato->nombre}}</td>
                            <td>{{$dato->codigo}}</td>
                            <td>{{$dato->id_categoria}}</td>
                            <td>{{$dato->id_sub_categoria}}</td>
                            <td>{{$dato->id_marca}}</td>
                            <td>{{$dato->precio}}</td>
                            <td>{{$dato->iva}}</td>
                            <td>
                                <a  href="{{route('administrador.producto.show',$dato->id)}}"> <button class="btn btn-success" > ver</button> </a>
                                <a  href="{{route('administrador.producto.edit',$dato->id)}}"> <button class="btn btn-info" > Editar</button> </a>
                            </td>
                        </tr>
                    @empty
                        <p class="alert alert-danger"> No existen datos </p>
                    @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        $('#sampleTable').DataTable(
            {
                "scrollX": true,
                "language": {
                    search: "Buscar:",
                    "lengthMenu": "Mostrar _MENU_ registros por pagina",
                    "zeroRecords": "Ningun registro encontrado ",
                    "info": "Mostrando pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "Sin registros disponibles",
                    "infoFiltered": "(filtrando de un total de  _MAX_ registros)",
                    paginate: {
                        first:      "Primero",
                        previous:   "Anterior",
                        next:       "Siguiente",
                        last:       "Ultimo"
                    },
                }
            }
        );
    </script>


@endsection