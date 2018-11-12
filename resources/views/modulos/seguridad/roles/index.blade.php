@extends('layouts.admin')
@section('nombre_pagina','Rol')
@section('css')
@endsection
@section('titulo de la pagina','Roles')
@section('breadcrumbs')
    {{ Breadcrumbs::render('roles') }}
@endsection
@section('contenido')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @include('flash::message')
    <div class="col-md-12" id="">
        <div class="tile">
            <a href="{{route('seguridad.roles.create')}}"> <button class=" form-control col-md-2 btn btn-info pull-right">CREAR</button></a>
            <br>
            <br>
                <div class="col-sm-12 col-sm-offset-6" style="background-color:white;">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                    <tr>
                        <th>NOMBRE</th>
                        <th>SLUG</th>
                        <th>DESCRIPCION</th>
                        <th>ESPECIAL</th>
                        <th>ACCIONES</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($resultado as $dato)
                        <tr>
                            <td>{{$dato->name}}</td>
                            <td>{{$dato->slug}}</td>
                            <td>{{$dato->description}}</td>
                            <td>
                                    @if($dato->special === "all-access")
                                        Acceso total
                                    @endif

                                    @if($dato->special === "no-access")
                                     Sin acceso
                                    @endif

                                    @if($dato->special != "no-access" and $dato->special != "all-access")
                                       Acceso restringido
                                    @endif
                            </td>
                            <th>
                                <a href="{{route('seguridad.roles.edit', [ encrypt($dato->id)  ] )}}"> <button class="btn btn-success" >EDITAR</button></a>

                                <a href="{{route('seguridad.roles.show',[ encrypt($dato->id) ])}}"> <button class="btn btn-primary">VER</button></a>
                            </th>
                        </tr>
                    @empty
                        <p> Error al momento de cargar la información </p>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
 <script type="text/javascript" src="/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
    
    $('#sampleTable').DataTable(
            {
                "scrollX": true,
                "language": {
                       
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