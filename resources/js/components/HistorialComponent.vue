<template>
	<div>
		<div class="row encabezado-aseguradoras">
            <div class="col-lg-12 ">
                <h3 class="text-left">Historial</h3>
            </div>
        </div>
        <div id="rec" class=" box row">
        	<mi-mapa class="w-100" :markers='ubicacion'>
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
						this.camaras.push({lat:parseFloat(item.lat),lng:parseFloat(item.long),ubicacion:item.ubicacion,referencia:item.referencia});
					});
				}).catch(err=>{
					console.log(err);
				})
			},
			setUbicacion(res){
				
				var arreglo = [];
				// PARA SISTEMA 0 Y SISTEMA -1
				if(res['sistema_1']['result'].length > 0 || res['sistema_0']['result'].length > 0){
					let detecciones_0 = res.sistema_1.result.length + res.sistema_0.result.length;
					let alta_velocidad_0 = 0;
					res.sistema_0.result.forEach(registro=>{
						if (registro.velocidad >= 81) {
							alta_velocidad_0 +=1;
						}
					})
					res.sistema_1.result.forEach(registro=>{
						if (registro.velocidad >= 81) {
							alta_velocidad_0 +=1;						}
					})
					arreglo.push({'camaras':this.camaras[0],'detecciones':detecciones_0,'multas':alta_velocidad_0});
				}
				if (res['sistema_11']['result'].length > 0) {
					let detecciones_1 = res.sistema_11.result.length;
					let alta_velocidad_1 = 0;
					res.sistema_11.result.forEach(registro=>{
						if (registro.velocidad >= 81) {
							alta_velocidad_1 +=1;
						}
					})
					arreglo.push({'camaras':this.camaras[1],'detecciones':detecciones_1,'multas':alta_velocidad_1});
				}
				if (res['sistema_13']['result'].length > 0) {
					let detecciones_2 = res.sistema_13.result.length;
					let alta_velocidad_2 = 0;
					res.sistema_13.result.forEach(registro=>{
						if (registro.velocidad >= 81) {
							alta_velocidad_2 +=1;
						}
					})
					arreglo.push({'camaras':this.camaras[2],'detecciones':detecciones_2,'multas':alta_velocidad_2});
				}
				if (res['sistema_14']['result'].length > 0) {
					let detecciones_3 = res.sistema_14.result.length;
					let alta_velocidad_3 = 0;
					res.sistema_14.result.forEach(registro=>{
						if (registro.velocidad >= 81) {
							alta_velocidad_3 +=1;
						}
					})
					arreglo.push({'camaras':this.camaras[3],'detecciones':detecciones_3,'multas':alta_velocidad_3});
				}
				if (res['sistema_15']['result'].length > 0) {
					let detecciones_4 = res.sistema_15.result.length;
					let alta_velocidad_4 = 0;
					res.sistema_15.result.forEach(registro=>{
						if (registro.velocidad >= 81) {
							alta_velocidad_4 +=1;
						}
					})
					arreglo.push({'camaras':this.camaras[4],'detecciones':detecciones_4,'multas':alta_velocidad_4});
				}
				if (res['sistema_16']['result'].length > 0) {
					let detecciones_5 = res.sistema_16.result.length;
					let alta_velocidad_5 = 0;
					res.sistema_16.result.forEach(registro=>{
						if (registro.velocidad >= 81) {
							alta_velocidad_5 +=1;
						}
					})
					arreglo.push({'camaras':this.camaras[5],'detecciones':detecciones_5,'multas':alta_velocidad_5});
				}
				if (res['sistema_17']['result'].length > 0) {
					let detecciones_6 = res.sistema_17.result.length;
					let alta_velocidad_6 = 0;
					res.sistema_17.result.forEach(registro=>{
						if (registro.velocidad >= 81) {
							alta_velocidad_6 +=1;
						}
					})
					arreglo.push({'camaras':this.camaras[6],'detecciones':detecciones_6,'multas':alta_velocidad_6});
				}
				if (res['sistema_18']['result'].length > 0) {
					let detecciones_7 = res.sistema_18.result.length;
					let alta_velocidad_7 = 0;
					res.sistema_18.result.forEach(registro=>{
						if (registro.velocidad >= 81) {
							alta_velocidad_7 +=1;
						}
					})
					arreglo.push({'camaras':this.camaras[7],'detecciones':detecciones_7,'multas':alta_velocidad_7});
				}
				if (res['sistema_19']['result'].length > 0) {
					let detecciones_8 = res.sistema_19.result.length;
					let alta_velocidad_8 = 0;
					res.sistema_19.result.forEach(registro=>{
						if (registro.velocidad >= 81) {
							alta_velocidad_8 +=1;
						}
					})
					arreglo.push({'camaras':this.camaras[8],'detecciones':detecciones_8,'multas':alta_velocidad_8});
				}
				if (res['sistema_21']['result'].length > 0) {
					let detecciones_9 = res.sistema_21.result.length;
					let alta_velocidad_9 = 0;
					res.sistema_21.result.forEach(registro=>{
						if (registro.velocidad >= 81) {
							alta_velocidad_9 +=1;
						}
					})
					arreglo.push({'camaras':this.camaras[9],'detecciones':detecciones_9,'multas':alta_velocidad_9});
				}
				if (res['sistema_22']['result'].length > 0) {
					let detecciones_10 = res.sistema_22.result.length;
					let alta_velocidad_10 = 0;
					res.sistema_22.result.forEach(registro=>{
						if (registro.velocidad >= 81) {
							alta_velocidad_10 +=1;
						}
					})
					arreglo.push({'camaras':this.camaras[10],'detecciones':detecciones_10,'multas':alta_velocidad_10});
				}
				if (res['sistema_43']['result'].length > 0) {
					let detecciones_11 = res.sistema_43.result.length;
					let alta_velocidad_11 = 0;
					res.sistema_43.result.forEach(registro=>{
						if (registro.velocidad >= 81) {
							alta_velocidad_11 +=1;
						}
					})
					arreglo.push({'camaras':this.camaras[11],'detecciones':detecciones_11,'multas':alta_velocidad_11});
				}
				if (res['sistema_44']['result'].length > 0) {
					let detecciones_12 = res.sistema_44.result.length;
					let alta_velocidad_12 = 0;
					res.sistema_44.result.forEach(registro=>{
						if (registro.velocidad >= 81) {
							alta_velocidad_12 +=1;
						}
					})
					arreglo.push({'camaras':this.camaras[12],'detecciones':detecciones_12,'multas':alta_velocidad_12});
				}
				this.ubicacion = arreglo;
			},
		},
		props:{
			response: {}
		},
		watch:{
			'response':function (newVal,oldVal){
				this.ubicacion = [];
				this.setUbicacion(newVal);
			}
		},
		mounted(){
			this.getCamaras();
			console.log('Historial Component mounted');
		}
	}
</script>
