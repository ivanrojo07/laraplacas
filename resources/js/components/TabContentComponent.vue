<template>
	<div>
		<div id="loading" v-show="load"></div>
		<historial-component class="w-100 h-100" style="min-height: 83vh !important;" v-show="tab == 'velocidad'" :response="historial"></historial-component>
		<exceso-component class="w-100 h-100" style="min-height: 83vh !important;" v-show="tab == 'exceso'" :response="historial"></exceso-component>
		<robo-component class="w-100 h-100" style="min-height: 83vh !important;" v-show="tab == 'robado'" :response="robo"></robo-component>
		<detecciones-component class="w-100 h-100" style="min-height: 83vh !important;" v-show="tab == 'detecciones'" :response="historial"></detecciones-component>
	</div>
</template>
<style>
#loading {
  display: block ;
  position: absolute ;
  top: 0 ;
  left: 0 ;
  z-index: 1000 ;
  width: 100% ;
  height: 100% ;
  background-color: rgba(0, 0, 0, 0.75) ;
  background-image: url("/Placas/public/images/load.gif") ;
  background-size: 15%;
  background-repeat: no-repeat ;
  background-position: center ;
}
</style>
<script>
import DeteccionesComponent from "./DeteccionesComponent";
import HistorialComponent from "./HistorialComponent";
	export default{
		data(){
			return {
				load: false,
				tab : 'velocidad',
				placa: String,
				historial: {},
				robo: {},
				url_sistema_menos_1: "api/sistema-1",
				url_sistema_0: "api/sistema_0",
				url_sistema_11: "api/sistema_11",
				url_sistema_13: "api/sistema_13",
				url_sistema_14: "api/sistema_14",
				url_sistema_15: "api/sistema_15",
				url_sistema_16: "api/sistema_16",
				url_sistema_17: "api/sistema_17",
				url_sistema_18: "api/sistema_18",
				url_sistema_19: "api/sistema_19",
				url_sistema_21: "api/sistema_21",
				url_sistema_22: "api/sistema_22",
				url_sistema_43: "api/sistema_43",
				url_sistema_44: "api/sistema_44",
			}
		},
		watch:{
			'placa':function(newVal,oldVal){
				this.getHistorico(this.placa);
			}
		},
		components:{
			DeteccionesComponent,
			HistorialComponent
		},
		methods:{
			'getHistorico':function(placa){
				this.load = true;
				const sistema_0 = this.setSistema0(placa);
				const sistema_menos_1 = this.setSistemaMenos1(placa);
				const sistema_11 = this.setSistema11(placa);
				const sistema_13 = this.setSistema13(placa);
				const sistema_14 = this.setSistema14(placa);
				const sistema_15 = this.setSistema15(placa);
				const sistema_16 = this.setSistema16(placa);
				const sistema_17 = this.setSistema17(placa);
				const sistema_18 = this.setSistema18(placa);
				const sistema_19 = this.setSistema19(placa);
				const sistema_21 = this.setSistema21(placa);
				const sistema_22 = this.setSistema22(placa);
				const sistema_43 = this.setSistema43(placa);
				const sistema_44 = this.setSistema44(placa);

				axios.all([
					sistema_menos_1,
					sistema_0,
					sistema_11,
					sistema_13,
					sistema_14,
					sistema_15,
					sistema_16,
					sistema_17,
					sistema_18,
					sistema_19,
					sistema_21,
					sistema_22,
					sistema_43,
					sistema_44
					]).then(axios.spread((...responses)=>{
						this.historial = {};
						this.historial['sistema_1']=responses[0].data;
						this.historial['sistema_0']=responses[1].data;
						this.historial["sistema_11"]=responses[2].data;
						this.historial["sistema_13"]=responses[3].data;
						this.historial["sistema_14"]=responses[4].data;
						this.historial["sistema_15"]=responses[5].data;
						this.historial["sistema_16"]=responses[6].data;
						this.historial["sistema_17"]=responses[7].data;
						this.historial["sistema_18"]=responses[8].data;
						this.historial["sistema_19"]=responses[9].data;
						this.historial["sistema_21"]=responses[10].data;
						this.historial["sistema_22"]=responses[11].data;
						this.historial["sistema_43"]=responses[12].data;
						this.historial["sistema_44"]=responses[13].data;
						this.load = false;
						this.setSistemasInfo();
				})).catch(errors=>{
					console.log(errors);
					this.load =false;
				})


			},
			'setSistema0':function (placa) {
				return axios.post(this.url_sistema_0,{placa:placa});
			},
			'setSistemaMenos1':function (placa) {
				return axios.post(this.url_sistema_menos_1,{placa:placa});
			},
			'setSistema11':function (placa) {
				return axios.post(this.url_sistema_11,{placa:placa});
			},
			'setSistema13':function (placa) {
				return axios.post(this.url_sistema_13,{placa:placa});
			},
			'setSistema14':function (placa) {
				return axios.post(this.url_sistema_14,{placa:placa});
			},
			'setSistema15':function (placa) {
				return axios.post(this.url_sistema_15,{placa:placa});
			},
			'setSistema16':function (placa) {
				return axios.post(this.url_sistema_16,{placa:placa});
			},
			'setSistema17':function (placa) {
				return axios.post(this.url_sistema_17,{placa:placa});
			},
			'setSistema18':function (placa) {
				return axios.post(this.url_sistema_18,{placa:placa});
			},
			'setSistema19':function (placa) {
				return axios.post(this.url_sistema_19,{placa:placa});
			},
			'setSistema21':function (placa) {
				return axios.post(this.url_sistema_21,{placa:placa});
			},
			'setSistema22':function (placa) {
				return axios.post(this.url_sistema_22,{placa:placa});
			},
			'setSistema43':function (placa) {
				return axios.post(this.url_sistema_43,{placa:placa});
			},
			'setSistema44':function (placa) {
				return axios.post(this.url_sistema_44,{placa:placa});
			},
			'setSistemasInfo': function(){
				var velocidades =[];
				var exceso_velocidad = 0;
				if(this.historial.sistema_1.result.length > 0){
					for (var i = this.historial.sistema_1.result.length - 1; i >= 0; i--) {
						if (this.historial.sistema_1.result[i].Velocidad >=81.00) {
							exceso_velocidad += 1;
						}
						velocidades.push(this.historial.sistema_1.result[i].Velocidad);
					}
				}
				if(this.historial.sistema_0.result.length > 0){
					for (var i = this.historial.sistema_0.result.length - 1; i >= 0; i--) {
						if (this.historial.sistema_0.result[i].Velocidad >= 81.00) {
							exceso_velocidad +=1;
						}
						velocidades.push(this.historial.sistema_0.result[i].Velocidad);
					}
				}
				if(this.historial.sistema_11.result.length > 0){
					for (var i = this.historial.sistema_11.result.length - 1; i >= 0; i--) {
						if (this.historial.sistema_11.result[i].velocidad.velocidad >= 81.00) {
							exceso_velocidad +=1;
						}
						console.log(this.historial.sistema_11.result[i]);
						velocidades.push(this.historial.sistema_11.result[i].velocidad.velocidad);
					}
				}
				if(this.historial.sistema_13.result.length > 0){
					for (var i = this.historial.sistema_13.result.length - 1; i >= 0; i--) {
						if (this.historial.sistema_13.result[i].velocidad.velocidad >= 81.00) {
							exceso_velocidad +=1;
						}
						console.log(this.historial.sistema_13.result[i]);
						velocidades.push(this.historial.sistema_13.result[i].velocidad.velocidad);
					}
				}
				if(this.historial.sistema_14.result.length > 0){
					for (var i = this.historial.sistema_14.result.length - 1; i >= 0; i--) {
						if (this.historial.sistema_14.result[i].velocidad.velocidad >= 81.00) {
							exceso_velocidad +=1;
						}
						console.log(this.historial.sistema_14.result[i]);
						velocidades.push(this.historial.sistema_14.result[i].velocidad.velocidad);
					}
				}
				if(this.historial.sistema_15.result.length > 0){
					for (var i = this.historial.sistema_15.result.length - 1; i >= 0; i--) {
						if (this.historial.sistema_15.result[i].velocidad.velocidad >= 81.00) {
							exceso_velocidad +=1;
						}
						console.log(this.historial.sistema_15.result[i]);
						velocidades.push(this.historial.sistema_15.result[i].velocidad.velocidad);
					}
				}
				if(this.historial.sistema_16.result.length > 0){
					for (var i = this.historial.sistema_16.result.length - 1; i >= 0; i--) {
						if (this.historial.sistema_16.result[i].velocidad.velocidad >= 81.00) {
							exceso_velocidad +=1;
						}
						console.log(this.historial.sistema_16.result[i]);
						velocidades.push(this.historial.sistema_16.result[i].velocidad.velocidad);
					}
				}
				if(this.historial.sistema_17.result.length > 0){
					for (var i = this.historial.sistema_17.result.length - 1; i >= 0; i--) {
						if (this.historial.sistema_17.result[i].velocidad.velocidad >= 81.00) {
							exceso_velocidad +=1;
						}
						console.log(this.historial.sistema_17.result[i]);
						velocidades.push(this.historial.sistema_17.result[i].velocidad.velocidad);
					}
				}
				if(this.historial.sistema_18.result.length > 0){
					for (var i = this.historial.sistema_18.result.length - 1; i >= 0; i--) {
						if (this.historial.sistema_18.result[i].velocidad.velocidad >= 81.00) {
							exceso_velocidad +=1;
						}
						console.log(this.historial.sistema_18.result[i]);
						velocidades.push(this.historial.sistema_18.result[i].velocidad.velocidad);
					}
				}
				if(this.historial.sistema_19.result.length > 0){
					for (var i = this.historial.sistema_19.result.length - 1; i >= 0; i--) {
						if (this.historial.sistema_19.result[i].velocidad.velocidad >= 81.00) {
							exceso_velocidad +=1;
						}
						console.log(this.historial.sistema_19.result[i]);
						velocidades.push(this.historial.sistema_19.result[i].velocidad.velocidad);
					}
				}
				if(this.historial.sistema_21.result.length > 0){
					for (var i = this.historial.sistema_21.result.length - 1; i >= 0; i--) {
						if (this.historial.sistema_21.result[i].velocidad.velocidad >= 81.00) {
							exceso_velocidad +=1;
						}
						console.log(this.historial.sistema_21.result[i]);
						velocidades.push(this.historial.sistema_21.result[i].velocidad.velocidad);
					}
				}
				if(this.historial.sistema_22.result.length > 0){
					for (var i = this.historial.sistema_22.result.length - 1; i >= 0; i--) {
						if (this.historial.sistema_22.result[i].velocidad.velocidad >= 81.00) {
							exceso_velocidad +=1;
						}
						console.log(this.historial.sistema_22.result[i]);
						velocidades.push(this.historial.sistema_22.result[i].velocidad.velocidad);
					}
				}
				if(this.historial.sistema_43.result.length > 0){
					for (var i = this.historial.sistema_43.result.length - 1; i >= 0; i--) {
						if (this.historial.sistema_43.result[i].velocidad.velocidad >= 81.00) {
							exceso_velocidad +=1;
						}
						console.log(this.historial.sistema_43.result[i]);
						velocidades.push(this.historial.sistema_43.result[i].velocidad.velocidad);
					}
				}
				if(this.historial.sistema_44.result.length > 0){
					for (var i = this.historial.sistema_44.result.length - 1; i >= 0; i--) {
						if (this.historial.sistema_44.result[i].velocidad.velocidad >= 81.00) {
							exceso_velocidad +=1;
						}
						console.log(this.historial.sistema_44.result[i]);
						velocidades.push(this.historial.sistema_44.result[i].velocidad.velocidad);
					}
				}
				var velocidad_final = 0;
				var detecciones = 0
				velocidades.forEach(res=>{
					velocidad_final += res;
				});
				velocidad_final = velocidad_final/velocidades.length;
				detecciones = velocidades.length;
				this.$root.$emit('info-sistemas',velocidad_final,exceso_velocidad, detecciones);
			},
		},
		mounted(){
			// Escucha el evento setTab del MenuComponent
			this.$root.$on('set-tab',(tab)=>{
				// Cambia de modal al activar el pills
				this.tab = tab;
			});
			this.$root.$on('set-placa-info',(placa)=>{
				this.placa = placa.placa;
				// alert('placa encontrada ID:'+placa.id);
				// console.log(placa);
				// axios.post('api/historial_placa',{'placa':placa.placa}).then((res)=>{
				// 	// console.log(res.data);
				// 	var response = res.data
				// 	this.historial = res.data.historial;
				// 	console.log(this.historial)
				// }).catch((err)=>{
				// 	console.log(err);
				// });
				// TODO
			});
			this.$root.$on('set-repuve-info',(res)=>{
				if(res.robado.trim() == "SI"){
					this.robo = res.reporte_robo;
				}
				else{
					this.robo = {};
				}
			});
		}

	} 
</script>
