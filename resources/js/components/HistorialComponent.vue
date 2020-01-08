<template>
	<div>
		<div class="row encabezado-aseguradoras">
            <div class="col-lg-12 mt-3">
                <h3 class="text-left">Historial</h3>
            </div>
        </div>
        <div id="rec" class=" box row">
        	<mi-mapa class="w-100" :markers='camaras'>
      		</mi-mapa>
        </div>
	</div>
</template>
<script>
	export default{
		data(){
			return {
				ubicacion: [],
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
		},
		mounted(){
			this.getCamaras();
			console.log('Historial Component mounted');
		}
	}
</script>
