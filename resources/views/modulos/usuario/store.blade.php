@extends('layouts.principal')
@section('title',"Bienvenido")
@section('css')
    <style>
        .menu{
            width:2.2rem;
            height: 2.7rem;
            background: #a3d7ff;
            border-radius: 0.5rem;
            position: absolute;
            top:50%;
            left: 5%;
            font-family: sans-serif;
            font-size: 2rem;
            color: white;
            text-align: center;
            transition: left 0.7s;
        }

        .aside {
            margin-right:30px;
        }

        #price-slider {
            margin-bottom: 15px;
        }
        .noUi-target{
            background-color: #FFF;
            -webkit-box-shadow: none;
            box-shadow: none;
            border: 1px solid #E4E7ED;
            border-radius: 0px;
        }
        .noUi-ltr{

        }
        .noUi-horizontal{
            height: 6px;
        }

        .checkbox:checked ~ .menu {
            left: -40%;
            border-radius: 0 0.5rem 0.5rem 0;
        }

        .checkbox:checked ~ .left-panel {
            left: 0;
            width: 100%;
            height: 20%;
            position: relative;
        }

        .left-panel {
            width: 0;
            height: 0;
            background: #FBFBFC;
            position: absolute;
            top:35%;
            left: -20%;
            display: flex;
            align-items: left;
            justify-content: center;
            transition: left 0.4s;
        }

        .checkbox {
            display: none;
        }
        .filtro{
            background: #515f69;
            font-size: 18px;
        }
    </style>
@endsection
@section('nombre_breadcrumb')
@endsection
@section('breadcrumb_tree')
@endsection
@section('contenido')
    <div class="section" id="productos">
        <input type="checkbox" class="checkbox" id="check" style="display: none">
        <div class="left-panel">
            <div>
                <p>Categorias</p>
                    <div >
                        <select class="form-control" v-model="categoria" v-on:change="cambioCategoria">
                            <option value="0">SIN FILTRO</option>
                            <option v-for="dato in cmbCategorias" :value="dato.id"> @{{ dato.nombre }}</option>
                        </select>
                    </div>
                <hr>
                <p>Subcategoria</p>
                <div v-if="categoria ==! 0">
                    <select class="form-control" v-model="subcategoria" v-on:change="filtro()" >
                        <option value="0">SIN FILTRO</option>
                        <option v-for="dato in cmbSubCategorias" :value="dato.id"> @{{ dato.nombre }}</option>
                    </select>
                </div>
                <hr>
                <p>Marcas</p>
                <div >
                    <label v-for="dato in cmbMarcas"><input  type="checkbox" v-model="marca" :value="dato.id" v-on:change="filtro()"> @{{dato.nombre}}</label>
                </div>
                <hr>
                <p> precio</p>
                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Price</h3>
                    <div class="price-filter">
                        <div id="price-slider" class="noUi-target noUi-ltr noUi-horizontal">

                        </div>
                        <div class="input-number price-min">
                            <input id="price-min" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                        <span>-</span>
                        <div class="input-number price-max">
                            <input id="price-max" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                    </div>
                </div>
                <!-- /aside Widget -->
                <br>
            </div>
        </div>
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- STORE -->
                <div id="store" class="col-md-12">
                    <!-- store top filter -->
                    <div class="store-filter clearfix" style="display: none">
                        <div class="store-sort">
                            <label>
                                Sort By:
                                <select class="input-select">
                                    <option value="0">Popular</option>
                                    <option value="1">Position</option>
                                </select>
                            </label>

                            <label>
                                Show:
                                <select class="input-select">
                                    <option value="0">20</option>
                                    <option value="1">50</option>
                                </select>
                            </label>
                        </div>
                        <ul class="store-grid">
                            <li class="active"><i class="fa fa-th"></i></li>
                            <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                        </ul>
                    </div>
                    <!-- /store top filter -->
                    <div><p class="text-center filtro"> <label for="check" >Filtros</label></p></div>
                    <!-- store products -->
                    <div class="row">
                        <!-- product -->
                        <div class="col-md-4 col-xs-6" v-for="dato in productos">
                            <div class="product">
                                <div class="product-img">
                                    <img :src="dato.imagen" alt="">
                                    <div class="product-label" style="display: none">
                                        <span class="sale">-30%</span>
                                        <span class="new">NEW</span>
                                    </div>
                                </div>
                                <div class="product-body">
                                    <p class="product-category"> @{{dato.categoria}}</p>
                                    <h3 class="product-name"><a v-bind:href="'/detalles/'+dato.id">@{{dato.prooducto}}</a> </h3>
                                    <h4 class="product-price"> <span>$</span> @{{dato.precio}} <del style="display:none" class="product-old-price">$990.00</del></h4>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product-btns" style="display:none">
                                        <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                        <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                        <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                    </div>
                                </div>
                                <div class="add-to-cart">
                                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                </div>
                            </div>
                        </div>
                        <!-- /product -->
                    </div>
                    <!-- /store products -->

                    <!-- store bottom filter -->
                    <div class="store-filter clearfix">
                        <span class="store-qty">mostrando 1-2 productos</span>
                        <ul class="store-pagination">
                            <li v-if="paginacion.current_page > 1">
                                <a href="#" @click.prevent="changePage(paginacion.current_page - 1 )" >
                                    <i class="fa fa-angle-left"></i>
                                </a>
                            </li>
                            <li  v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']">
                                <a href="#" @click.prevent="changePage(page)"  > @{{page}}</a>
                            </li>
                            <li v-if="paginacion.current_page < paginacion.last_page"  >
                                <a href="#" @click.prevent="changePage(paginacion.current_page + 1 )">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /store bottom filter -->
                </div>
                <!-- /STORE -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
