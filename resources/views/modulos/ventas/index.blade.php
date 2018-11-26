@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row" id="applicacion">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Compra de productos</div>

                    <div  class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <input type="text" placeholder="buscar producto" class="form-control" v-on:keyup.13="consultar"><br>
                        <table CLASS=" table table-bordered">
                            <thead>
                            <th>ITEM</th>
                            <th>DESCRIPCION</th>
                            <th>CANTIDAD</th>
                            <th>PRECIO</th>
                            </thead>
                            <tbody>
                            <tr v-for="dato in cmbDatos">
                                <td>@{{dato.id}}</td>
                                <td>@{{dato.descripcion}}</td>
                                <td>calculado</td>
                                <td>@{{dato.precio}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>
    <script>
        var app = new Vue({
            el:'#applicacion',

            data : {
                cmbDatos : [],
            },
            created : function() {
                var url = '/ventas/consultar/1';
                axios.get(url).then( response => {
                    cmbDatos.push(response.data);
            }).catch(error => {

                });
            },

            methods : {


                consultar : function(){
                    alert("hola");
                    /*  $url = '/ventas/consultar/1';
                      axios.get(url).then( response => {
                          cmbDatos.push(response.data);
                  }).catch(error => {

                      }); */
                },

            }
        });

    </script>
@endsection
