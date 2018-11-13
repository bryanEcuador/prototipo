@extends('layouts.admin')
@section('nombre_pagina','Vista de proveedor')
@section('css')
@endsection
@section('titulo de la pagina','vista de proveedor')
@section('subtitulo','')
@section('breadcrumbs')
    {{ Breadcrumbs::render('proveedores-show',$datos[0]->name) }}
@endsection
@section('contenido')


    <div class="col-md-12" id="creacionProveedores">
        <div class="tile">
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="codigo">Codigo Externo:</label>
                </div>
                <div class="col-md-6 ">
                    <input class="form-control" name="codigo" value="{{$datos[0]->codigo_externo}}" readonly id="codigo" placeholder="00005840384" min="3" maxlength="20">
                </div>
            </div>
            <div class="form-group row ">
                <div class="col-md-2">
                    <label for="nombre">Tipo de Empresa:</label>
                </div>
                <div class="col-md-6">
                    <input class="form-control"  value="{{$datos[0]->tipo_empresa}}" readonly >
                </div>

            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Ruc :</label>
                </div>
                <div class="col-md-6 ">
                    <input class="form-control" type="number"  name="ruc" id="Ruc" placeholder="ruc" minlength="13" maxlength="13" value="{{$datos[0]->ruc}}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="razon">Razon Social:</label>
                </div>
                <div class="col-md-6 ">
                    <input class="form-control" name="razon_social" id="razon" placeholder="Razon Social" minlength="3" maxlength="20" value="{{$datos[0]->razon_social}}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="representante">Representante Legal:</label>
                </div>
                <div class="col-md-6 ">
                    <input class="form-control" name="representante" id="representante" placeholder="Representante Legal" minlength="3" maxlength="20" value="{{$datos[0]->representante_legal}}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="direccion">Direccion:</label>
                </div>
                <div class="col-md-6 ">
                    <input class="form-control" name="direccion"  id="direccion" placeholder="Direccion" minlength="5" maxlength="40" value="{{$datos[0]->direccion}}" readonly>
                </div>
            </div>
            <div class="form-group row ">
                <div class="col-md-2">
                    <label for="banco">Banco :</label>
                </div>
                <div class="col-md-6">
                    <input class="form-control" type="text" value="{{$datos[0]->banco}}" readonly>
                </div>

            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Cuenta Bancaria:</label>
                </div>
                <div class="col-md-6 ">
                    <input class="form-control" type="number" step="any" lang="end" name="cuenta_bancaria" id="cuenta"  minlength="3" maxlength="20" value="{{$datos[0]->cuenta_bancaria}}" readonly>
                </div>
            </div>
            <div class="form-group row ">
                <div class="col-md-2">
                    <label for="estado">Estado :</label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" value="{{$datos[0]->estado}}" readonly>
                </div>

            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="gerente">Gerente General:</label>
                </div>
                <div class="col-md-6 ">
                    <input class="form-control" name="gerente"  id="gerente" placeholder="nombre completo del gerente general" minlength="12" maxlength="40" value="{{$datos[0]->gerente_general}}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="convencional">Teléfono Convencional:</label>
                </div>
                <div class="col-md-6 ">
                    <input class="form-control" type="tel" name="telefono_convencional"  id="convencional" placeholder="Telefofono" minlength="7" maxlength="20" value="{{$datos[0]->telefono_representante}}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Teléfono Representante:</label>
                </div>
                <div class="col-md-6 ">
                    <input class="form-control" type="tel" name="telefono_representante" id="telefono_representante" placeholder="telefono representante" minlength="7" maxlength="20" value="{{$datos[0]->telefono_representante}}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="nombre">Teléfono Gerente:</label>
                </div>
                <div class="col-md-6 ">
                    <input class="form-control" type="tel" name="telefono_gerente"  id="telefono_gerente" placeholder="telefono gerente" minlength="7" maxlength="20" value="{{$datos[0]->telefono_gerente}}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="usuario">Usuario:</label>
                </div>
                <div class="col-md-6 ">
                    <input class="form-control"  name="usuario" v-model="usuario" id="usuario" placeholder="Nombre de usuario" minlength="3" maxlength="20" autocomplete="off" readonly value="{{$datos[0]->name}}" >
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="usuario">Email:</label>
                </div>
                <div class="col-md-6 ">
                    <input class="form-control"  name="email" v-model="email" id="email" placeholder="Nombre de usuario" minlength="3" maxlength="20" autocomplete="off" readonly value="{{$datos[0]->email}}" >
                </div>
            </div>

        </div>

    </div>
@endsection


