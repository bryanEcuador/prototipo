@extends('layouts.principal')
@section('title',"Politicas de privacidad")
@section('css')
@endsection
@section('nombre_breadcrumb')
@endsection
@section('breadcrumb_tree')
    <li><a href="#">Acerca de</a></li>
@endsection
@section('contenido')
    <div>
        <h1>Acerca De</h1>
        {!! $datos[0]->acerca !!}
    </div>
@endsection
@section('js')
@endsection