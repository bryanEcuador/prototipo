var app = new Vue ({
    el:"#edicionProductos",
    data: {
        categoria : 0,
        sub_categoria : 0,
        marca : 0,
        precio : 0,
        iva : 0,
        nombre : '',
        descripcion : '',
        colores : [],
        errores : [],
        imagenes : [],
        codigo : '',
        num_imagenes : 0,
        identificador : 0,

        // selects
        cmbMarca : [],
        cmbCategoria : [],
        cmbSubCategoria : [],
        cmbColores : [],
        // variables desde el controlador
        cmbDatos : [],
        cmbImagenes :[],
        archivosMultimedias : 0,

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


        axios.get('/proveedor/marca').then(response => {
            this.cmbMarca  = response.data
    })
        axios.get('/proveedor/categoria').then(response => {
            this.cmbCategoria  = response.data
    })
        axios.get('/proveedor/sub-categoria').then(response => {
            this.cmbSubCategoria  = response.data
    })

        axios.get('/proveedor/colores').then(response => {
            this.cmbColores  = response.data
    })

        // codificamos el formato a json
        this.cmbDatos = {!! json_encode($datos) !!};

        // pasamos los datos a la vista
        this.nombre = this.cmbDatos[0].nombre;
        this.descripcion = this.cmbDatos[0].descripcion;
        this.precio = this.cmbDatos[0].precio;
        this.codigo = this.cmbDatos[0].codigo;
        this.iva = this.cmbDatos[0].iva;
        this.categoria = this.cmbDatos[0].id_categoria;
        this.sub_categoria = this.cmbDatos[0].id_sub_categoria;
        this.marca = this.cmbDatos[0].id_marca;
        this.identificador = this.cmbDatos[0].id;



        //this.cmbImagenes = {!! json_encode($datos) !!};
        this.cmbImagenes = @json($imagenes);
        this.archivosMultimedias = this.cmbImagenes.length;
        console.log({!! json_encode($datos) !!});
        console.log({!! json_encode($imagenes) !!});

    },


    methods : {

        validar : function () {
            //this.validarCampos();
            this.validarImagenes();
            // mensajes de alerta
            if( this.errores.length === 0) {
                //this.enviarFormulario();
            } else {
                var num = this.errores.length;
                for(i=0; i<num;i++) {
                    toastr.error(this.errores[i]);
                }
            }
            this.errores = [];
        },
        validarCampos : function() {
            var datos_sin_numeros =  /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/; // para la afinidad
            var patt3 = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ,\s0-9]+$/; //para la observación
            var er_numeros = /^[0-9,]+$/;

            if(this.nombre !== "") {
                // mas validaciones
            } else {
                this.errores.push("El campo nombre no puede estar vacio");
            }

            if(this.codigo !== ""){

            }else {
                this.errores.push("El campo codigo no puede estar vacio");
            }

            if(this.descripcion !== "") {
                // mas validaciones
            } else {
                this.errores.push("El campo descripción no puede estar vacio");
            }



            if(this.precio !== 0) {
                // mas validaciones
                if(er_numeros .test(this.precio) == false)
                {
                    this.errores.push("El campo precio solo puede obtener numeros");
                }
            } else {
                this.errores.push("El producto debe tener un precio");
            }

            if(er_numeros .test(this.iva) == false)
            {
                this.errores.push("El campo precio solo puede obtener numeros");
            }


            if(this.categoria !== 0) {
                // mas validaciones
            } else {
                this.errores.push("Debe elegir una categoria");
            }

            if(this.sub_categoria !== 0) {
                // mas validaciones
            } else {
                this.errores.push("Debe elegir una  subcategoria");
            }

            if(this.marca !== 0) {
                // mas validaciones
            } else {
                this.errores.push("Debe elegir una  marca");
            }

            if(this.colores.length == 0){
                this.errores.push("Debe Seleccionar los colores del producto");
            }
        },
        validarImagenes : function() {
            // obtenemos el numero de files creados
            var x = document.getElementsByClassName("form-control imagenes");
            // contamos el numero de inputs file
            this.num_imagenes = x.length;
            // pasamos a comparar cuantas imagenes tenemos por cada input file
            if(this.colores.length == 0) {
                this.errores.push("seleccione los colores de los articulos para agregar imagenes")
            } else {
                if(this.colores.length !== this.num_imagenes){
                    this.errores.push("EL numero de archivos no coincide con los colores");
                } else {
                    for( var i = 0; i < x.length; i++)
                    {
                        if(x[i].files.length < 3){
                            this.errores.push("EL numero de imagenes no puede ser menor a 3");
                        } else if (x[i].files.length > 5) {
                            this.errores.push("EL numero de imagenes no puede ser mayor a 5");
                        }
                    }
                }
            }
        },
        enviarFormulario : function(){
            var form = document.getElementById('producto');
            producto.submit();
        },
        crearInputs : function() {
            // numero de colores seleccionados
            var cantidad = this.colores.length;
            // creo un nuevo div
            var divElement = document.createElement("div");
            // obtengo el viejo div y el nombre de su nodo padre
            divOld = document.getElementById("inputs");
            padre = document.getElementById("inputs").parentNode;
            // elimino el div
            padre.removeChild(divOld);
            //document.replaceChild(divElement,divOld);
            // le agg propiedades a el nuevo div
            divElement.setAttribute("id", "inputs");
            anterior = document.getElementById("br");
            padre.insertBefore(divElement,anterior);


            // creo los elementos imagen
            while( cantidad > 0){
                var name = "img"+cantidad+"[]";
                var id =    "img"+cantidad;
                var inputElement = document.createElement("input");
                inputElement.setAttribute("type", "file");
                inputElement.setAttribute("multiple", "multiple");
                inputElement.setAttribute("accept", "image/png, .jpeg");
                inputElement.setAttribute("name",name);
                inputElement.setAttribute("id",id);
                inputElement.setAttribute("class","form-control imagenes");
                document.getElementById("inputs").appendChild(inputElement);
                //document.body.innerHTML = inputElement + document.body.innerHTML;
                cantidad = cantidad-1;
                console.log(cantidad);
            }

            /* Cada vez que se escoge un nuevo elemento se destruye y se crea un div del mismo tipo y en base a este se crean las imagenes */
            //var newInput = document.createElement("input")
        },

        recargarImagenes: function(producto) {
            axios.get('/proveedor/consultar/imagenes/'+producto).then(response => {
                this.cmbImagenes = response.data;
            this.archivosMultimedias = this.cmbImagenes.length;
        })
        },
        eliminarImagen : function(id,nombre,producto) {
            var parametros = {
                "_token": "{{ csrf_token() }}",
                "id" : id,
                "nombre" : "imagen1"
            };
            $.ajax({
                data : parametros,
                url : "/proveedor/eliminar/imagen",
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

            this.recargarImagenes(producto);
        },
        eliminar : function(id,nombre,producto) {
            swal({
                title: "Eliminar!",
                text: "Esta seguro que desea eliminar la imagen",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                if (willDelete) {
                    this.eliminarImagen(id,nombre,producto);
                    swal("Eliminado! La imagen ha sido eliminada!", {
                        icon: "success",
                    });
                } else {
                    swal("Su archivo se encuentra seguro!");
        }
        });
        },

        actualizar : function(id,nombre,id_imagen) {
            swal({
                title: "Actualizar!",
                text: "Esta seguro que desea actualizar la imagen",
                icon: "info",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                if (willDelete) {
                    this.nuevaImagen(id,nombre,id_imagen);
                    swal("Suba su nueva imagen", {
                        icon: "success",
                    });
                } else {
                    swal("Su archivo se encuentra seguro!");
        }
        });
        },
        nuevaImagen : function(div,nombre,id_imagen) {
            divOld = document.getElementById(div);
            var name = nombre+"-"+id_imagen;
            var id =    nombre;
            var inputElement = document.createElement("input");
            inputElement.setAttribute("type", "file");
            inputElement.setAttribute("accept", "image/png, .jpeg");
            inputElement.setAttribute("name",name);
            inputElement.setAttribute("id",id);
            inputElement.setAttribute("class","form-control imagenes");
            divOld.appendChild(inputElement);
            //divOld.innerHTML = inputElement;

        },

        guardarImagen : function (img_id) {
            var formData = new FormData();

            var parametros = {
                "_token": "{{ csrf_token() }}",
                "imagen" : 1,

            };
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data : parametros,
                url : "/proveedor/agregar/imagen",
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
        agregarImagen : function (div) {

            var div = document.getElementById(div);
            var name = "im1";
            var id =    "im2";
            //var inputElement = document.createElement("form");

            var inputElement = document.createElement("input");
            inputElement.setAttribute("type", "file");
            inputElement.setAttribute("accept", "image/png, .jpeg");
            inputElement.setAttribute("name",name);
            inputElement.setAttribute("id",id);
            inputElement.setAttribute("class","form-control imagenes");
            div.appendChild(inputElement);

        }

    }
});