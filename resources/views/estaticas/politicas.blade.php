@extends('layouts.principal')
@section('title',"Politicas de privacidad")
@section('css')
@endsection
@section('nombre_breadcrumb')
@endsection
@section('breadcrumb_tree')
    <li><a href="#">Politicas de privacidad</a></li>
@endsection
@section('contenido')
    <div>
        <h1>Politicas de privacidad del Sitio</h1>
        <p>
            {!! $datos[0]->politica !!}
        </p>
    </div>
@endsection
@section('js')
@endsection