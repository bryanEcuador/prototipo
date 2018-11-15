@extends('layouts.admin')
@section('nombre_pagina','Edición de Proveedores')
@section('css')
@endsection
@section('titulo de la pagina','Edición de Proveedores')
@section('subtitulo','Formulario de actualización de  proveedores')
@section('breadcrumbs')
    {{ Breadcrumbs::render('proveedores-edit',$datos[0]->name) }}
@endsection
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

    <div class="col-md-12" id="creacionProveedores">
        <form method="post" id="frmProveedor" action="{{route('administrador.proveedor.update')}}">
            @csrf
            <div class="tile">
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="codigo">Codigo Externo:</label>
                    </div>
                    <div class="col-md-6 ">
                        <input class="form-control" name="codigo" v-model="codigo" id="codigo" placeholder="00005840384" min="3" maxlength="20">
                    </div>
                </div>
                <div class="form-group row ">
                    <div class="col-md-2">
                        <label for="nombre">Tipo de Empresa:</label>
                    </div>
                    <div class="col-md-6">
                        <select class="form-control" v-model="empresa" name="empresa" >
                            <option value='1'>empresa a</option>
                        </select>
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="nombre">Ruc :</label>
                    </div>
                    <div class="col-md-6 ">
                        <input class="form-control" type="number"  name="ruc" v-model="ruc" id="Ruc" placeholder="ruc" minlength="13" maxlength="13">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="razon">Razon Social:</label>
                    </div>
                    <div class="col-md-6 ">
                        <input class="form-control" name="razon_social" v-model="razon" id="razon" placeholder="Razon Social" minlength="3" maxlength="20">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="representante">Representante Legal:</label>
                    </div>
                    <div class="col-md-6 ">
                        <input class="form-control" name="representante" v-model="representante" id="representante" placeholder="Representante Legal" minlength="3" maxlength="20">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="direccion">Direccion:</label>
                    </div>
                    <div class="col-md-6 ">
                        <input class="form-control" name="direccion" v-model="direccion" id="direccion" placeholder="Direccion" minlength="5" maxlength="40">
                    </div>
                </div>
                <div class="form-group row ">
                    <div class="col-md-2">
                        <label for="banco">Banco :</label>
                    </div>
                    <div class="col-md-6">
                        <select class="form-control" v-model="banco" name="banco"  >
                            <option value='1'> Bnaco 1</option>
                        </select>
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="nombre">Cuenta Bancaria:</label>
                    </div>
                    <div class="col-md-6 ">
                        <input class="form-control" type="number" step="any" lang="end" name="cuenta_bancaria" v-model="cuenta_bancaria" id="cuenta"  minlength="3" maxlength="20">
                    </div>
                </div>
                <div class="form-group row ">
                    <div class="col-md-2">
                        <label for="estado">Estado :</label>
                    </div>
                    <div class="col-md-6">
                        <select class="form-control" v-model="estado" name="estado"  >
                            <option value='0' > Activo</option>
                            <option value="1"> inactivo</option>
                        </select>
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="gerente">Gerente General:</label>
                    </div>
                    <div class="col-md-6 ">
                        <input class="form-control" name="gerente" v-model="gerente" id="gerente" placeholder="nombre completo del gerente general" minlength="12" maxlength="40">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="nombre">Teléfono Representante:</label>
                    </div>
                    <div class="col-md-6 ">
                        <input class="form-control" type="tel" name="telefono_representante" v-model="telefono_representante" id="telefono_representante" placeholder="telefono representante" minlength="7" maxlength="20">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="nombre">Teléfono Gerente:</label>
                    </div>
                    <div class="col-md-6 ">
                        <input class="form-control" type="tel" name="telefono_gerente" v-model="telefono_gerente" id="telefono_gerente" placeholder="telefono gerente" minlength="7" maxlength="20">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="usuario">Usuario:</label>
                    </div>
                    <div class="col-md-6 ">
                        <input class="form-control"  name="usuario" v-model="usuario" id="usuario" placeholder="Nombre de usuario" minlength="3" maxlength="20" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="usuario">Email:</label>
                    </div>
                    <div class="col-md-6 ">
                        <input class="form-control"  name="email" v-model="email" id="email" placeholder="Nombre de usuario" minlength="3" maxlength="20" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="pass">Contraseña:</label>
                    </div>
                    <div class="col-md-6 ">
                        <input class="form-control" type="password" name="pass" v-model="pass" id="pass" placeholder="Contraseña" minlength="8" maxlength="20" autocomplete="off">
                    </div>
                </div>
                <br>
                <input type="hidden" name="id" v-model="id">
                <input type="hidden" name="user_id" v-model="user_id">
                <!--<button type="input" class="btn btn-info" name="guardar" id="guardar">Agregar Proveedor</button> -->
                <button type="button" class="btn btn-info" v-on:click="enviarFormulario"  id="guardar">Actualizar Proveedor</button>
            </div>
        </form>
    </div>
