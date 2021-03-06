<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="description" content="">
    <title>@yield('nombre_pagina')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Main CSS-->

    <link rel="stylesheet" type="text/css" href="/css/main-proveedor.css">
    <link rel="stylesheet" type="text/css" href="/css/toastr.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('css')
</head>
<body class="app sidebar-mini rtl">
<!-- Navbar-->
<header class="app-header" ><a id="header" v-cloak class="app-header__logo" href="{{ url('/') }}"> @{{nombre}}</a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
        <!--Notification Menu-->
        <li class="dropdown" style="display: none;background:#06CDF9"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
                <li class="app-notification__title">You have 4 new notifications.</li>
                <div class="app-notification__content">
                    <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                            <div>
                                <p class="app-notification__message">Lisa sent you a mail</p>
                                <p class="app-notification__meta">2 min ago</p>
                            </div></a></li>
                    <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                            <div>
                                <p class="app-notification__message">Mail server not working</p>
                                <p class="app-notification__meta">5 min ago</p>
                            </div></a></li>
                    <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                            <div>
                                <p class="app-notification__message">Transaction complete</p>
                                <p class="app-notification__meta">2 days ago</p>
                            </div></a></li>
                    <div class="app-notification__content">
                        <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                                <div>
                                    <p class="app-notification__message">Lisa sent you a mail</p>
                                    <p class="app-notification__meta">2 min ago</p>
                                </div></a></li>
                        <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                                <div>
                                    <p class="app-notification__message">Mail server not working</p>
                                    <p class="app-notification__meta">5 min ago</p>
                                </div></a></li>
                        <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                                <div>
                                    <p class="app-notification__message">Transaction complete</p>
                                    <p class="app-notification__meta">2 days ago</p>
                                </div></a></li>
                    </div>
                </div>
                <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
            </ul>
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
              <!--  <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Configuraciones</a></li> -->
                <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Perfil</a></li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">

                        <i class="fa fa-sign-out fa-lg"></i>Salir
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</header>

<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <ul class="app-menu">
         <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-shield"></i><span class="app-menu__label">Administrativo</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="app-menu__item" href="{{route('clientes.index')}}"><i class="app-menu__icon fa fa-id-badge"></i><span class="app-menu__label">Clientes</span></a></li>
                <li><a class="app-menu__item" href="{{route('comercio.index')}}"><i class="app-menu__icon fa fa-id-badge"></i><span class="app-menu__label">Comercio</span></a></li>
                <li><a class="app-menu__item" href="{{route('subscripcion.index')}}"><i class="app-menu__icon fa fa-id-badge"></i><span class="app-menu__label">Subscripcion</span></a></li>
                <li><a class="app-menu__item" href="{{route('catalogoCabecera.index')}}"><i class="app-menu__icon fa fa-id-badge"></i><span class="app-menu__label">Catalogo cabecera</span></a></li>
                <li><a class="app-menu__item" href="{{route('catalogoDetalle.index')}}"><i class="app-menu__icon fa fa-id-badge"></i><span class="app-menu__label">Catalogo detalle</span></a></li>
                <li><a class="app-menu__item" href="{{route('liquidacion.index')}}"><i class="app-menu__icon fa fa-id-badge"></i><span class="app-menu__label">Liquidacion</span></a></li>
                <li><a class="app-menu__item" href="{{route('fecha.index')}}"><i class="app-menu__icon fa fa-id-badge"></i><span class="app-menu__label">Fecha</span></a></li>
                <li><a class="app-menu__item" href="{{route('feriado.index')}}"><i class="app-menu__icon fa fa-id-badge"></i><span class="app-menu__label">Feriados</span></a></li>
                <li><a class="app-menu__item" href="{{route('transaccion.cabecera')}}"><i class="app-menu__icon fa fa-id-badge"></i><span class="app-menu__label">Transacción</span></a></li>
                <li><a class="app-menu__item" href="{{route('transaccion.detalle')}}"><i class="app-menu__icon fa fa-id-badge"></i><span class="app-menu__label">Detalle Transacción</span></a></li>
            </ul>
        </li>
        <li class="treeview"> <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cogs"></i><span class="app-menu__label">Comercio</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="app-menu__item" href="{{route('producto.index')}}"><i class="app-menu__icon fa fa-id-badge"></i><span class="app-menu__label">Producto</span></a></li>
            </ul>
        </li>


        {{--<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-shield"></i><span class="app-menu__label">Comercio</span><i class="treeview-indicator fa fa-angle-right"></i></a>--}}
            {{--<ul class="treeview-menu">--}}
                {{--<li><a class="treeview-item" href="{{route('comercio.create')}}"><i class="icon fa fa-user"></i> crear</a></li>--}}
                {{--<li><a class="treeview-item" href="{{route('comercio.edit')}}"><i class="icon fa fa-users"></i> editar</a></li>--}}
                {{--<li><a class="treeview-item" href="{{route('comercio.index')}}"><i class="icon fa fa-unlock"></i> principal</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}


        {{-- <li><a class="app-menu__item" href="{{route('administrador.proveedor.index')}}"><i class="app-menu__icon fa fa-id-badge"></i><span class="app-menu__label">Proveedores</span></a></li> --}}

    </ul>
</aside>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1> @yield('icono') @yield('titulo de la pagina')</h1>
            <p>@yield('subtitulo')</p>
        </div>

        @yield('breadcrumbs')

    </div>
    <div class="row">
        @yield('contenido')
    </div>
</main>

<!-- Essential javascripts for application to work-->
<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap-proveedor.min.js"></script>
<script src="/js/main-proveedor.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="/js/plugins/pace.min.js"></script>
<script src="/js/plugins/toastr.js"></script>
<script src=" {{asset('js/plugins/jquery.dataTables.min.js')}}"></script>
    <script src=" {{asset('js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
<script src="{{asset('js/axios.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>
<script>
    var app = new Vue ({
            el:"#header",
            data: {
               cmbDatos : [],
                nombre : '',

            },
            created : function() {
                axios.get('/administrador/consultar/datos-pagina').then(response => {
                        this.cmbDatos = response.data,
                        this.nombre = this.cmbDatos[0].nombre

                    }).catch(error => {
                });


            },

            methods : {



            }
        }
    );
</script>
@yield('js')
</body>
</html>