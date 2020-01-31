<template>
    <div class="col-12">
        <div class="capsula">
            <article id="imagenes">
                <div class="row encabezado-aseguradoras">
                    <div class="col-lg-12 mt-3">
                        <h3 class="text-left">Busqueda de Placas:</h3>
                    </div>
                </div>
                <div class="box row">
                    <div class="col-12 mt-3 mb-3">
                        <!-- FORMULARIO PARA BUSCAR PLACA -->
                        <form @submit="checkPlaca" method="post">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Placa:</span>
                                </div>
                                <!-- MODELO PLACA QUE CAPTURA LA PLACA CONSULTADA -->
                                <input id="placa" v-model="placa" type="search" name="placa" class="form-control uppercase">
                                <div class="input-group-append">
                                    <!-- BOTON QUE LANZA EL FORMULARIO -->
                                    <button type="submit" class="btn btn-info">Buscar</button>
                                </div>
                            </div>
                        </form>
                        <!-- SI EXISTE ERRORES SOBRE LA PLACA CONSULTADA SE DESPLIEGA EL ERROR CAPTURADO -->
                        <div class="alert alert-danger alert-dismissible fade show w-100" v-if="errors.length">
                            <ul>
                                <!-- MUESTRA LA LISTA DE ERRORES CAPTURADOS. -->
                                <li v-for="error in errors">{{ error }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ========================================================================
                =====                                                                   =====
                =====       Tabla con la información del repuve sobre la placa buscada  =====
                =====                                                                   =====
                ========================================================================== -->
                <!-- verificamos si existe el objeto placa_response -->
                <div class="card col-12" v-if="!(Object.keys(placa_response).length === 0 )">
                    <div class="card-header">
                        <h3>Placa: {{ repuve_response.placa ? repuve_response.placa : 'Registro no encontrado en REPUVE' }}</h3>
                    </div>
                    <div class="card-body" style="padding: 0 !important;">
                        <div class="col-md-12 contenedor-datos-carro-info">
                            <div class="row">
                                <div class="col text-left">
                                    Marca 
                                </div>
                                <div class="col text-right text-warning">
                                    {{ repuve_response.placa ? (repuve_response.marca ? repuve_response.marca : 'No encontrada') : 'N/A'}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 contenedor-datos-carro-info">
                            <div class="row">
                                <div class="col text-left">
                                    Modelo
                                </div>
                                <div class="col text-right text-warning">
                                    {{ repuve_response.placa ? (repuve_response.modelo ? repuve_response.modelo : 'No encontrada') : 'N/A'}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 contenedor-datos-carro-info">
                            <div class="row">
                                <div class="col text-left">
                                    Año
                                </div>
                                <div class="col text-right text-warning">
                                    {{ repuve_response.placa ? (repuve_response.año ? repuve_response.año : 'No encontrada') : 'N/A'}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 contenedor-datos-carro-info">
                            <div class="row">
                                <div class="col text-left">
                                    Clase
                                </div>
                                <div class="col text-right text-warning">
                                    {{ repuve_response.placa ? (repuve_response.clase ? repuve_response.clase : 'No encontrada') : 'N/A'}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 contenedor-datos-carro-info">
                            <div class="row">
                                <div class="col text-left">
                                    NIV
                                </div>
                                <div class="col text-right text-warning">
                                    {{ repuve_response.placa ? (repuve_response.niv ? repuve_response.niv : 'No encontrada') : 'N/A'}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 contenedor-datos-carro-info">
                            <div class="row">
                                <div class="col text-left">
                                    Version
                                </div>
                                <div class="col text-right text-warning">
                                    {{ repuve_response.placa ? (repuve_response.version ? repuve_response.version : 'No encontrada') : 'N/A'}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 contenedor-datos-carro-info">
                            <div class="row">
                                <div class="col text-left">
                                    Tipo
                                </div>
                                <div class="col text-right text-warning">
                                    {{ repuve_response.placa ? (repuve_response.tipo ? repuve_response.tipo : 'No encontrada') : 'N/A'}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 contenedor-datos-carro-info">
                            <div class="row">
                                <div class="col text-left">
                                    Velocidad Promedio
                                </div>
                                <div class="col text-right text-warning">
                                    {{ velocidad_promedio ? velocidad_promedio : "N/A"}}
                                    <!-- función que lanza evento para cambiar la pestañas en tabcomponent -->
                                    <a class="" @click="setTab('velocidad')" href="#velocidad">Más detalles</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 contenedor-datos-carro-info">
                            <div class="row">
                                <div class="col text-left">
                                    Excesos de Velocidad
                                </div>
                                <div class="col text-right text-warning">
                                    {{exceso_velocidad ? exceso_velocidad : "N/A"}}
                                    <!-- función que lanza evento para cambiar la pestañas en tabcomponent -->
                                    <a class="" @click="setTab('exceso')" href="#exceso">Más detalles</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 contenedor-datos-carro-info" >
                            <div class="row">
                                <div class="col text-left">
                                    Robado
                                </div>
                                <div class="col text-right text-warning">
                                    {{ repuve_response.placa ? (repuve_response.robado ? repuve_response.robado : 'NO') : 'N/A'}}
                                    <!-- función que lanza evento para cambiar la pestañas en tabcomponent -->
                                    <a class="" href="#robado" @click="setTab('robado')">Más detalles</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 contenedor-datos-carro-info">
                            <div class="row">
                                <div class="col text-left">
                                    Detecciones
                                </div>
                                <div class="col text-right text-warning">
                                    {{detecciones ? detecciones : N/A}}
                                    <!-- función que lanza evento para cambiar la pestañas en tabcomponent -->
                                    <a class="" href="#detecciones" @click="setTab('detecciones')">Más detalles </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
          return {
            // LISTA DE ERRORES CAPTURADOS.
            errors:[],
            // MODELO DE LA PLACA BUSCADA.
            placa : "",
            // RESPUESTA RECIBIDA POR EL SERVIDOR.
            placa_response : {},
            // PESTANIA ACTIVADA.
            activeItem:'velocidad',
            // RESPUESTA RECIBIDA POR EL SERVIDOR DEL LA BUSQUEDA DE INFORMACIÓN DEL AUTO POR REPUVE.
            repuve_response:{},
            // RESPUESTA RECIBIDA PARA LA ETIQUETA DE VELOCIDAD PROMEDIO.
            velocidad_promedio:"",
            // RESPUESTA RECIBIDA PARA LA ETIQUETA DE EXCESO DE VELOCIDAD.
            exceso_velocidad:"",
            // RESPUESTA RECIBIDA PARA LA ETIQUETA DE DETECCIONES.
            detecciones: "",
          }
        },
        methods:{
            // VERIFICA SI EL MODELO PLACA ES VALIDADA Y CUMPLE CON LOS REQUISITOS 
            checkPlaca(e){
                // vaciamos el arreglo de errores previamente capturados
                this.errors = [];
                // si el modelo de la placa esta vacio o es nulo
                if (!this.placa) {
                    // agregamos un mensaje de error
                    this.errors.push('La placa es requerido.');
                }
                // verificamos si no pasa la función de verificar placa
                if (!this.validPlaca(this.placa)) {
                    // mostramos un mensaje de error 
                    this.errors.push('Es necesario una placa valida. Sólo se permite el uso de letras (excepto la I y O) y numeros. Con longitud de 4 a 7');
                }
                // verificamos si no tenemos mensajes de errores anteriores
                if (!this.errors.length) {
                    // realizamos un llamado al api de placas para agregar un registro de la placa buscada.
                    axios.post('api/placa',{placa:this.placa}).then(response=>{
                        // Vaciamos respuesta anterior de la placa.
                        this.placa_response = {};
                        // capturamos la respuesta en el data placa response
                        this.placa_response = response.data.placa
                        // lanzamos el evento en root con la placa response
                        this.$root.$emit('set-placa-info',this.placa_response);
                    }).catch(error=>{
                        // Si existe error con respuesta
                        if (error.response) {
                            // vaciamos la respuesta anterior de la placa
                            this.placa_response = {};
                            // capturamos el error en una variable
                            var errs = error.response.data.errors.placa;
                            // recorremos el arreglo y lo agregamos al arreglo del data error
                            errs.forEach(item=>this.errors.push(item));
                        }
                        console.log(error);
                    });
                    // llamamos a la funcion para obtener información del repuve 
                    this.getRepuve(this.placa);
                }
                // para no llamar a la función post (evita recargar la pagina)
                e.preventDefault();
            },
            // realiza una busqueda a la base de datos de repuve sobre la placa buscada.
            getRepuve(placa){
                // variable con la placa anterior del repuve. de lo contrario dejar vacio
                let repuve = (this.repuve_response.placa ? this.repuve_response.placa : "" )
                // verificamos si es diferente la placa actual buscada y la anterior
                if (this.placa != repuve.trim()) {
                    // agregar leyendas de cargando a velocidad promedio, exceso velocidad y detecciones.
                    this.velocidad_promedio = "CARGANDO...";
                    this.exceso_velocidad = "CARGANDO...";
                    this.detecciones = "CARGANDO...";
                }
                // Llamada a la api de repuve con la placa a buscar
                axios.post('api/repuve',{placa:placa}).then(res=>{
                    // guardar la respuesta en el objeto repuve_response
                    this.repuve_response = res.data.result;
                    // Lanzamos un evento a root con el repuve response.
                    this.$root.$emit('set-repuve-info',this.repuve_response);
                }).catch(err=>{
                    // console.log con los errores capturado
                    console.log(err.response.data);
                    // igualamos el objeto repuve response a vacio.
                    this.repuve_response = {};
                });
            },
            // Función para validar si la placa cumple una primera expresión regular.
            validPlaca(placa){
                // expresion regular para que no agregue I y O
                var reg= /^[A-Ha-hJ-Nj-nP-Zp-z0-9]{4,7}$/;
                // retornamos un booleano para que haya pasado la expresión regular.
                return reg.test(placa);
            },
            // función que cambia las pestañas del tabcomponent
            setTab(menuItem){
                // lanzamos un evento con la pestaña seleccionada.
                this.$root.$emit('set-tab',menuItem);
            }
        },
        mounted() {
            console.log('Component mounted.');
            // capturamos el evento info-sistema cuando se lance desde el componente
            // (capturamos los strings de velocidad promedio, contador de excesos de velocidad
            // y detecciones)
            this.$root.$on('info-sistemas',(velocidad_promedio,exceso_velocidad,detecciones)=>{
                // agregamos la velocidad promedio,contador de exceso de velocidad y detecciones al data
                this.velocidad_promedio = velocidad_promedio.toFixed(2)+" Km/h";
                this.exceso_velocidad = exceso_velocidad;
                this.detecciones = detecciones;

            })

        }
    }
</script>