@endsection
@section('js')
    <script>
        var app = new Vue ({
                el:"#creacionProveedores",
                data: {
                    codigo: '',
                    empresa : '',
                    ruc : 0,
                    razon : '',
                    representante : '',
                    direccion : '',
                    banco : '',
                    cuenta_bancaria :0,
                    estado : '',
                    gerente : '',
                    convencional : 0,
                    telefono_representante:0,
                    telefono_gerente:0,
                    usuario:'',
                    email : '',
                    pass:'',
                    errores : [],
                    cmbDatos : [],
                    id : 0,
                    user_id :0,

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

                    this.cmbDatos = @json($datos);
                        this.banco = this.cmbDatos[0].banco;
                        this.codigo = this.cmbDatos[0].codigo_externo;
                        this.empresa = this.cmbDatos[0].tipo_empresa;
                        this.ruc = this.cmbDatos[0].ruc;
                        this.razon = this.cmbDatos[0].razon_social;
                        this.representante = this.cmbDatos[0].representante_legal;
                        this.direccion = this.cmbDatos[0].direccion;
                        this.cuenta_bancaria = this.cmbDatos[0].cuenta_bancaria;
                        this.estado  = this.cmbDatos[0].estado;
                        this.gerente = this.cmbDatos[0].gerente_general;
                        this.telefono_representante = this.cmbDatos[0].telefono_representante;
                        this.telefono_gerente= this.cmbDatos[0].telefono_gerente;
                        this.usuario= this.cmbDatos[0].name;
                        this.email= this.cmbDatos[0].email;
                        this.id = this.cmbDatos[0].id;
                        this.user_id = this.cmbDatos[0].user_id;

                },

                methods : {

                    enviarFormulario : function() {
                        this.validarCampos();
                        if( this.errores.length === 0) {
                            //this.guardarFormulario ()
                            document.getElementById('frmProveedor').submit();
                        } else {
                            var num = this.errores.length;
                            for(i=0; i<num;i++) {
                                toastr.error(this.errores[i]);
                            }
                        }
                        this.errores = [];
                    },

                    // validaciones
                    validarCampos : function() {
                        // expresiones regulares para evaluar información

                        var datos_sin_numeros =  /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/; // para la afinidad
                        var datos_sin_caracteres_e = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ,\s0-9]+$/; //para la observación
                        var er_numeros = /^[0-9,]+$/; // solo para los numeros
                        var datos_sin_espacio = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9]+$/;

                        if(this.codigo !== "") {
                            if(datos_sin_espacio.test(this.codigo) == false)
                            {
                                this.errores.push("El campo codigo no puede contener espacio");
                            }
                        } else {
                            this.errores.push("El campo Codigo no puede estar vacio");
                        }

                        if(this.empresa !== ""){
                            if(datos_sin_caracteres_e.test(this.empresa) == false)
                            {
                                this.errores.push("El campo empresa no puede contener caracteres especiales");
                            }
                        }else {
                            this.errores.push("El campo Empresa no puede estar vacio");
                        }

                        if(this.ruc !== 0) {
                            // mas validaciones
                            if(er_numeros .test(this.ruc) == false)
                            {
                                this.errores.push("El campo Ruc solo puede obtener numeros");
                            }
                        } else {
                            this.errores.push("El Ruc debe tener");
                        }

                        if(this.razon !== "") {
                            if(datos_sin_caracteres_e.test(this.razon) == false)
                            {
                                this.errores.push("El campo razon social no puede contener caracteres especiales");
                            }
                        } else {
                            this.errores.push("La Razon social no puede estar en blanco");
                        }


                        if(this.representante !== "") {
                            if(datos_sin_caracteres_e.test(this.representante) == false)
                            {
                                this.errores.push("El campo representante no puede contener caracteres especiales");
                            }
                        } else {
                            this.errores.push("El campo representante no puede estar en blanco");
                        }

                        if(this.direccion !== "") {
                            if(datos_sin_caracteres_e.test(this.direccion) == false)
                            {
                                this.errores.push("El campo dirección no puede contener caracteres especiales");
                            }
                        } else {
                            this.errores.push("Debe el campo dirrección no puede contener espacios en blanco ");
                        }

                        if(this.banco !== "") {
                            // mas validaciones
                        } else {
                            this.errores.push("Debe elegir un Banco");
                        }
                        if(this.cuenta_bancaria !== 0) {
                            // mas validaciones
                            if(er_numeros .test(this.cuenta_bancaria) == false)
                            {
                                this.errores.push("El campo Cuenta bancaria solo puede tener numeros");
                            }
                        } else {
                            this.errores.push("El campo cuenta bancaria no puede estar vacio");
                        }
                        if(this.estado !== "") {
                            // mas validaciones
                        } else {
                            this.errores.push("Debe elegir un Estado");
                        }
                        if(this.gerente !== "") {
                            // mas validaciones
                        } else {
                            this.errores.push("El campo gerente no puede estar vacio");
                        }

                        if(this.telefono_representante !== 0) {
                            // mas validaciones
                            if(er_numeros .test(this.telefono_representante) == false)
                            {
                                this.errores.push("El telefono del representante solo puede contener numeros");
                            }
                        } else {
                            this.errores.push("El  campo telefono_representante representante no puede estar vacio");
                        }
                        if(this.telefono_gerente !== 0) {
                            // mas validaciones
                            if(er_numeros .test(this.telefono_gerente) == false)
                            {
                                this.errores.push("El campo telefono gerente solo puede contener numeros");
                            }
                        } else {
                            this.errores.push("El campo telefono del gerente no puede estar vacio ");
                        }
                        if(this.usuario !== "") {
                            // mas validaciones
                        } else {
                            this.errores.push("Debe ingresar el nombre del usuario");
                        }

                    },

                    guardarFormulario : function(){
                        var parametros = {
                            "_token": "{{ csrf_token() }}",
                            //--
                            "codigo" : this.codigo,
                            "empresa" : this.empresa,
                            "ruc": this.ruc,
                            "razon_social" : this.razon,
                            "direccion": this.direccion,
                            "banco" : this.banco,
                            "cuenta_bancaria" : this.cuenta_bancaria,
                            "representante" : this.representante,
                            "estado" : this.estado,
                            "gerente" : this.gerente,
                            "telefono_convencional" : this.convencional,
                            "telefono_representante" : this.telefono_representante,
                            "telefono_gerente":this.telefono_gerente,
                            "usuario":this.usuario,
                            "pass":this.pass,
                            "convencional" : this.convencional,
                            'id' : this.id
                        };
                        $.ajax({
                            data : parametros,
                            url : "/administrador/proveedor/actualizar",
                            type : "post",
                            async : true,
                            success : function(d){
                                    toastr.success('Registro actualizado con exito.', 'Alerta', {timeOut: 8000});


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

