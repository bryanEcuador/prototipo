<!DOCTYPE html>
<html lang="en" xmlns:v-on="http://www.w3.org/1999/xhtml">

<head>
    <meta name="description" content="Majoma control hospitalario">
    <title>Error</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- icono -->
    <link rel="shorcut icon"    href="{{asset('logo.ico')}}">

    <style>
        .activo {
            color:black;
        }

        .inactivo {
            color:grey;
        }
    </style>

    <!-- Main CSS-->
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Fonts and Icons -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="app sidebar-mini rtl pace-done sidenav-toggled body">
<!-- Navbar-->
<header class="app-header">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

</header>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<main class="app-content">
    <div class="app-title">
        <div>
        </div>
    </div>
    <div class="container">
        <div class="panel panel-danger">
            <div class="panel-heading">Error de direccion ip</div>
            <div class="panel-body">
                <h2>Esta dirrección ip <mark>{{$ip}} </mark> no coincide con los registros de nuestra base de datos</h2>
                <h4 id='CuentaAtras'></h4>
            </div>
            <div class="panel-footer">
                <strong>Conctacte con el departamento de sistemas</strong>
            </div>
        </div>
    </div>
</main>


<script language="JavaScript">

    /* Determinamos el tiempo total en segundos */
    var totalTiempo=4;
    function updateReloj()
    {
        document.getElementById('CuentaAtras').innerHTML = "Redireccionando en "+totalTiempo+" segundos";

        if(totalTiempo==0)
        {
            document.getElementById('logout-form').submit();
        }else{
            /* Restamos un segundo al tiempo restante */
            totalTiempo-=1;
            /* Ejecutamos nuevamente la función al pasar 1000 milisegundos (1 segundo) */
            setTimeout("updateReloj()",1000);
        }
    }

    window.onload=updateReloj;

</script>
<!-- Essential javascripts for application to work-->
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/toastr.js')}}"></script>

<!-- The javascript plugin to display page loading on top-->
<script src="{{asset('js/plugins/pace.min.js')}}"></script>
<!-- scanner -->
<script src="{{asset('js/axios.min.js')}}"></script>
<!--
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.1/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.3.5"></script> -->
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.2.0/vue.js"></script>

<script src="{{asset('js/plugins/pace.min.js')}}"></script>
<script src="{{asset('js/plugins/select2.min.js')}}"></script>




<script type="text/javascript">
    var app = new Vue ({
        el:'#notificaciones_menu',
        data : {
            notificaciones : [],
            numero : 0,
        },

        created : function() {
            axios.get('/total/notificaciones').then(response => {
                this.notificaciones  = response.data;
            this.numero = this.notificaciones.length
        })
            setInterval(function(){ axios.get('/total/notificaciones').then(response => {
                this.notificaciones  = response.data;
                this.numero = this.notificaciones.length
            });
            }, 1800000);
        },
        methods : {

            notificaciones : function(){
                axios.get('/total/notificaciones').then(response => {
                    this.notificaciones  = response.data
                this.numero = this.notificaciones.length
            })
            },

        }

    });


</script>
</body>
</html>