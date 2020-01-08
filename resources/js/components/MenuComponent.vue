<template>
    <div class="col-12">
        <div class="capsula">
            <article id="imagenes">
                <div class="row encabezado-aseguradoras">
                    <div class="col-lg-12 mt-3">
                        <h3 class="text-left">Busqueda de Placas:</h3>
                    </div>
                </div>
                <!-- <pre>
                    data {{this.$data}}
                </pre>   -->
                <div class="box row">
                    <div class="col-12 mt-3 mb-3">
                        <form @submit="checkPlaca" method="post">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Placa:</span>
                                </div>
                                <!-- @csrf -->
                                <input id="placa" v-model="placa" type="search" name="placa" class="form-control uppercase">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-info">Buscar</button>
                                </div>
                            </div>
                        </form>
                        <div class="alert alert-danger alert-dismissible fade show w-100" v-if="errors.length">
                            <ul>
                                <li v-for="error in errors">{{ error }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card col-12" v-if="!(Object.keys(placa_response).length === 0 )">
                    <div class="card-header">
                        <h3>Placa: {{ placa_response.placa }}</h3>
                    </div>
                    <div class="card-body" style="padding: 0 !important;">
                        <div class="col-md-12 contenedor-datos-carro-info">
                            <div class="row">
                                <div class="col text-left">
                                    Marca 
                                </div>
                                <div class="col text-right text-warning">
                                    {{ placa_response.placa ? (placa_response.marca ? placa_response.marca : 'No encontrada') : 'N/A'}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 contenedor-datos-carro-info">
                            <div class="row">
                                <div class="col text-left">
                                    Modelo
                                </div>
                                <div class="col text-right text-warning">
                                    {{ placa_response.placa ? (placa_response.modelo ? placa_response.modelo : 'No encontrada') : 'N/A'}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 contenedor-datos-carro-info">
                            <div class="row">
                                <div class="col text-left">
                                    Año
                                </div>
                                <div class="col text-right text-warning">
                                    {{ placa_response.placa ? (placa_response.anio ? placa_response.anio : 'No encontrada') : 'N/A'}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 contenedor-datos-carro-info">
                            <div class="row">
                                <div class="col text-left">
                                    Clase
                                </div>
                                <div class="col text-right text-warning">
                                    {{ placa_response.placa ? (placa_response.clase ? placa_response.clase : 'No encontrada') : 'N/A'}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 contenedor-datos-carro-info">
                            <div class="row">
                                <div class="col text-left">
                                    NIV
                                </div>
                                <div class="col text-right text-warning">
                                    {{ placa_response.placa ? (placa_response.niv ? placa_response.niv : 'No encontrada') : 'N/A'}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 contenedor-datos-carro-info">
                            <div class="row">
                                <div class="col text-left">
                                    Version
                                </div>
                                <div class="col text-right text-warning">
                                    {{ placa_response.placa ? (placa_response.version ? placa_response.version : 'No encontrada') : 'N/A'}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 contenedor-datos-carro-info">
                            <div class="row">
                                <div class="col text-left">
                                    Tipo
                                </div>
                                <div class="col text-right text-warning">
                                    {{ placa_response.placa ? (placa_response.tipo ? placa_response.tipo : 'No encontrada') : 'N/A'}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 contenedor-datos-carro-info">
                            <div class="row">
                                <div class="col text-left">
                                    Velocidad Promedio
                                </div>
                                <div class="col text-right text-warning">
                                    N/A
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
                                    N/A
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
                                    {{ placa_response.placa ? (placa_response.robado ? 'SI' : 'NO') : 'N/A'}}
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
                                    N/A
                                    <!-- {{-- TODO --}} -->
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
            errors:[],
            placa : "",
            placa_response : {},
            activeItem:'velocidad',
          }
        },
        methods:{
            checkPlaca(e){
                this.errors = [];
                if (!this.placa) {
                    this.errors.push('La placa es requerido.');
                }
                if (!this.validPlaca(this.placa)) {
                    this.errors.push('Es necesario una placa valida. Sólo se permite el uso de letras (excepto la I y O) y numeros. Con longitud de 4 a 7');
                }
                if (!this.errors.length) {
                    axios.post('api/placa',{placa:this.placa}).then(response=>{
                        this.placa_response = {};
                        console.log(response.data);
                        this.placa_response = response.data.placa
                    }).catch(error=>{
                        if (error.response) {
                            this.placa_response = {};
                            var errs = error.response.data.errors.placa;
                            console.log(errs);
                            errs.forEach(item=>this.errors.push(item));
                            console.log(error.response.data);
                        }
                        console.log(error);
                    });
                }
                e.preventDefault();
            },
            validPlaca(placa){
                var reg= /^[A-Ha-hJ-Nj-nP-Zp-z0-9]{4,7}$/;
                return reg.test(placa);
            },
            setTab(menuItem){
                this.$root.$emit('set-tab',menuItem);
            }
        },
        mounted() {
            console.log('Component mounted.');

        }
    }
</script>