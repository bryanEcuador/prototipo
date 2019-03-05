@extends('layouts.principal')
@section('titulo',"Bienvenido")
@section('css')
@endsection
@section('direcciones')
@endsection
@section('contenido')
    <div id="contenido">

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
                    },

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
