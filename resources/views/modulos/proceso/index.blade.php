@extends('layouts.admin')
@section('nombre_pagina','Fecha proceso')
@section('css')
<link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('titulo de la pagina',' Fecha proceso')
@section('subtitulo','')

@section('contenido')


    <div class="col-md-6 offset-md-3" id="creacionProveedores">
        
        <div class="tile">


            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Fecha Proceso</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($datos as $item)
                            <td>{{$item}}</td>    
                        @endforeach
                    </tr>      
                  

                </tbody>
              </table>
          
            

             
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







