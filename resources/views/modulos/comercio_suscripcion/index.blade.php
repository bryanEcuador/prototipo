@extends('layouts.admin')
@section('nombre_pagina','Comercio')
@section('css')
<link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('titulo de la pagina',' Comercio')
@section('subtitulo','')

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
        
        <div class="tile">
           
           
          
            

             
        </div>
       
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
                $("#estado").val(1);
        });
    </script>
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>


    <script>
        var app = new Vue ({
                el:"#creacionProveedores",
                data: {
                    nombre: '',
                    ruc : '',
                    razon : '',
                    representante : '',
                    representante_ci : '',
                   identificacion : '',
                   fecha: '',
                    direccion : '',
                    ciudad : '',
                    sector : '',
                    nombre_gerente : '',
                    gerente_ci : '',
                    tipo_comercio : '',
                    email:'',
                    telefono: '',
                    mio: '',
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

                    validarRuc : function() {
                        var er_numeros = /^[0-9,]+$/; // solo para los numeros
                        if(this.ruc !== 0) {
                            // mas validaciones
                            if(er_numeros .test(this.ruc) == false)
                            {
                                this.errores.push("El campo Ruc solo puede obtener numeros");
                            }else {
                                var dto = this.ruc.length;
                                var valor;
                                var acu=0;
                                for (var i=0; i<dto; i++){
                                    valor = this.ruc.substring(i,i+1);
                                    if(valor==0||valor==1||valor==2||valor==3||valor==4||valor==5||valor==6||valor==7||valor==8||valor==9){
                                        acu = acu+1;
                                    }
                                }
                                if(acu==dto){
                                    // modifica aquí para agregar el 002,003
                                    while(this.ruc.substring(10,13)!=001){
                                        alert('Los tres últimos dígitos no tienen el código del RUC 001.');
                                        return;
                                    }
                                    while(this.ruc.substring(0,2)>24){
                                        alert('Los dos primeros dígitos no pueden ser mayores a 24.');
                                        return;
                                    }
                                    //this.errores.push('El RUC está escrito correctamente');
                                    //alert('Se procederá a analizar el respectivo RUC.');
                                    var porcion1 = this.ruc.substring(2,3);
                                    if(porcion1<6){
                                       // alert('El tercer dígito es menor a 6, por lo \ntanto el usuario es una persona natural.\n');
                                    } else{
                                        if(porcion1==6){
                                            alert('El tercer dígito es igual a 6, por lo \ntanto el usuario es una entidad pública.\n');
                                        }
                                        else{
                                            if(porcion1==9){
                                                alert('El tercer dígito es igual a 9, por lo \ntanto el usuario es una sociedad privada.\n');
                                            }
                                        }
                                    }
                                } else{
                                    this.errores.push("Ruc invalido");
                                }
                            }
                        } else {
                            this.errores.push("Ingrese la información sobre el ruc");
                        }
                    },

                   // validaciones
                    validarCampos : function() {
                        // expresiones regulares para evaluar información
                        this.validarRuc();

                        var datos_sin_numeros =  /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/; // para la afinidad
                        var datos_sin_caracteres_e = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ,\s0-9]+$/; //para la observación
                        var er_numeros = /^[0-9,]+$/; // solo para los numeros
                        var datos_sin_espacio = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9]+$/;
                        var correo = /^\w+([\.\+\-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

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
                        if(this.convencional !== 0) {
                            if(er_numeros .test(this.convencional) == false)
                            {
                                this.errores.push("El campo Convencional solo puede obtener numeros");
                            }
                        } else {
                            this.errores.push("el campo convencional o puede estar vacio");
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
                        if(this.pass !== "") {
                            // mas validaciones
                        } else {
                            this.errores.push("Debe campo contraseñe no puede estar vacio");
                        }

                        if(this.email === ''){
                            this.errores.push("ingrese el email del usuario");
                        } else {
                            this.email= this.email.trim();
                            if(correo.test(this.email) == false) {
                                this.errores.push("El correo electronico ingresado no es valido");
                            }else{
                                // consulta a la base de datos
                                axios.get('/seguridad/validar/usuario/'+this.email+'/email/store').then(response => {
                                    this.respuesta2  = response.data;
                                if(this.respuesta2.length !== 0) {
                                    this.errores.push('El email del usuario ya se encuentra registrado');
                                }
                            })
                            }
                        }
                    },

                    guardar : function(){
                      this.espaciosBlanco();
                      this.validarCampos();
                      if(this.errores.length == 0){
                          this.enviarFormulario();
                      }else {
                          var num = this.errores.length;
                          for(var i=0; i<num;i++) {
                              toastr.error(this.errores[i]);
                          }
                          this.errores = [];
                      }
                    },

                    enviarFormulario : function(){
                        var url = 'comercio/store';
                        axios.post(url, {
                            nombre : this.nombre,
                            ruc: this.ruc,
                            razon : this.razon,
                            representante : this.representante,
                            representante_ci : this.representante_ci,
                            identificacion : this.identificacion,
                            fecha : this.fecha,
                            direccion: this.direccion,
                            ciudad: this.ciudad,
                            sector: this.sector,
                            nombre_gerente: this.nombre_gerente,
                            gerente_ci: this.gerente_ci,
                            tipo_comercio : this.tipo_comercio,
                            email : this.email
                            telefono:this.telefono;
                            mio:this.mio;

                        }).then(response => {
                        
                        //this.limpiar();
                        
                    }).catch(error => {
                            console.log(error);
                        if(error.status === 422)
                        {
                            // captura los errores en una variable
                            var errors = $.parseJSON(error.errorText);
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
                                    console.log(error);
                                    toastr.error('Error '+error+' al momento guardar el nuevo proveedor.', 'Error', {timeOut: 5000});
                                }
                            });
                        } else {
                            console.log(error.errorText);
                            toastr.error('Error: '+error.status, 'Error', {timeOut: 5000});
                        }
                        //toastr.error('Error al momento de crear el permiso.', 'Alerta', {timeOut: 8000});

                    });

                    },

                    espaciosBlanco : function() {
                        this.codigo= this.codigo.trim();
                        this.empresa = this.empresa.trim();
                        this.razon = this.razon.trim();
                        this.representante = this.representante.trim();
                        this.direccion = this.direccion.trim();
                        this.banco = this.banco.trim();
                        this.gerente = this.gerente.trim();
                        this.convencional = this.convencional.trim();
                        this.telefono_representante = this.telefono_representante.trim();
                        this.telefono_gerente = this.telefono_gerente.trim();
                        this.usuario = this.usuario.trim();
                        this.pass=this.usuario.trim();
                    },
                    
                    limpiar : function() {
                            this.ruc = '';
                             this.cuenta_bancaria ='';
                             this.convencional = '';
                            this.codigo= '';
                            this.empresa = '';
                            this.ruc = 0;
                            this.razon = '';
                            this.representante = '';
                            this.direccion = '';
                            this.banco = '';
                            this.cuenta_bancaria =0;
                            this.estado = '';
                            this.gerente = '';
                            this.convencional = 0;
                            this.telefono_representante=0;
                            this.telefono_gerente=0;
                            this.usuario='';
                            this.pass='';
                            this.errores = [];           
                    }

                }
            }
        );


    </script>
@endsection







