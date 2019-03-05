@extends('layouts.principal')
@section('titulo',"Bienvenido")
@section('css')
@endsection
@section('direcciones')
@endsection
@section('contenido')
    <div id="contenido">
        <!-- ASIDE -->
        <div id="aside" class="col-md-3">
            {{--<input type="text" id="busqueda" autocomplete="false" display="hide">
            <button id="consulta" v-on:click="consultarNombre" display="hide">Consultar</button>--}}
            <!-- aside Widget -->
            <div class="aside">
                <h3 class="aside-title">Categorias</h3>
                <div class="checkbox-filter">

                    <div class="input-checkbox">
                        <input type="checkbox" id="category-1">
                        <label for="category-1">
                            <span></span>
                            Laptops
                            <small>(120)</small>
                        </label>
                    </div>

                    <div class="input-checkbox">
                        <input type="checkbox" id="category-2">
                        <label for="category-2">
                            <span></span>
                            Celulares
                            <small>(740)</small>
                        </label>
                    </div>

                    <div class="input-checkbox">
                        <input type="checkbox" id="category-3">
                        <label for="category-3">
                            <span></span>
                            Camaras
                            <small>(1450)</small>
                        </label>
                    </div>

                    <div class="input-checkbox">
                        <input type="checkbox" id="category-4">
                        <label for="category-4">
                            <span></span>
                            Accessorios
                            <small>(578)</small>
                        </label>
                    </div>


                </div>
            </div>
            <!-- /aside Widget -->

            <!-- aside Widget -->

            <!-- /aside Widget -->

            <!-- aside Widget -->

            <!-- /aside Widget -->

            <!-- aside Widget -->

            <!-- /aside Widget -->
        </div>
        <!-- /ASIDE -->

        <!-- STORE -->
        <div id="store" class="col-md-9">
            <!-- store top filter -->
            <div class="store-filter clearfix">
                <div class="store-sort">
                    <label>
                        {{--Ordenar por:
                        <select class="input-select">
                            <option value="0">Popular</option>
                            <option value="1">Posiciones</option>
                        </select>--}}
                    </label>

                    <label>
                        Mostrar:
                        <select class="input-select" v-model="datosPorPagina">
                            <option value="20">20</option>
                            <option value="50">50</option>
                        </select>
                    </label>
                </div>

            </div>
            <!-- /store top filter -->

            <!-- store products -->
            <div class="row">

                <!-- product -->
                <div class="col-md-4 col-xs-6" v-for="dato in tabla">
                    <div class="product">
                        <div class="product-img">
                            <img src="./img/product02.png" alt="">
                            <div class="product-label">
                            </div>
                        </div>
                        <div class="product-body">
                            <p class="product-category">Categoria</p>
                            <h3 class="product-name" @click="producto(dato.big_cp_idComercioProducto)" ><a href="#">@{{dato.var_cp_nombreProducto}}</a></h3>
                            <h4 class="product-price"> @{{dato.mon_cp_valor}} </h4>
                            <div class="product-rating">
                                <div v-if="dato.int_td_Puntuacion == 1 ">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div v-if="dato.int_td_Puntuacion == 2 ">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div v-if="dato.int_td_Puntuacion == 3 ">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div v-if="dato.int_td_Puntuacion == 4">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div v-if="dato.int_td_Puntuacion == 5">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>

                            </div>

                        </div>
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn" @click="addCarrito(dato.var_cp_nombreProducto,dato.mon_cp_valor,var_url)"><i class="fa fa-shopping-cart"></i> Añadir al carrito</button>
                        </div>
                    </div>
                </div>
                <!-- /product -->

                <div class="clearfix visible-sm visible-xs"></div>
                <div class="clearfix visible-sm visible-xs"></div>
                <div class="clearfix visible-sm visible-xs"></div>
                <div class="clearfix visible-lg visible-md"></div>
                <div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>



            </div>
            <!-- /store products -->

            <!-- store bottom filter -->
            <div class="store-filter clearfix" v-if="datosNumber !== 0">
                <span class="store-qty">Mostrando @{{ paginacion.to }} -@{{paginacion.total}} productos</span>
                <ul class="store-pagination">
                    <li class="page-item" v-if="paginacion.current_page > 1">
                        <a class="page-link" href="#" @click.prevent="changePage(paginacion.current_page - 1 )" >
                            <i class="fa fa-angle-left"></i>
                        </a>
                    </li>
                    <li class="page-item" v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'page-item active' : 'page-item']">
                        <a class="page-link" href="#" @click.prevent="changePage(page)"  >@{{page}}</a>
                    </li>
                    <li class="page-item" v-if="paginacion.current_page < paginacion.last_page"  >
                        <a class="page-link" href="#"  @click.prevent="changePage(paginacion.current_page + 1 )">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /store bottom filter -->
        </div>
        <!-- /STORE -->
    </div>

