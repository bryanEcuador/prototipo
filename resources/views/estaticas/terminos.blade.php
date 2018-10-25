@extends('layouts.principal')
@section('title',"Terminos y condiciones")
@section('css')
@endsection
@section('nombre_breadcrumb')
@endsection
@section('breadcrumb_tree')
    <li><a href="#">Terminos y condiciones</a></li>
@endsection
@section('contenido')
    <div>
        {!! $datos[0]->terminos !!}
    </div>
@endsection
@section('js')
@endsection