<template>
<div>
    <div class="row encabezado-aseguradoras">
        <div class="col-lg-12">
            <span><strong>Detección</strong></span>
        </div>
    </div>
    <div class="box row">
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <img id="imgVel" alt="Imagen Velocidad" name="imgvelocidad" :src="(plate.id_def ? 'data:image/jpg;base64,' + plate.imagen1.imgB64 : 'images/CAMvel.png')" >
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <img id="imgPlaca" alt="Imagen Placa" name = "imgplacas" align="center" :src="(plate.id_def ? 'data:image/jpg;base64,' + plate.imagen2.imgB64 : 'images/CAMpla.png')">
        </div>
    </div>
</div>
</template>

<script>
export default {
    data(){
        return {
            plate:{},
        }
    },
    methods:{
    },
    mounted() {
        //this.getImagen();
        this.$root.$on('set_placa',(res)=> {
          this.plate = res
            //console.log(this.plate);
        })

    }
}
</script>

<style scoped>

</style>
