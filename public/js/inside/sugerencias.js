var app = new Vue ({
    el :"#sugerencia",
    data : {
        tiposSugerencias : [1,2,3,4],
        cmbColores : [],
        cmbCategorias: [],
        cmbSubCategoria : [],
        cmbMarcas :[],
        blue : 'blue',
        cmbSubCategorias : [],
    },
    created : function() {
        var url = '/administrador/consultar/sugerencias/1';
        axios.get(url).then(response => {
            this.cmbCategorias = response.data;
    }).catch(error => {
            this.consultar(1);
    });
        var url = '/administrador/consultar/sugerencias/2';
        axios.get(url).then(response => {
            this.cmbSubCategorias = response.data
    }).catch(error => {
            this.consultar(2);
    });
        var url = '/administrador/consultar/sugerencias/3';
        axios.get(url).then(response => {
            this.cmbMarcas = response.data
    }).catch(error => {
            this.consultar(3);
    });
        var url = '/administrador/consultar/sugerencias/4';
        axios.get(url).then(response => {
            this.cmbColores = response.data
    }).catch(error => {
            this.consultar(4);
    });

    },

    computed : {
        cmbCategoriasLength : function(){
            if(this.cmbCategorias.length == 0){
                return true;
            }
            return false;
        },

        cmbSubCategoriasLength : function(){
            if(this.cmbSubCategoria.length == 0){
                return true;
            }
            return false;
        },

        cmbMarcasLength : function(){
            if(this.cmbMarcas.length == 0){
                return true;
            }
            return false;
        },

        cmbColoresLength : function(){
            if(this.cmbColores.length == 0){
                return true;
            }
            return false;
        }
    },

    methods : {

        consultarSugerencias : function () {
            this.tiposSugerencias.forEach(function(element) {
                this.consultar(element);
            });
        },

        consultar : function(id){
            var url = '/administrador/consultar/sugerencias/'+id;
            switch (id) {
                case 0:

                    break;
                case 1:
                    axios.get(url).then(response => {
                        this.cmbCategorias = response.data
            }).catch(error => {

            });
            break;
        case 2:
            axios.get(url).then(response => {
                this.cmbSubCategorias = response.data
        }).catch(error => {

            });
            break;
        case 3:
            axios.get(url).then(response => {
                this.cmbMarcas = response.data;
        }).catch(error => {

            });
            break;
        case 4:
            axios.get(url).then(response => {
                this.cmbColores = response.data;
        }).catch(error => {

            });
            break;
        default:
            console.log("algo");
        }
        },

        agregarSugerencia : function(idSugerencia,id,nombre,adicional){
            var url = '/administrador/guardar/sugerencias';
            switch (idSugerencia) {
                case 1:
                    axios.post(url, {
                        nombre : nombre,
                        id : id,
                        idSugerencia : idSugerencia,
                    }).then(response => {
                        toastr.success( "Guardardo");
                    this.eliminarSugerencia(id,idSugerencia);

            }).catch(response => {
                toastr.error( "Error al momento de guardar");
        });

            break
        case 2:
            axios.post(url, {
                nombre : nombre,
                id : id,
                idSugerencia : idSugerencia,
                categoria : adicional,

            }).then(response => {
                toastr.success( "Guardardo");
            this.eliminarSugerencia(id,idSugerencia);
        }).catch(response => {
                toastr.error( "Error al momento de guardar");
        });

            break
        case 3:
            axios.post(url, {
                nombre : nombre,
                id : id,
                idSugerencia : idSugerencia,
            }).then(response => {
                toastr.success( "Guardardo");
            this.eliminarSugerencia(id,idSugerencia);
        }).catch(response => {
                toastr.error( "Error al momento de guardar");
        });
            break
        case 4:
            console.log(adicional);

            axios.post(url, {
                nombre : nombre,
                color :adicional,
                id : id,
                idSugerencia : idSugerencia,
            }).then(response => {
                toastr.success( "Guardardo");
            this.eliminarSugerencia(id,idSugerencia);
        }).catch(response => {
                toastr.error( "Error al momento de guardar");
        });
            break
        default:
            console.log("algo");
        }
        },
        eliminarSugerencia : function(id,idSugerencia){
            var url = '/administrador/eliminar/sugerencias';
            axios.post(url, {
                id : id,
            }).then(response => {
                this.consultar(idSugerencia);
        }).catch(response => {

            });
        }
    },

});


