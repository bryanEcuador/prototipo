@extends('layouts.proveedor')
@section('nombre_pagina','Datos de pagina')
@section('css')
@endsection
@section('titulo de la pagina','Datos de la pagina')
@section('contenido')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
    @endif

    <div class="col-md-12" id="datosPagina">
        <form action="{{route('administrador.store')}}" method="post" id="administracion">
            @csrf
            <div class="tile">
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="nombre">Nombre pagina:</label>
                    </div>
                    <div class="col-md-6 ">
                        <input class="form-control" name="nombre" v-model="nombre" id="nombre" placeholder="nombre pagina" min="3" max="20">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="">Terminos y condiciones:</label>
                    </div>
                    <div class="col-md-6 ">

                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="">Politicas de privacidad:</label>
                    </div>
                    <div class="col-md-6 ">

                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="">Acerca de:</label>
                    </div>
                    <div class="col-md-6 ">

                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="">Ordenes y retornos:</label>
                    </div>
                    <div class="col-md-6 ">

                    </div>
                </div>

                <br>
                <button type="button" class="btn btn-info" v-on:click="validar" name="guardar" id="guardar">Aceptar</button>
            </div>
        </form>
    </div>
@endsection
@section('js')
    <script>
        var app = new Vue ({
                el:"#creacionProveedores",
                data: {
                    Codigo: '',
                    Empresa : '',
                    Ruc : 0,
                    Razon : '',
                    Representante : '',
                    Direccion : '',
                    Banco : '',
                    Cuenta_Bancaria :0,
                    Estado : '',
                    Gerente : '',
                    Convencional : 0,
                    F_Representante:0,
                    FonoG:0,
                    Usuario:'',
                    Contraseña:'',
                    errores : [],

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
                    }
                },

                methods : {

                    validar : function() {
                        //this.validarCampos();
                        this.enviarFormulario();
                        // mensajes de alerta
                        /*
                        if( this.errores.length === 0) {
                            this.enviarFormulario()
                        } else {
                            var num = this.errores.length;
                            for(i=0; i<num;i++) {
                                toastr.error(this.errores[i]);
                            }
                        } */
                        this.errores = [];
                    },
                    validarCampos : function() {
                        var datos_sin_numeros =  /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/; // para la afinidad
                        var patt3 = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ,\s0-9]+$/; //para la observación
                        var er_numeros = /^[0-9,]+$/;

                        if(this.codigo !== "") {
                            // mas validaciones
                        } else {
                            this.errores.push("El campo Codigo no puede estar vacio");
                        }

                        if(this.Empresa !== ""){

                        }else {
                            this.errores.push("El campo Empresa no puede estar vacio");
                        }

                        if(this.Ruc !== 0) {
                            // mas validaciones
                            if(er_numeros .test(this.Ruc) == false)
                            {
                                this.errores.push("El campo Ruc solo puede obtener numeros");
                            }
                        } else {
                            this.errores.push("El Ruc debe tener");
                        }

                        if(this.Razon !== "") {
                            // mas validaciones

                            this.errores.push("El campo Razon solo puede obtener numeros");
                        } else {
                            this.errores.push("La Razon debe tener ");
                        }


                        if(this.Representante !== "") {
                            // mas validaciones
                        } else {
                            this.errores.push("Debe tener un Representante");
                        }

                        if(this.Direccion !== "") {
                            // mas validaciones
                        } else {
                            this.errores.push("Debe tener Direccion");
                        }

                        if(this.Banco !== "") {
                            // mas validaciones
                        } else {
                            this.errores.push("Debe elegir un Banco");
                        }
                        if(this.Cuenta_Bancaria !== 0) {
                            // mas validaciones
                            if(er_numeros .test(this.precio) == false)
                            {
                                this.errores.push("El campo Cuenta solo puede obtener numeros");
                            }
                        } else {
                            this.errores.push("Debe tener una Cuenta");
                        }
                        if(this.Estado !== "") {
                            // mas validaciones
                        } else {
                            this.errores.push("Debe elegirun Estado");
                        }
                        if(this.Gerente !== "") {
                            // mas validaciones
                        } else {
                            this.errores.push("Debe poner el nombre");
                        }
                        if(this.Convencional !== 0) {
                            // mas validaciones
                            if(er_numeros .test(this.Convencional) == false)
                            {
                                this.errores.push("El campo Convencional solo puede obtener numeros");
                            }
                        } else {
                            this.errores.push("Debe tener Convencional");
                        }
                        if(this.F_Representante !== 0) {
                            // mas validaciones
                            if(er_numeros .test(this.F_Representante) == false)
                            {
                                this.errores.push("El F_Representante precio solo puede obtener numeros");
                            }
                        } else {
                            this.errores.push("Debe tener F_Representante");
                        }
                        if(this.FonoG !== 0) {
                            // mas validaciones
                            if(er_numeros .test(this.FonoG) == false)
                            {
                                this.errores.push("El campo FonoG solo puede obtener numeros");
                            }
                        } else {
                            this.errores.push("debe tener un FonoG");
                        }
                        if(this.Usuario !== "") {
                            // mas validaciones
                        } else {
                            this.errores.push("Debe ingresar Usuario");
                        }
                        if(this.Contraseña !== "") {
                            // mas validaciones
                        } else {
                            this.errores.push("Debe ingresar Contraseña");
                        }
                    },
                    enviarFormulario : function(){
                        var parametros = {
                            "_token": "{{ csrf_token() }}",
                            //--
                            "Codigo" : this.Codigo,
                            "Tipo_Empresa" : this.Tipo_Empresa,
                            "Ruc": this.Ruc,
                            "Razon_Social" : this.Razon_Social,
                            "Direccion": this.Direccion,
                            "Banco" : this.Banco,
                            "Cuenta_Bancaria" : "Cuenta_Bancaria",
                            "Estado" : this.Estado,
                            "Gerente_General" : this.Gerente_General,
                            "Fono_Convencional" : this.Fono_Convencional,
                            "Fono_Representante" : this.Fono_Representante,
                            "Fono_Gerente":this.Fono_Gerente,
                            "Usuario":this.Usuario,
                            "Contraseña":this.Contraseña
                        };
                        $.ajax({
                            data : parametros,
                            url : "guardar",
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

                }
            }
        );
    </script>
@endsection