@endsection
@section('js')
    <script>
        var app = new Vue ({
                el:"#contenido",
                data: {
                    /* paginacion */
                    paginacion : {
                        'total' : 0,
                        'current_page' : 0,
                        'per_page' : 0,
                        'last_page' : 0,
                        'from' : 0,
                        'to': 0,
                    },
                    datosPorPagina : 0,
                    offset: 5,
                    datos :[],
                    tabla : [],
                    categorias : [],
                    categoriasSeleccionadas : [],
                    nombre : '',

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

                        return this.tabla.length;
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
                created : function() {
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": true,
                        "onclick": null,
                        "showDuration": "600",
                        "hideDuration": "3000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    this.load()
                },

                methods : {

                    producto : function(id){
                        var link = document.createElement("a");
                        var dir = "/detalle/"+id;
                        link.setAttribute("href",dir);
                        link.click();
                    },

                    cargarCategorias : function(){

                    },

                    consultarCategoria : function(){
                        this.load(0)
                    },

                    consultarNombre : function(){
                        this.load(0)
                    },

                    //--------------------- PAGINACION ---------------------------------------//
                    load : function(page) {
                        var url;
                        if(page !== undefined){
                           url = '/productos/search/'+this.datosPorPagina+'/'+page+'/'+this.categoriasSeleccionadas+'/'+this.nombre
                        }else {
                            url = '/productos/search/'+this.datosPorPagina+'/'+0+'/'+this.categoriasSeleccionadas+'/'+this.nombre
                        }
                        axios.get(url).then(response => {
                            this.datos = response.data;
                            this.tabla = this.datos.data

                        this.paginacion.total = this.datos.total;
                        if(page == undefined) {
                            this.paginacion.current_page = this.datos.current_page;
                        }
                        this.paginacion.per_page = this.datos.per_page;
                        this.paginacion.last_page = this.datos.last_page;
                        this.paginacion.from = this.datos.from;
                        this.paginacion.to = this.datos.to;
                    }).catch(error => {
                            console.log(error);
                        this.load();
                    });
                    },

                    changePage: function(page) {
                        this.paginacion.current_page = page;
                        this.load(page)
                    },

                    changeNumberPage :function(page) {
                        this.load(page)
                    }

                    addCarrito : function(var_prodcuto,var_precio,var_url) {
                        var producto = var_prodcuto
                        var precio = var_precio
                        var url = var_url
                        /* var cantidad = document.getElementById("cantidad").value;
     */
                        var	cantidad = 1


                        datos = precio.concat(',',cantidad,url);
                        //sessionStorage.setItem(producto, datos);
                        sessionStorage.setItem(producto, datos);

                        this.mostrar()
                    },

                    mostrar : function(){
                        var elemento = document.getElementById("cart-list");
                        var subtotal=0;
                        var total = 0;

                        for(var i = 0; i < sessionStorage.length; i++){
                            var producto = sessionStorage.key(i)

                            var elementos = sessionStorage.getItem(producto);

                            var array = this.dividirCadena(elementos,',')


                            // hacer un conjunto de inserciones
                            var string;
                            var product = document.createElement("div");
                            product.setAttribute("class","product-widget")


                            var divImagen = document.createElement("div");
                            divImagen.setAttribute("class","product-img")

                            var img = document.createElement("img");
                            img.setAttribute("src",array[2])

                            divImagen.appendChild(img);


                            var productBody = document.createElement("div");
                            productBody.setAttribute("class","product-body")



                            var productName = document.createElement("h3");
                            productName.setAttribute("class","product-name")
                            productName.innerHTML = producto

                            var productPrice = document.createElement("h4");
                            productPrice.setAttribute("class","product-price")

                            var cantidad = document.createElement("span")
                            cantidad.setAttribute("class",'qty')
                            cantidad.innerHTML = array[1]+"x"

                            var precio = document.createElement("span")
                            precio.innerHTML = array[0]


                            productPrice.appendChild(cantidad) // insertamos la cantidad
                            productPrice.appendChild(precio) // insertamos la cantidad



                            productBody.appendChild(productName)
                            productBody.appendChild(productPrice)

                            product.appendChild(divImagen)
                            product.appendChild(productBody)

                            elemento.appendChild(product)

                            subtotal =	this.calcularSubTotal(array[0],array[1])

                        }
                        item = document.getElementById("items-select")
                        cantidad = document.getElementById("cantidad")
                        item.innerHTML = sessionStorage.length+' elemento(s) selecionados'
                        cantidad.innerHTML = sessionStorage.length
                        total += subtotal;
                        document.getElementById("subtotal-car").innerHTML = 'TOTAL: $'+total



                    },

                    calcularSubTotal : function (precio, cantidad) {
                    string = precio.substr(1);
                    valor = parseFloat(string);

                    subTotal = parseFloat(cantidad) * valor
                    return subTotal
                },

                 dividirCadena : function(cadenaADividir, separador) {
                    var arrayDeCadenas = cadenaADividir.split(separador);
                    return arrayDeCadenas;
                },



        //--------------------- PAGINACION ---------------------------------------//



                }
            }
        );


    </script>

@endsection
