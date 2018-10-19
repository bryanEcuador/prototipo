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
                        <div class="col-md-4 col-xs-6" v-for="dato in cmbproductos">
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
                            <li class="active">1</li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.2.0/vue.js"></script>
    <script>
        var app = new Vue ({
            el:"#productos",
            data: {
                cmbproductos : []
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



            },


            methods : {

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
                }
            }
        });
    </script>
@endsection




