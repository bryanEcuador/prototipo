@extends('layouts.principal')
@section('title',"Bienvenido")
@section('css')
    <style>
        .color_panel_box span{width: 30px;height: 30px;display: block;margin-left: 30px;border-radius: 20%;
            float: left;margin-top: 0px;margin-bottom: 4px; border: 2px; border-style: dashed   ;
        }

    </style>
    <link rel="stylesheet" href=" {{asset('css/imagenes/normalize.css')}} " />
    <link rel="stylesheet" type="text/css" href="/css/toastr.css">
    <link rel="stylesheet" href="{{asset('css/imagenes/demo.css')}} " />

    <script src=" {{asset('js/imagenes/vendor/modernizr.js')}}"></script>
    <script src=" {{asset('js/imagenes/vendor/jquery.js')}}"></script>
    <!-- xzoom plugin here -->
    <script type="text/javascript" src=" {{asset('js/imagenes/xzoom.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/imagenes/xzoom.css')}}" media="all" />
    <!-- hammer plugin here -->
    <script type="text/javascript" src={{asset('js/imagenes/xzoom.min.js')}}"hammer.js/1.0.5/jquery.hammer.min.js"></script>
    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link type="text/css" rel="stylesheet" media="all" href="{{asset('css/imagenes/fancybox/source/jquery.fancybox.css')}}" />
    <link type="text/css" rel="stylesheet" media="all" href="{{asset('css/imagenes/magnific-popup.css')}}" />
    <script type="text/javascript" src="{{asset('js/imagenes/jquery.fancybox.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/imagenes/magnific-popup.js')}}"></script>
    <script src="{{asset('js/imagenes/foundation.min.js')}}"></script>
    <script src="{{asset('js/imagenes/setup.js')}}"></script>
