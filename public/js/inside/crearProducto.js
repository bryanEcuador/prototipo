var app = new Vue ({
    el:"#creacionProductos",
    data: {
        // sugerencias
        sugerenciaCategoria : '',
        sugerenciaSubCategoria : '',
        sugerenciaMarca: '',
        sugerenciaColor: '',
        sugerenciaHexadecimal : '',
        sugerencia_Categoria : '' ,// usada en el moda

        // variables de formulario
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
        cmbIva : [],
        codigo : '',
        num_imagenes : 0,

        // selects
        cmbMarca : [],
        cmbCategoria : [],
        cmb_categorias : [],
        cmbSubCategoria : [],
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
        this.consultarMarca();
        this.consultarCategoria();
        this.consultarColores();
        this.consultarIva();
    },


    methods : {
        /* _________________________combos________________________________ */
        consultarIva : function(){
            axios.get('consultar/iva').then(response => {
                this.cmbIva = response.data;
        }).catch(error => {
                this.consultarIva();
        });
        },
        consultarColores : function(){
            axios.get('colores').then(response => {
                this.cmbColores  = response.data
        }).catch(error => {
                this.consultarColores();
        })
        },
        consultarMarca : function(){
            axios.get('marca').then(response => {
                this.cmbMarca  = response.data
        }).catch(error => {
                this.consultarMarca();
        })
        },
        consultarCategoria : function(){
            axios.get('categoria').then(response => {
                this.cmbCategoria  = response.data,
                this.cmb_categorias = response.data
        }).catch(error => {
                this.consultarCategoria();
        })
        },
        cambioCategoria : function () {
            var url = '/subcategorias/'+this.categoria ;
            axios.get(url).then(response => {
                this.cmbSubCategoria= response.data;
        }).catch(error => {
                console.log(error);
            this.cambioCategoria();
        });
        },
        /* _________________________/combos________________________________ */

        agregarSugerencia : function(tipo) {
            var url = 'Sugerencias/'+tipo;
            switch(tipo){

                case 1 :
                    if(this.sugerenciaCategoria.trim == ''){
                        toastr.error("Agregue el nombre de la categoria");
                    }else {
                        axios.post(url, {
                            sugerencia : this.sugerenciaCategoria,
                        }).then( response => {
                            $('#sugerenciaCategoria').modal('hide');
                            toastr.success("Sugerencia registrada con exito");
                    }).catch(error => {
                            toastr.error("Error al momento de guardar la sugerencia");
                    })
                    }

                    break;
                case 2 :
                    if(this.sugerenciaSubCategoria.trim == '' && this.sugerencia_Categoria !== ''){
                        toastr.error("Agregue el nombre de la categoria");
                    }else {
                        axios.post(url, {
                            sugerencia : this.sugerenciaSubCategoria,
                            adicional : this.sugerencia_Categoria
                        }).then( response => {
                            $('#sugerenciaSubCategoria').modal('hide');
                            toastr.success("Sugerencia registrada con exito");
                    }).catch(error => {
                            toastr.error("Error al momento de guardar la sugerencia");
                    })
                    }
                    break;
                case 3 :
                    axios.post(url, {
                        sugerencia : this.sugerenciaMarca,
                    }).then(response => {
                        $('#sugerenciaMarca').modal('hide');
                        toastr.success("Sugerencia registrada con exito");
                    }).catch(response => {
                    toastr.error("Error al momento de guardar la sugerencia");
            });


            break;
        case 4 :
            if(this.sugerenciaColor.trim == '' && this.sugerenciaHexadecimal.trim !== ''){
                toastr.error("Agregue el nombre de la categoria");
            }else {
                axios.post(url, {
                    sugerencia : this.sugerenciaSubCategoria,
                    adicional : this.sugerenciaHexadecimal
                }).then( response => {
                    $('#sugerenciaColor').modal('hide');
                    toastr.success("Sugerencia registrada con exito");
            }).catch(error => {
                    toastr.error("Error al momento de guardar la sugerencia");
            })
            }
            break;
        default:
            console.log("Error");
        }
        },


        validar : function () {

            this.validarCampos();
            this.validarImagenes();
            // mensajes de alerta
            if( this.errores.length === 0) {
                this.enviarFormulario();
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
                this.errores.push("El campo iva solo puede obtener numeros");
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
                        for(var e = 0 ; e < x[i].files.length; e++){
                            // console.log(x[i].files[e].type);
                            if (x[i].files[e].type !== "image/png" && x[i].files[e].type !== "image/jpeg") {
                                console.log(x[i].files[e].type);
                                this.errores.push("Solo puede subir imagenes png/jpeg revise sus imagenes")
                            }
                        }
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
            //var form = document.getElementById('producto');
            //producto.submit();
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
        }
    }
});