<template>
    <div>
        <div>
            <div class="row encabezado-aseguradoras">
                <div class="col-lg-12">
                    <!--img align="left" style="" src="img/reconocimiento.png" id="imgPalomita"-->
                    <span><strong>Registro</strong></span>
                </div>
            </div>
        </div>
        <div>
            <table class="encabezado-plateList" style="width:100%; color: #f58220; margin-bottom: 1%;" >
                <tr>
                    <td align="center" style="padding-left: 14%;  padding-top: 1%;  "><strong> Placa</strong></td>
                    <td align="center" style="padding-right: 15%;  padding-top: 1%; "><strong> Información</strong></td>
                </tr>
            </table>
        </div>
        <table class="plateList" style="width: 100%; height: 100%; color:white">
            <tbody>
            <tr v-for="(placa, index) in placas" style=" cursor:pointer; border-top: 1px solid white;">
                <td align="center" style=" padding-left: 5%;">
                    <span style="color:#ff8200; font-weight:bold; padding-top:5%" @click="mostrar(index)">{{placa.placa_original}}</span>
                </td>
                <td align="left">
                    <span style="color:#f58220; padding-left: 30%; "><span style="color: white;"> Sistema: </span>{{ placa.sistema_img }}</span>
                    <br>
                    <span style="color:#f58220; padding-left: 30%; " id="fecha"><span style="color: white;"> Fecha: </span> {{ placa.fecha_hora }}</span>
                    <br>
                    <span style="color:#f58220; padding-left: 30%; "><span style="color: white;"> Carril: </span> {{ placa.carril_img }}</span>
                    <br>
                    <span style="color:#f58220; padding-left: 30%; "><span style="color: white;"> Velocidad: </span> {{ placas[index].imagen1.velocidad }}</span>
                    <br>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

</template>

<script>
    export default {
        data(){
            return {
                placas:[],
                imagenes:[],
                placa:{ },
            }
        },
        methods:{
            getPlacas :function () {
                //console.log('entra aqui ');
                axios.get('api/mostrar').then(response => {
                    this.placas = response.data.placa;
                    console.log("Placa" ,this.placas);
                    var fecha = this.placas[0].fecha_hora;
                    var array_fecha = fecha.split("-");
                    var ano = parseInt(array_fecha[2]);
                    var mes = parseInt(array_fecha[1]);
                    var dia = parseInt(array_fecha[0]);
                    var fe = dia+' '+mes +' '+ ano;
                    console.log(fe);
                    //console.log(this.getImagen(this.placas));
                });
                /*document.getElementById('fecha').innerHTML= fe;*/
            },
            mostrar : function (index) {
                console.log('Mostrar' , this.placas[index]);
                var placa=this.placas[index];
                this.$root.$emit('set_placa',placa);
                this.$root.$emit('set_input', placa);
            }
        },
        mounted() {
            this.getPlacas();
            //console.log('Monatada Tabla')
            //console.log()
        }
    }
</script>

<style scoped>

</style>
