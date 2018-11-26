@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div id="app" class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var app = new Vue({
            el:'#app',
            data : {

            },
            create : function() {

            },

            methods : {

                crear : function(){

                },

                editar : function(){

                },

                actualizar : function(){

                },

                guardar : function(){

                },

                eliminar : function(){

                },

                cargar : function(){

                },

                limpiar : function(){

                },
            }
        })
    </script>

@endsection
