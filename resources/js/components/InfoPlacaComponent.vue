<template>
    <div>
        <div class="row encabezado-aseguradoras">
            <div class="col-lg-12">
                <!--img align="left" style="" src="img/informacion.png" id="imgLapicito"-->
                <span><strong> Información</strong></span>
            </div>
        </div>
        <div class="box row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="cajita divrepuve"> <!--AGREGADO RECINETEMENTE 24_1_2017-->
                    <div class="row ajustar">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 contenedor-datos-carro">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                    <span id="marca" > Marca </span>
                                </div>

                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <span id="marcaRepuve" style="color: white;">{{ repuve.marca  ? repuve.marca : '-'}}</span>

                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 contenedor-datos-carro">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <span id="clase">Clase</span>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <span id="claseRepuve" style="color: white;">{{ repuve.clase ? repuve.clase : '-'}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ajustar">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 contenedor-datos-carro">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <span id="modelo">Modelo</span>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <span id="modeloRepuve" style="color: white;">{{ repuve.modelo ? repuve.modelo : '-'}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 contenedor-datos-carro">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <span id="niv">NIV</span>
                                </div>
                                <div class=" col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <span id="nivRepuve" style="color: white;">{{ repuve.niv  ? repuve.niv : '-'}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ajustar">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 contenedor-datos-carro">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <span id="anio">Año</span>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <span id="anioRepuve" style="color: white;">{{ repuve.año ? repuve.año : '-'}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 contenedor-datos-carro">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <span id="version">Versión</span>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <span id="versionRepuve" style="color: white;">{{ repuve.version ?  repuve.version : '-' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ajustar">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 contenedor-datos-carro">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <span id="tipo">Tipo</span>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <span id="tipoRepuve" style="color: white;">{{ repuve.tipo ?  repuve.tipo : '-' }}</span>
                                </div>
                            </div>
                        </div>
                        <div id="divRobado" class="col-lg-6 col-md-6 col-sm-6 col-xs-6 contenedor-datos-carro">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <span id="robado" >Robado</span>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div id="divColorRobado" class="indicadorRobo" style="overflow: hidden;">
                                        <span id="robadoRepuve" style="color: white;">{{ repuve.robado ? repuve.robado : '-' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 3%; margin-bottom: 8%">
                <div class="row" >
                    <div class=" col-lg-7 col-md-7 col-sm-7 col-xs-7" >

                        <!--                                                                  AQUI ESTA EL DIV DEL MAPA                                                                                -->
                        <map-registro-component></map-registro-component>

                    </div>
                    <div class=" col-lg-5 col-md-5 col-sm-5 col-xs-5 ">
                        <div class="cajita infoCaja">
                            <div class="contInformacion">
                                <div style="margin-top:0%;margin-left:0%;" align="center"> <!-- agregadorecientemente -->
                                    <span style="margin-top:30%;" id="encabezado-infor" ><strong > Información</strong></span>
                                </div>
                            </div>
                            <div class="" style="padding-top:0%;height:87%">
                                <table class="tableInfo" style="width:100%;height:100%;margin-top:0%;"> <!--AGREGADO RECIENTEMENTE se quito el style de la tabla-->
                                    <tr >
                                        <td>
                                            <span style="color: #f58220; padding-left: 1.5%;">PLACA: </span>
                                            <span id="inPlate" style="color: white;">{{ repuve.placa ? repuve.placa : 'PLACA' }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span style="color: #f58220; padding-left: 1.5%;">SISTEMA: </span>
                                            <span id="inSistema" style="color: white;">{{ placa.sistema_img ? placa.sistema_img : 'SISTEMA' }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span style="color: #f58220; padding-left: 1.5%;">Direccion: </span><span id="inUbicacion" style="color: white;">{{placa.ubicacion ? placa.ubicacion : 'Viaducto Miguel Alemán  y Av. Patriotismo'}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span style="color: #f58220; padding-left: 1.5%;">CARRIL: </span><span id="inCarril" style="color: white;">{{ placa.carril_img ? placa.carril_img : 'CARRIL' }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span style="color: #f58220; padding-left: 1.5%;">VELOCIDAD: </span><span id="inVelocidad" style="color: white;">{{  placa.imagen1 ? placa.imagen1.velocidad : 'VELOCIDAD'}}</span > <span style="color: white;"> km/h </span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return {
            map:"",
            marker:"",
            google:Object,
            placa:{},
            repuve:{}
        }
    },
    methods:{
        getCamaras(){
            axios.get('api/camaras').then(res=>{
                var array_response = res.data.camaras;
                array_response.forEach(item=>{
                    console.log('Get Camaras Info Placa');
                    this.camaras.push({lat:parseFloat(item.lat),lng:parseFloat(item.long)});
                });
            }).catch(err=>{
                console.log(err);
            })
        },
        getRepuve(placa){
            axios.post('api/repuve',{placa:placa}).then(res=>{
               console.log('REPUVE',res.data);
               this.repuve = res.data.result;
            });
        }
    },
    mounted() {
        console.log('Componentes mapa mounted');

        this.$root.$on('set_placa',placa=>{
            this.placa = placa;
        })
        /*this.map = new google.maps.Map(document.getElementById('map'),{
            center: {
                lat: 23.877435178885975,
                lng: -102.62050005000003
            },
            zoom: 5,
        });*/
    },
    watch:{
        'placa':function(new_valor,old_valor){
            this.getRepuve(this.placa.placa_original);
        }
    }
}
</script>

<style scoped>

</style>
