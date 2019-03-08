@extends('layouts.principal')
@section('titulo',"Bienvenido")
@section('css')
@endsection
@section('direcciones')
@endsection
@section('contenido')
    <div id="contenido">
        <div class="col-md-7">
            <!-- Billing Details -->
            <div class="billing-details">
                <div class="section-title">
                    <h3 class="title">DATOS DE ENVIO</h3>
                </div>
                <div class="form-group">
                    <input class="input" type="text" name="first-name" placeholder="Nombre de la persona que envia">
                </div>
                <div class="form-group">
                    <input class="input" type="text" name="last-name" placeholder="Nombre de la persona que recibe">
                </div>
                <div class="form-group">
                    <input class="input" type="email" name="email" placeholder="Correo electronico">
                </div>
                <div class="form-group">
                    <input class="input" type="text" name="address" placeholder="Dirección">
                </div>
                <div class="form-group">
                    <select style="height: 40px;padding: 0px 15px;border: 1px solid #E4E7ED;background-color: #FFF;width: 100%;">
                        <option value="0" selected>--Seleccione la ciudad--</option>
                    </select>
                </div>
                <div class="form-group">
                    <input class="input" type="tel" name="tel" placeholder="Teléfono de contacto">
                </div>
            </div>
            <!-- /Billing Details -->


            <!-- Order notes -->
           {{-- <div class="order-notes">
                <textarea class="input" placeholder="Order Notes"></textarea>
            </div>--}}
            <!-- /Order notes -->
        </div>

        <!-- Order Details -->
        <div class="col-md-5 order-details">
            <div class="section-title text-center">
                <h3 class="title">Tu orden</h3>
            </div>
            <div class="order-summary">
                {{--<div class="order-col">
                    <div><strong>PRODUCTOS</strong></div>
                    <div><strong>TOTAL</strong></div>
                </div>
                <div class="order-products">
                    <div class="order-col">
                        <div>1x Product Name Goes Here</div>
                        <div>$980.00</div>
                    </div>
                    <div class="order-col">
                        <div>2x Product Name Goes Here</div>
                        <div>$980.00</div>
                    </div>
                </div>--}}
                <div class="order-col">
                    <div>Envio</div>
                    <div><strong>Gratis</strong></div>
                </div>
                <div class="order-col">
                    <div><strong>TOTAL</strong></div>
                    <div><strong class="order-total"></strong></div>
                </div>
            </div>

            <div class="input-checkbox">
                <input type="checkbox" id="terms">
                <label for="terms">
                    <span></span>
                    He leído y acepto  los <a href="#">terminos & condiciones</a>
                </label>
            </div>
            <a href="#" class="primary-btn order-submit">Realizar pedido</a>
        </div>
        <!-- /Order Details -->
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

                }
            }
        );


    </script>

@endsection