@endsection
@section('js')
    <script src="/js/plugins/toastr.js"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>
    <script>
        var app = new Vue ({
            el:"#productos",
            data: {
                categoria : 0,
                marca : [],
                subcategoria : [],
                cmbCategorias : [],
                cmbSubCategorias : [],
                cmbMarcas: [],
                cmbproductos : [],
                productos : [],
                paginacion : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to': 0,
                },
                offset: 3,

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
                }


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
                this.obtenerPaginas();
                this.consultarCategorias();
                this.consultarMarcas();
            },


            methods : {

                obtenerPaginas : function(page) {
                    //if( this.marca.length !==0 || this.categoria.length !==0 || this.subcategoria.length !== 0){
                      //  this.filtro(page)
                    //}
                    var url = page !== undefined ?  '/productos/'+page : '/productos';
                    axios.get(url).then(response => {
                        this.cmbproductos  = response.data;
                    this.productos = this.cmbproductos.data;
                    this.paginacion.total = this.cmbproductos.total;
                    if(page == undefined) {
                        this.paginacion.current_page = this.cmbproductos.current_page;
                    }
                    this.paginacion.per_page = this.cmbproductos.per_page;
                    this.paginacion.last_page = this.cmbproductos.last_page;
                    this.paginacion.from = this.cmbproductos.from;
                    this.paginacion.to = this.cmbproductos.to;

                    })
                },

                detalle: function(id){
                   var parametros = {
                        "id" : id
                    };
                    $.ajax({
                        data : parametros,
                        url : "/detalles",
                        type : "post",
                        async : true,
                        success : function(d){
                            toastr.success('Registro eliminado con exito.', 'Alerta', {timeOut: 8000});
                        },
                        error : function (response,jqXHR) {


                            if(response.status === 422)
                            {
                                // captura los errores en una variable
                                var errors = $.parseJSON(response.responseText);
                                // recorre los errores
                                $.each(errors, function (key, value) {
                                    // pasa el error del controlador
                                    if($.isPlainObject(value)) {
                                        $.each(value, function (key, value) {
                                            toastr.error('Error: '+value+'', 'Error', {timeOut: 5000});
                                            console.log(key+ " " +value);
                                        });
                                    }else{
                                        // es un error general
                                        console.log(response);
                                        toastr.error('Error '+response+' al momento guardar el nuevo proveedor.', 'Error', {timeOut: 5000});
                                    }
                                });
                            } else {
                                console.log(response.responseText);
                                toastr.error('Error: '+response.status, 'Error', {timeOut: 5000});
                            }
                            //toastr.error('Error al momento de crear el permiso.', 'Alerta', {timeOut: 8000});

                        }
                    });
                },

                changePage: function(page) {
                    this.paginacion.current_page = page;
                    this.obtenerPaginas(page);
                },

                numeroPaginas : function() {
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
                        this.resultado.push(from);
                        from++;
                    }
                    return pagesArray;
                },

                //------------------consultas ------------------------- //
                 consultarCategorias : function() {
                     var url = '/categorias' ;
                     axios.get(url).then(response => {
                            this.cmbCategorias= response.data;
                        }).catch(error => {
                            console.log(error);
                        this.consultarCategorias();
                     });
                 },
                consultarMarcas : function() {
                    var url = '/marcas' ;
                    axios.get(url).then(response => {
                        this.cmbMarcas= response.data;

                        }).catch(error => {
                            console.log(error);
                            this.consultarMarcas();
                    });
                },
                cambioCategoria : function () {
                    var url = '/subcategorias/'+this.categoria ;
                    axios.get(url).then(response => {
                            this.cmbSubCategorias= response.data;
                        }).catch(error => {
                            console.log(error);
                            this.cambioCategoria();
                    });
                },
                //------------------/consultas/------------------------- //
                filtro : function (page) {
                    console.log("filtro");
                    var url = page !== undefined ?  '/filtro/'+page : '/filtro';
                    axios.post(url,{
                       // categoria : this.categoria,
                        subcategoria : this.subcategoria,
                        marca : this.marca
                    }).then(response => {
                        this.cmbproductos  = response.data;
                        this.productos = this.cmbproductos.data;
                        this.paginacion.total = this.cmbproductos.total;
                        if(page == undefined) {
                            this.paginacion.current_page = this.cmbproductos.current_page;
                        }
                        this.paginacion.per_page = this.cmbproductos.per_page;
                        this.paginacion.last_page = this.cmbproductos.last_page;
                        this.paginacion.from = this.cmbproductos.from;
                        this.paginacion.to = this.cmbproductos.to;
                        console.log('exito');

                        }).catch(error => {
                            console.log(error);
                            //this.filtro(page);
                    });
                }
            }
        });
    </script>
@endsection




