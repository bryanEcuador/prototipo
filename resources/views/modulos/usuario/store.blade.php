@extends('layouts.principal')
@section('title',"Bienvenido")
@section('css')
@endsection
@section('nombre_breadcrumb')
@endsection
@section('breadcrumb_tree')
@endsection
@section('contenido')
    <div class="section" id="productos">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- STORE -->
                <div id="store" class="col-md-12">
                    <!-- store top filter -->
                    <div class="store-filter clearfix">
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
                    <!-- store products -->
                    <div class="row">
                        <!-- product -->
                        <div class="col-md-4 col-xs-6" v-for="dato in productos">
                            <div class="product">
                                <div class="product-img">
                                    <img :src="dato.imagen" alt="">
                                    <div class="product-label">
                                        <span class="sale">-30%</span>
                                        <span class="new">NEW</span>
                                    </div>
                                </div>
                                <div class="product-body">
                                    <p class="product-category"> @{{dato.categoria}}</p>
                                    <h3 class="product-name"><a v-bind:href="'/detalles/'+dato.id">@{{dato.prooducto}}</a> </h3>
                                    <h4 class="product-price"> <span>$</span> @{{dato.precio}} <del class="product-old-price">$990.00</del></h4>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product-btns">
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
                        <span class="store-qty">Showing 20-100 products</span>
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
    <script>
        var app = new Vue ({
            el:"#productos",
            data: {
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




            },


            methods : {

                obtenerPaginas : function(page) {
                    var url;
                    url = page !== undefined ?  '/productos/'+page : '/productos';
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
                }
            }
        });
    </script>
@endsection




