@extends('layouts.principal')
@section('title',"Bienvenido")
@section('css')
    <style>
        .color_panel_box span{width: 30px;height: 30px;display: block;margin-left: 30px;border-radius: 20%;
            float: left;margin-top: 0px;margin-bottom: 4px; border: 2px; border-style: dashed   ;
        }

    </style>
    <link rel="stylesheet" href=" {{asset('css/imagenes/normalize.css')}} " />

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
    <div class="container" id="detalles">
        <!-- row -->
            <!-- default start -->
            <div class="col-md-8 ">
                        <div class="xzoom-container">
                            <img class="xzoom"  v-bind:src="imagen1" />
                            <div class="xzoom-thumbs">
                                <a v-bind:href="imagen1"><img class="xzoom-gallery" width="80" v-bind:src="imagen1"  v-bind:xpreview="imagen1" title="The description goes here"></a>
                                <a v-bind:href="imagen2"><img class="xzoom-gallery" width="80" v-bind:src="imagen2" title="The description goes here"></a>
                                <a v-bind:href="imagen3"><img class="xzoom-gallery" width="80" v-bind:src="imagen3" title="The description goes here"></a>
                                <a v-bind:href="imagen4"><img class="xzoom-gallery" width="80" v-bind:src="imagen4"title="The description goes here"></a>
                                <a v-bind:href="imagen5"><img class="xzoom-gallery" width="80" v-bind:src="imagen5" title="The description goes here"></a>
                            </div>
                        </div>
            </div>
            <!-- default end -->
            <!-- Product details -->
            <div class="col-md-4">
                <div class="product-details">
                    <h2 class="product-name"> {{$producto[0]->nombre}}</h2>
                    <div>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <a class="review-link" href="#">10 Comentarios del prodcuto(s) | Agrega tu comentario</a>
                    </div>
                    <div>
                        <h3 class="product-price"> <span>$</span> {{$producto[0]->precio}} <del class="product-old-price">$990.00</del></h3>
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
                                <input type="number">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                        </div>

                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Comprar</button>
                    </div>
                    <ul class="product-links">
                        <li>Categoria:</li>
                        <li><a href="#">Headphones/subcategoria</a></li>
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
                    <li><a data-toggle="tab" href="#tab3">Comentarios (3)</a></li>
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
                                        <span>4.5</span>
                                        <div class="rating-stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
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
                                                <div style="width: 80%;"></div>
                                            </div>
                                            <span class="sum">3</span>
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
                                                <div style="width: 60%;"></div>
                                            </div>
                                            <span class="sum">2</span>
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
                                                <div></div>
                                            </div>
                                            <span class="sum">0</span>
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
                                                <div></div>
                                            </div>
                                            <span class="sum">0</span>
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
                                                <div></div>
                                            </div>
                                            <span class="sum">0</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /Rating -->

                            <!-- Reviews -->
                            <div class="col-md-6">
                                <div id="reviews">
                                    <ul class="reviews">
                                        <li>
                                            <div class="review-heading">
                                                <h5 class="name">John</h5>
                                                <p class="date">27 DEC 2018, 8:0 PM</p>
                                                <div class="review-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o empty"></i>
                                                </div>
                                            </div>
                                            <div class="review-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="review-heading">
                                                <h5 class="name">John</h5>
                                                <p class="date">27 DEC 2018, 8:0 PM</p>
                                                <div class="review-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o empty"></i>
                                                </div>
                                            </div>
                                            <div class="review-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="review-heading">
                                                <h5 class="name">John</h5>
                                                <p class="date">27 DEC 2018, 8:0 PM</p>
                                                <div class="review-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o empty"></i>
                                                </div>
                                            </div>
                                            <div class="review-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="reviews-pagination">
                                        <li class="active">1</li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /Reviews -->

                            <!-- Review Form -->
                            <div class="col-md-3">
                                <div id="review-form">
                                    <form class="review-form">
                                        <textarea class="input" placeholder="tu calificación"></textarea>
                                        <div class="input-rating">
                                            <span>Tu calificación: </span>
                                            <div class="stars">
                                                <input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                                                <input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                                                <input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                                                <input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                                                <input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                                            </div>
                                        </div>
                                        <button class="primary-btn">Enviar</button>
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
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection
@section('js')

    <script src="/js/plugins/toastr.js"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>
    <script>
        var app = new Vue ({
            el:"#detalles",
            data: {
                cmbproductos : [],
                cmbImagenes : [],
                imagen1 : '',
                imagen2 : '',
                imagen3 : '',
                imagen4 : '',
                imagen5 : '',
                colores : [],
                cmbColores : [],
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


                axios.get('/productos').then(response => {
                    this.cmbproductos  = response.data
                })

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




            },


            methods : {

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
                }
            }
        });
    </script>
@endsection