@endsection
@section('nombre_breadcrumb')
@endsection
@section('breadcrumb_tree')
@endsection
@section('contenido')
<!-- SECTION -->
<div class="section" >
    <!-- container -->
    <div class="container" id="detalles" v-cloak="">
        <!-- row -->
            <!-- default start -->
            <div class="col-md-8 ">
                        <div class="xzoom-container">
                            <img class="xzoom"  v-bind:src="imagen1" />
                            <div class="xzoom-thumbs">
                                <a v-bind:href="imagen1"><img class="xzoom-gallery" width="80" v-bind:src="imagen1"  v-bind:xpreview="imagen1" ></a>
                                <a v-bind:href="imagen2"><img class="xzoom-gallery" width="80" v-bind:src="imagen2" ></a>
                                <a v-bind:href="imagen3"><img class="xzoom-gallery" width="80" v-bind:src="imagen3" ></a>
                                <a v-bind:href="imagen4"><img class="xzoom-gallery" width="80" v-bind:src="imagen4"></a>
                                <a v-bind:href="imagen5"><img class="xzoom-gallery" width="80" v-bind:src="imagen5" ></a>
                            </div>
                        </div>
            </div>
            <!-- default end -->
            <!-- Product details -->
            <div class="col-md-4">
                <div class="product-details">
                    <h2 class="product-name"> {{$producto[0]->nombre}} </h2>
                    <div>
                                        <div v-if="promedio == 5" class="rating-stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div v-else-if="promedio == 4" class="rating-stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div v-else-if="promedio == 3" class="rating-stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>                                    
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div v-else-if="promedio == 2" class="rating-stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>                                    
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                         <div v-else-if="promedio == 1" class="rating-stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>                                    
                                            <i class="fa fa-star-o"></i>
                                        </div>
                        <a class="review-link" href="#"> @{{total}} Comentarios del prodcuto(s)</a>
                    </div>
                    <div>
                        <h3 class="product-price"> <span>$</span> {{$producto[0]->precio}} </h3>
                        <span class="product-available">En Stock</span>
                    </div>
                    <p>{{$producto[0]->descripcion}}</p>

                    <div class="product-options">
                        <label style="display: none">
                            Tamaño
                            <select class="input-select">
                                <option value="0">X</option>
                            </select>
                        </label><br>
                        <div class="color_panel_box">
                            <p>colores:</p>
                            <span v-for="data in cmbColores" v-on:click="cambioImagen(data.id)" v-bind:style="{'background-color': data.hexadecimal}" ></span>
                        </div>
                    <br>
                    <br>
                    <div class="add-to-cart">
                        <div class="qty-label">
                            Cantidad
                            <div class="input-number">
                                <input type="number" min="0" v-model="valor" readonly>
                                <span class="qty-up" v-on:click="cantidad('s')">+</span>
                                <span class="qty-down"  v-on:click="cantidad('r')">-</span>
                            </div>
                        </div>

                        <button class="add-to-cart-btn" v-on:click="comprar({{$producto[0]->id}})"><i class="fa fa-shopping-cart"></i> Comprar</button>
                        <button type="button"  data-toggle="modal" id="login" data-target="#myModal">Open Modal</button>
                    </div>
                    <ul class="product-links">
                        <li>Categoria:</li>
                        <li>  <del>sp</del>          <a href="#"></a></li>
                    </ul>

                </div>
            </div>
            <!-- /Product details -->

        <!-- /row -->
    </div>
        <!-- Product tab -->
        <div class="col-md-12">
            <div id="product-tab">
                <!-- product tab nav -->
                <ul class="tab-nav">
                    <li class="active"><a data-toggle="tab" href="#tab1">Descripcion</a></li>
                    <li><a data-toggle="tab" href="#tab2">Detalles</a></li>
                    <li><a data-toggle="tab" href="#tab3">Comentarios (@{{total}})</a></li>
                </ul>
                <!-- /product tab nav -->

                <!-- product tab content -->
                <div class="tab-content">
                    <!-- tab1  -->
                    <div id="tab1" class="tab-pane fade in active">
                        <div class="row">
                            <div class="col-md-12">
                                <p>{{$producto[0]->descripcion}}</p>
                            </div>
                        </div>
                    </div>
                    <!-- /tab1  -->

                    <!-- tab2  -->
                    <div id="tab2" class="tab-pane fade in">
                        <div class="row">
                            <div class="col-md-12">
                                <p>Descripción con detalle de las caracteristicas del producto</p>
                            </div>
                        </div>
                    </div>
                    <!-- /tab2  -->

                    <!-- tab3  -->
                    <div id="tab3" class="tab-pane fade in">
                        <div class="row">
                            <!-- Rating -->
                            <div class="col-md-3">
                                <div id="rating">
                                    <div class="rating-avg">
                                        <span>@{{promedio}}</span>
                                        <div v-if="promedio == 5" class="rating-stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div v-else-if="promedio == 4" class="rating-stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div v-else-if="promedio == 3" class="rating-stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>                                    
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div v-else-if="promedio == 2" class="rating-stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>                                    
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                         <div v-else-if="promedio == 1" class="rating-stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>                                    
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                    </div>
                                    <ul class="rating">
                                        <li>
                                            <div class="rating-stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="rating-progress">
                                                <div :style="{'width':porcen5+'%'}"></div>
                                            </div>
                                            <span class="sum">@{{quinto}}</span>
                                        </li>
                                        <li>
                                            <div class="rating-stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <div class="rating-progress">
                                                <div :style="{'width':porcen4+'%'}"></div>
                                            </div>
                                            <span class="sum">@{{cuarto}}</span>
                                        </li>
                                        <li>
                                            <div class="rating-stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <div class="rating-progress">
                                                <div :style="{'width':porcen3+'%'}"></div>
                                            </div>
                                            <span class="sum">@{{tercero}}</span>
                                        </li>
                                        <li>
                                            <div class="rating-stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <div class="rating-progress">
                                                <div :style="{'width':porcen2+'%'}"></div>
                                            </div>
                                            <span class="sum"></span>@{{segundo}}</span>
                                        </li>
                                        <li>
                                            <div class="rating-stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <div class="rating-progress">
                                                <div :style="{'width':porcen1+'%'}"></div>
                                            </div>
                                            <span class="sum">@{{primero}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /Rating -->

                            <!-- Reviews -->
                            <div class="col-md-6">
                                <div id="reviews">
                                    <ul class="reviews">
                                        <li v-for="item in comentarios">
                                            <div class="review-heading">
                                                <h5 class="name"> @{{item.usuario}}</h5>
                                                <p class="date">@{{devolverFecha(item.updated_at)}}</p>
                                                <div class="review-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o empty"></i>
                                                </div>
                                            </div>
                                            <div class="review-body">
                                                <p>@{{item.comentario}}</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="reviews-pagination">
                                    <li class="page-item" v-if="paginacion.current_page > 1">
                                        <a  href="#" @click.prevent="changePage(paginacion.current_page - 1 )" >
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>
                                     <li  v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']">
                                        <a href="#" @click.prevent="changePage(page)"  >@{{page}}</a>
                                    </li>
                                    <li  v-if="paginacion.current_page < paginacion.last_page"  >
                                        <a  href="#"  @click.prevent="changePage(paginacion.current_page + 1 )">
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /Reviews -->

                            <!-- Review Form -->
                            <div class="col-md-3">
                                <div id="review-form">
                                    <form class="review-form">
                                        <input type="text" v-model="usuario" class="input" placeholder="nombre del usuario" maxlength="10">
                                        <textarea class="input"  maxlength="80" placeholder="tu calificación" v-model="comentarioProducto"></textarea>
                                        <div class="input-rating">
                                            <span>Tu calificación: </span>
                                            <div class="stars">
                                                <input id="star5" name="rating" v-model="raiting" value="5" type="radio"><label for="star5"></label>
                                                <input id="star4" name="rating" v-model="raiting" value="4" type="radio"><label for="star4"></label>
                                                <input id="star3" name="rating" v-model="raiting" value="3" type="radio"><label for="star3"></label>
                                                <input id="star2" name="rating" v-model="raiting" value="2" type="radio"><label for="star2"></label>
                                                <input id="star1" name="rating" v-model="raiting" value="1" type="radio"><label for="star1"></label>
                                            </div>
                                        </div>
                                        <button class="primary-btn"type="button"  v-on:click="enviarComentario">Enviar</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /Review Form -->
                        </div>
                    </div>
                    <!-- /tab3  -->
                </div>
                <!-- /product tab content  -->
            </div>
        </div>
        <!-- /product tab -->

        <!----modal-->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="limiter">
                    <div class="container-login100">
                        <div class="wrap-login100">
                            <div class="login100-pic js-tilt" data-tilt>
                                <img src="images/img-01.png" alt="IMG">
                            </div>

                            <form class="login100-form validate-form">
                    <span class="login100-form-title">
                        Iniciar sesión
                    </span>

                                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                                    <input class="input100" type="text" name="email" placeholder="Email" v-model="email">
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                                </div>

                                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                                    <input class="input100" type="password" name="pass" placeholder="Password" v-model="pass">
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                                </div>

                                <div class="container-login100-form-btn">
                                    <button type="button" class="login100-form-btn" v-on:click="inicarSesion">
                                        Iniciar Sesión
                                    </button>
                                </div>

                                <div class="text-center p-t-12">
                        <span class="txt1">
                           Olvidaste
                        </span>
                                    <a class="txt2" href="#">
                                        tu contraseña?
                                    </a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
        <!----modal-->
    <!-- /container -->


</div>
<!-- /SECTION -->
@endsection
@section('js')

    <script src="/js/plugins/toastr.js"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>
    <script src="{{asset('js/plugins/moment.js')}}"></script>
    <script>
        var app = new Vue ({
            el:"#detalles",
            data: {

                email : '',
                pass : '',

                /* carga de las imagenes y colores */
                cmbproductos : [],
                cmbImagenes : [],
                imagen1 : '',
                imagen2 : '',
                imagen3 : '',
                imagen4 : '',
                imagen5 : '',
                colores : [],
                cmbColores : [],

                /* carga de comentarios */
                id_producto : 0 ,
                comentarios : [],
                calificacion : [],
                promedio :'',
                total : 0,
                primero : 0,
                segundo : 0,
                tercero : 0,
                cuarto : 0,
                quinto : 0,
                porcen1 : 0,
                porcen2 : 0,
                porcen3 : 0,
                porcen4 : 0,
                porcen5 : 0,

                /* comentarios del producto */
                comentarioProducto : '',
                usuario : '',
                raiting : '',

                /* ERRORES */
                errores : [],

                /* paginacion */
                paginacion : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to': 0,
                },
                offset: 3,
                //datos : [],
                sinComentarios : false,

                /*  */
                valor :0,
            },
            created : function() {
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "600",
                    "hideDuration": "3000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
                // moment.js locale configuration
                 //locale : spanish (es)
                // author : Julio Napurí : https://github.com/julionc
                (function (factory) {
                    factory(moment);
                }(function (moment) {
                    var monthsShortDot = 'ene._feb._mar._abr._may._jun._jul._ago._sep._oct._nov._dic.'.split('_'),
                        monthsShort = 'ene_feb_mar_abr_may_jun_jul_ago_sep_oct_nov_dic'.split('_');
                    return moment.defineLocale('es', {
                        months : 'enero_febrero_marzo_abril_mayo_junio_julio_agosto_septiembre_octubre_noviembre_diciembre'.split('_'),
                        monthsShort : function (m, format) {
                            if (/-MMM-/.test(format)) {
                                return monthsShort[m.month()];
                            } else {
                                return monthsShortDot[m.month()];
                            }
                        },
                        weekdays : 'domingo_lunes_martes_miércoles_jueves_viernes_sábado'.split('_'),
                        weekdaysShort : 'dom._lun._mar._mié._jue._vie._sáb.'.split('_'),
                        weekdaysMin : 'Do_Lu_Ma_Mi_Ju_Vi_Sá'.split('_'),
                        longDateFormat : {
                            LT : 'H:mm',
                            LTS : 'LT:ss',
                            L : 'DD/MM/YYYY',
                            LL : 'D [de] MMMM [de] YYYY',
                            LLL : 'D [de] MMMM [de] YYYY LT',
                            LLLL : 'dddd, D [de] MMMM [de] YYYY LT'
                        },
                        calendar : {
                            sameDay : function () {
                                return '[hoy a la' + ((this.hours() !== 1) ? 's' : '') + '] LT';
                            },
                            nextDay : function () {
                                return '[mañana a la' + ((this.hours() !== 1) ? 's' : '') + '] LT';
                            },
                            nextWeek : function () {
                                return 'dddd [a la' + ((this.hours() !== 1) ? 's' : '') + '] LT';
                            },
                            lastDay : function () {
                                return '[ayer a la' + ((this.hours() !== 1) ? 's' : '') + '] LT';
                            },
                            lastWeek : function () {
                                return '[el] dddd [pasado a la' + ((this.hours() !== 1) ? 's' : '') + '] LT';
                            },
                            sameElse : 'L'
                        },
                        relativeTime : {
                            future : 'en %s',
                            past : 'hace %s',
                            s : 'unos segundos',
                            m : 'un minuto',
                            mm : '%d minutos',
                            h : 'una hora',
                            hh : '%d horas',
                            d : 'un día',
                            dd : '%d días',
                            M : 'un mes',
                            MM : '%d meses',
                            y : 'un año',
                            yy : '%d años'
                        },
                        ordinalParse : /\d{1,2}º/,
                        ordinal : '%dº',
                        week : {
                            dow : 1, // Monday is the first day of the week.
                            doy : 4  // The week that contains Jan 4th is the first week of the year.
                        }
                    });
                }));


                axios.get('/productos').then(response => {
                    this.cmbproductos  = response.data
                })

                    this.id_producto = @json($producto[0]->id);
                    this.cmbImagenes = @json($imagenes);
                    this.archivosMultimedias = this.cmbImagenes.length;
                    this.imagen1 = this.cmbImagenes[0].imagen1;
                    this.imagen2 = this.cmbImagenes[0].imagen2;
                    this.imagen3 = this.cmbImagenes[0].imagen3;
                    this.imagen4 = this.cmbImagenes[0].imagen4;
                    this.imagen5 = this.cmbImagenes[0].imagen5;

                    //console.log({!! json_encode($imagenes) !!});
                // obtenemos los colores de las imagenes
                for (const prop in this.cmbImagenes) {
                   this.colores.push( this.cmbImagenes[prop].color_id);
                }

                // enviamos los datos de la consulta
                 $url = '/consultar/colores';
                    axios.post($url, {
                        colores : this.colores,
                        }).then(response => {
                            this.cmbColores= response.data
                        }).catch(error => {
                            console.log(error);
                     });

                this.cargarPromedioComentarios();
                this.cargarComentarios();
            
            },

             computed : {
                isActived : function () {
                    return this.paginacion.current_page;
                },
                pagesNumber: function() {

                    if(!this.paginacion.to){
                        return [];
                    }
                    var from = this.paginacion.current_page - this.offset;
                    if(from < 1){
                        from = 1;
                    }
                    var to = from + (this.offset * 2);
                    if(to >= this.paginacion.last_page){
                        to = this.paginacion.last_page;
                    }
                    var pagesArray = [];
                    while(from <= to){
                        pagesArray.push(from);
                        from++;
                    }
                    return pagesArray;
                },
                datosNumber : function() {

                    return this.paginacionTable.length;
                },
                cantidadPorPagina : function () {
                
                   var inicial = 0;
                    var datos = [];

                   while(true) {
                         inicial = inicial + 5;
                        if(this.paginacion.total <= inicial) { 
                           break;
                       } else {
                           this.datosPorPagina = 5;
                         datos.push(inicial)
                       }
                      
                   }  
                    return datos;           
                },
            },
            methods : {

                inicarSesion : function() {
                    axios.post('/iniciar/sesion',{ email : this.email , password : this.pass }).then( response => {
                        toastr.success("sesión iniciada");
                    }).catch(error => {

                    });
                },

                comprar : function() {
                    // consulta
                    axios.get('/validar/sesion').then( response => {
                        if(response.data == 1){
                        axios.get('/comprar/'+this.id_producto).then(response => {
                            if(response.data == 1) {
                                toastr.success("compra registrada");
                            }else {
                                toastr.error("Usted tiene una compra en curso");
                            }
                        })
                    }else {
                        document.getElementById("login").click();
                    }
                    }).catch(error => {
                       this.comprar();
                    });
                        // sesion iniciada

                        //sesion no iniciada

                },

                devolverFecha : function(fecha) {
                    moment.locale('es');
                    return moment(fecha, "YYYYMMDD").fromNow(); //fecha;
                },

                cambioImagen : function(id_color){
                    for (const prop in this.cmbImagenes) {
                        if(this.cmbImagenes[prop].color_id === id_color) {
                            this.imagen1 = this.cmbImagenes[prop].imagen1;
                            this.imagen2 = this.cmbImagenes[prop].imagen2;
                            this.imagen3 = this.cmbImagenes[prop].imagen3;
                            this.imagen4 = this.cmbImagenes[prop].imagen4;
                            this.imagen5 = this.cmbImagenes[prop].imagen5;
                        }
                    }
                },

                cargarComentarios : function(page){
                    var url = page == undefined ? '/comentarios/producto/'+this.id_producto : '/comentarios/producto/'+this.id_producto+'/'+page;
                    axios.get(url).then(response => {
                        console.log(response);
                        this.datos = response.data

                         if(this.datos == 0) {
                             this.sinComentarios = true;
                         } else {
                                             this.comentarios = this.datos.data
                                            this.paginacion.total = this.datos.total;
                                            if (page == undefined) {
                                                this.paginacion.current_page = this.datos.current_page;
                                            }
                                            this.paginacion.per_page = this.datos.per_page;
                                            this.paginacion.last_page = this.datos.last_page;
                                            this.paginacion.from = this.datos.from;
                                            this.paginacion.to = this.datos.to;
                         }  

                        }).catch(error => {
                            console.log(error);
                            this.cargarComentarios();
                    });
                },

                cargarPromedioComentarios : function() {
                    var url = '/promedio/producto/'+this.id_producto;
                    axios.get(url).then(response => {
                        console.log(response);
                        this.calificacion = response.data,
                        this.promedio = this.calificacion[0].promedio,
                        this.total = this.calificacion[0].total,
                        this.primero = this.calificacion[0].primero,
                        this.segundo = this.calificacion[0].segundo,
                        this.tercero = this.calificacion[0].tercero,
                        this.cuarto = this.calificacion[0].cuarto,
                        this.quinto = this.calificacion[0].quinto

                        this.porcen1 = (this.primero *100) / this.total,
                        this.porcen2 = (this.segundo *100) / this.total,
                        this.porcen3 = (this.tercero *100) / this.total,
                        this.porcen4 = (this.cuarto *100) / this.total,
                        this.porcen5 = (this.quinto *100) / this.total,
                         

                        this.promedio = parseInt(this.promedio); /* TODO */


                        }).catch(error => {
                            console.log(error);
                            this.cargarPromedioComentarios();
                    });
                },

                enviarComentario : function () {

                    if(this.usuario == ''){
                        this.errores.push("el nombre no puede estar vacio")
                    }

                    if(this.comentarioProducto == ''){
                        this.errores.push("Debe agregar un comentario")
                    }

                    if(this.raiting == ''){
                         this.errores.push("Debe agregar la calificación del producto")
                    }

                    if( this.errores.length === 0) {
                        
                        this.guardarComentario();
                        } else {
                        var num = this.errores.length;
                        for(i=0; i<num;i++) {
                            toastr.error(this.errores[i]);
                        }
                    }
                    this.errores = [];
                },
                
                guardarComentario : function() {
                    $url = '/guardar/comentarios';
                        axios.post($url, {
                                usuario : this.usuario.toLowerCase(),
                                comentario : this.comentarioProducto.toLowerCase(),
                                calificacion : this.raiting,
                                producto : this.id_producto ,
                        
                            }).then(response => {
                                    toastr.success('Comentario grabado.', 'Exito', {timeOut: 5000});
                                    this.limpiar();
                                    this.cargarComentarios();

                            }).catch(response => {
                                toastr.error( "Error al momento de guardar el comentario ");
                                console.log(response);
                                if(response.status === 422)
                                {
                                    var errors = $.parseJSON(response.responseText);
                                    $.each(errors, function (key, value) {
                                        if($.isPlainObject(value)) {
                                            $.each(value, function (key, value) {
                                                toastr.error('Error en el controlador: '+value+'', 'Error', {timeOut: 5000});
                                                console.log(key+ " " +value);
                                            });
                                        }else{
                                            toastr.error('Error '+response+' al momento de crear el permiso.', 'Error', {timeOut: 5000});
                                        }
                                    });
                                }
                        });

                },

                limpiar : function() {
                     this.usuario = '',
                     this.comentarioProducto = '',
                    this.raiting = ''
                },

                 changePage: function(page) {
                    this.paginacion.current_page = page;
                     this.cargarComentarios(page);
                },

                cantidad : function(operacion) {
                    if(operacion == "s"){
                        this.valor = this.valor +1;
                    }else {
                        if(this.valor !== 0){
                            this.valor = this.valor -1;
                        }
                        
                    }
                }
            }    
        });
    </script>
@endsection