@extends('layouts.admin')
@section('nombre_pagina','Transacción banco')
@section('css')
<link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('titulo de la pagina','Transacción banco')
@section('subtitulo','')

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

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
    @endif

    <div class="col-md-12" id="creacionProveedores">
        
        <div class="tile">
            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>subtotal</th>
                    <th>comision</th>
                    <th>total</th>
                    <th>cliente</th>
                    <th>tipo tarjeta</th>
                    <th>fecha</th>
                    <th>proceso</th>
                   
     
                    <th>Accioes</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                     <td>subtotal</td>
                    <td>comision</td>
                    <td>total</td>
                    <td>cliente</td>
                    <td>tipo tarjeta</td>
                    <td>fecha</td>
                    <td>proceso</td>
               
                    <td>
                        <button>Modificar</button>
                        <button>Eliminar</button>
                    </td>
                  </tr>

                </tbody>
              </table>
        </div>
       
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
                $("#estado").val(1);
        });
    </script>
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>



@endsection







