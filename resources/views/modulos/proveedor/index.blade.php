@extends('layouts.proveedor')
@section('nombre_pagina','proveedor')
@section('css')
@endsection
@section('titulo de la pagina','Productos')
@section('breadcrumbs')
    {{ Breadcrumbs::render('productos_proveedor') }}
@endsection
@section('contenido')
    <div class="col-md-12">
        <div class="tile">
          <a href="{{route('proveedor.create')}}"><button class=" btn btn-outline-primary"> Crear nuevo producto</button></a>
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
                                <a  href="{{route('proveedor.show',$dato->id)}}"> <button class="btn btn-success" > ver</button> </a>
                                <a  href="{{route('proveedor.edit',$dato->id)}}"> <button class="btn btn-info" > Editar</button> </a>
                                <a  href="{{route('proveedor.show',$dato->id)}}"> <button class="btn btn-danger" > Eliminar</button> </a>
                            </td>
                        </tr>
                    @empty
                        <p> No existen datos </p>
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
