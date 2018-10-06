@extends('layouts.proveedor')
@section('nombre_pagina','proveedor')
@section('css')
@endsection
@section('titulo de la pagina','Principal')
@section('contenido')
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <table class="table table-hover table-bordered table-responsive" id="sampleTable">
                    <thead>
                    <tr>
                        <th>MEDICO</th>
                        <th>ESPECIALIZACION</th>
                        <th>LUNES</th>
                        <th>MARTES</th>
                        <th>MIERCOLES</th>
                        <th>JUEVES</th>
                        <th>VIERNES</th>
                        <th>SABADO</th>
                        <th>DOMINGO</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($datos as $dato)
                        <tr>
                            <th>{{$dato->NOMBRE_MEDICO}}</th>
                            <th>{{$dato->ESPECIALIZACION}}</th>
                            <th>{{$dato->LUNES}}</th>
                            <th>{{$dato->MARTES}}</th>
                            <th>{{$dato->Miercoles}}</th>
                            <th>{{$dato->Jueves}}</th>
                            <th>{{$dato->Viernes}}</th>
                            <th>{{$dato->Sabado}}</th>
                            <th>{{$dato->Domingo}}</th>
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
    <script type="text/javascript">$('#sampleTable').DataTable(
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
