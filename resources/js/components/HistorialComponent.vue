<template>
	<div>
		<div class="row encabezado-aseguradoras">
            <div class="col-lg-12 mt-3">
                <h3 class="text-left">Historial</h3>
            </div>
        </div>
        <div id="rec" class=" box row">
        	<mi-mapa class="w-100" :markers='ubicacion'>
      		</mi-mapa>
        </div>
		<!-- <pre style="background-color:white;">{{ $data }}</pre> -->
	</div>
</template>
<script>
	export default{
		data(){
			return {
				ubicacion: Array,
				map : null,
				camaras: [],
			}
		},
		methods:{
			getCamaras(){
				axios.get('api/camaras').then(res=>{
					var array_response = res.data.camaras;
					array_response.forEach(item=>{
						this.camaras.push({lat:parseFloat(item.lat),lng:parseFloat(item.long)});
					});
				}).catch(err=>{
					console.log(err);
				})
			},
			setUbicacion(res){
				this.ubicacion = [];
				let array = [];
				// PARA SISTEMA 0 Y SISTEMA -1
				if(res['sistema-1']['result'].length > 0 || res['sistema_0']['result'].length > 0){
					array.push(this.camaras[0]);
				}
				if (res['sistema_11']['result'].length > 0) {
					array.push(this.camaras[1]);
				}
				if (res['sistema_13']['result'].length > 0) {
					array.push(this.camaras[2]);
				}
				if (res['sistema_14']['result'].length > 0) {
					array.push(this.camaras[3]);
				}
				if (res['sistema_15']['result'].length > 0) {
					array.push(this.camaras[4]);
				}
				if (res['sistema_16']['result'].length > 0) {
					array.push(this.camaras[5]);
				}
				if (res['sistema_17']['result'].length > 0) {
					array.push(this.camaras[6]);
				}
				if (res['sistema_18']['result'].length > 0) {
					array.push(this.camaras[7]);
				}
				if (res['sistema_19']['result'].length > 0) {
					array.push(this.camaras[8]);
				}
				if (res['sistema_21']['result'].length > 0) {
					array.push(this.camaras[9]);
				}
				if (res['sistema_22']['result'].length > 0) {
					array.push(this.camaras[10]);
				}
				if (res['sistema_43']['result'].length > 0) {
					array.push(this.camaras[12]);
				}
				if (res['sistema_44']['result'].length > 0) {
					array.push(this.camaras[13]);
				}
				this.ubicacion = array;
				console.log(array['sistema-1']['result'].length)
			},
		},
		props:{
			response: Object
		},
		watch:{
			'response':function (newVal,oldVal){
				this.setUbicacion(newVal);
			}
		},
		mounted(){
			this.getCamaras();
			console.log('Historial Component mounted');
		}
	}
</script>
