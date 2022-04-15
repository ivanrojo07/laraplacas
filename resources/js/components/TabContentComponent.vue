<template>
	<div>
		<!-- loading spinner cuando se llama a la busqueda de los sistemas -->
		<div id="loading" v-show="load"></div>
		<!-- etiqueta que realiza la animación de transición de un componente a otro -->
		<transition name="component-fade" mode="out-in">
			<!-- Llamando al componente HistorialComponent -->
			<historial-component class="w-100 h-100 py-auto my-auto"  v-show="tab == 'velocidad'" :response="historial"></historial-component>
		</transition>
		<!-- transición entre componentes -->
		<transition name="component-fade" mode="out-in">
			<!-- Llamando al componente ExcesoComponent -->
			<exceso-component class="w-100 h-100 py-auto my-auto" v-show="tab == 'exceso'" :response="historial"></exceso-component>
		</transition>
		<!-- transición entre componentes -->
		<transition name="component-fade" mode="out-in">
			<!-- llamando al componente RoboComponent -->
			<robo-component class="w-100 h-100 py-auto my-auto " v-show="tab == 'robado'" :response="robo"></robo-component>
		</transition>
		<!-- transición entre componentes -->
		<transition name="component-fade" mode="out-in">
			<!-- llamando al componente DeteccionesComponent -->
			<detecciones-component class="w-100 h-100 py-auto my-auto" v-show="tab == 'detecciones'" :response="historial"></detecciones-component>
		</transition>
	</div>
</template>
<style scoped>
/*clase del loading spinner*/
#loading {
  display: block ;
  position: absolute ;
  top: 0 ;
  left: 0 ;
  z-index: 1000 ;
  width: 100% ;
  height: 100% ;
  background-color: rgba(0, 0, 0, 0.75) ;
  /*modificar ruta del background-image en producción*/
  background-image: url("/Placas/public/images/load.gif") ;
  background-size: 15%;
  background-repeat: no-repeat ;
  background-position: center ;
}
/*clases para la transición*/
.component-fade-enter-active, .component-fade-leave-active {
  transition: opacity 0.30s ease;
}
.component-fade-enter, .component-fade-leave-to
/* .component-fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>
<script>
// IMPORTAMOS LOS COMPONENTES A UTILIZAR
import DeteccionesComponent from "./DeteccionesComponent";
import HistorialComponent from "./HistorialComponent";
import ExcesoComponent from "./ExcesoComponent";
import RoboComponent from "./RoboComponent";
	export default{
		data(){
			return {
				// booleano para cargar el spinner loading
				load: false,
				// bandera para cambiar de pestaña/componente
				tab : 'velocidad',
				// Placa que obtendremos del reporte repuve
				placa: String,
				// objeto con las respuestas de la busqueda a los sistemas
				historial: {},
				// Objeto sobre la información de reportes de robo del automovil
				robo: {},
				// url sistema -1 (CHURUBUSCO)
				url_sistema_menos_1: "api/sistema1",
				// url sistema 0 (CHUBURUSCO)
				url_sistema_0: "api/sistema0",
				// url sistema 11 (Patriotismo)
				url_sistema_11: "api/sistema11",
				// url sistema 13 (Consulado)
				url_sistema_13: "api/sistema13",
				// url sistema 14 (Ciudad Universitaria)
				url_sistema_14: "api/sistema14",
				// url sistema 15 (Soriana)
				url_sistema_15: "api/sistema15",
				// url sistema 16 (Xotepingo)
				url_sistema_16: "api/sistema16",
				// url sistema 17 (Xotepingo)
				url_sistema_17: "api/sistema17",
				// url sistema 18 (General Anaya)
				url_sistema_18: "api/sistema18",
				// url sistema 19 (Fonda Argentina)
				url_sistema_19: "api/sistema19",
				// url sistema 21 (Eje 3)
				url_sistema_21: "api/sistema21",
				// url sistema 22 (Dakota)
				url_sistema_22: "api/sistema22",
				// url sistema 43 (Las Flores)
				url_sistema_43: "api/sistema43",
				// url sistema 44 (Las Flores)
				url_sistema_44: "api/sistema44",
			}
		},
		watch:{
			//  observer que realiza una función cuando se modifica la placa
			'placa':function(newVal,oldVal){
				// lanza función de getHistorico
				this.getHistorico(this.placa);
			}
		},
		// componentes a cargar
		components:{
			DeteccionesComponent,
			HistorialComponent,
			ExcesoComponent,
			RoboComponent
		},
		methods:{
			// Función que busca la placa en todos los sistemas.
			'getHistorico':function(placa){
				// lanzamos la vista de loading
				this.load = true;
				// llamamos la función setSistema0
				const sistema_0 = this.setSistema0(placa);
				// llamamos la función setSistema-1
				const sistema_menos_1 = this.setSistemaMenos1(placa);
				// llamamos la función setSistema11
				const sistema_11 = this.setSistema11(placa);
				// llamamos la función setSistema13
				const sistema_13 = this.setSistema13(placa);
				// llamamos la función setSistema14
				const sistema_14 = this.setSistema14(placa);
				// llamamos la función setSistema15
				const sistema_15 = this.setSistema15(placa);
				// llamamos la función setSistema16
				const sistema_16 = this.setSistema16(placa);
				// llamamos la función setSistema17
				const sistema_17 = this.setSistema17(placa);
				// llamamos la función setSistema18
				const sistema_18 = this.setSistema18(placa);
				// llamamos la función setSistema19
				const sistema_19 = this.setSistema19(placa);
				// llamamos la función setSistema21
				const sistema_21 = this.setSistema21(placa);
				// llamamos la función setSistema22
				const sistema_22 = this.setSistema22(placa);
				// llamamos la función setSistema43
				const sistema_43 = this.setSistema43(placa);
				// llamamos la función setSistema44
				const sistema_44 = this.setSistema44(placa);
				// Realizar una promesa con todos los axios del sistemas
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
						// limpiamos el objeto historial
						this.historial = {};
						// agregamos el resultado de los sistemas al objeto historial
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
						// quitamos el loading spinner de la carga del sistema
						this.load = false;
						// llamamos a la función sistema info
						this.setSistemasInfo();
				})).catch(errors=>{
						// realizamos un console log del error dado
					console.log(errors);
					// quitamos el loading spinner de la carga del sistema.
					this.load =false;
				})


			},
			// funciones para cargar el axios de los sistemas.
			'setSistema0':function (placa) {
				return axios.post(this.url_sistema_0,{placa:placa.placa,servicio:placa.tipo_servicio});
			},
			'setSistemaMenos1':function (placa) {
				return axios.post(this.url_sistema_menos_1,{placa:placa.placa,servicio:placa.tipo_servicio});
			},
			'setSistema11':function (placa) {
				return axios.post(this.url_sistema_11,{placa:placa.placa,servicio:placa.tipo_servicio});
			},
			'setSistema13':function (placa) {
				return axios.post(this.url_sistema_13,{placa:placa.placa,servicio:placa.tipo_servicio});
			},
			'setSistema14':function (placa) {
				return axios.post(this.url_sistema_14,{placa:placa.placa,servicio:placa.tipo_servicio});
			},
			'setSistema15':function (placa) {
				return axios.post(this.url_sistema_15,{placa:placa.placa,servicio:placa.tipo_servicio});
			},
			'setSistema16':function (placa) {
				return axios.post(this.url_sistema_16,{placa:placa.placa,servicio:placa.tipo_servicio});
			},
			'setSistema17':function (placa) {
				return axios.post(this.url_sistema_17,{placa:placa.placa,servicio:placa.tipo_servicio});
			},
			'setSistema18':function (placa) {
				return axios.post(this.url_sistema_18,{placa:placa.placa,servicio:placa.tipo_servicio});
			},
			'setSistema19':function (placa) {
				return axios.post(this.url_sistema_19,{placa:placa.placa,servicio:placa.tipo_servicio});
			},
			'setSistema21':function (placa) {
				return axios.post(this.url_sistema_21,{placa:placa.placa,servicio:placa.tipo_servicio});
			},
			'setSistema22':function (placa) {
				return axios.post(this.url_sistema_22,{placa:placa.placa,servicio:placa.tipo_servicio});
			},
			'setSistema43':function (placa) {
				return axios.post(this.url_sistema_43,{placa:placa.placa,servicio:placa.tipo_servicio});
			},
			'setSistema44':function (placa) {
				return axios.post(this.url_sistema_44,{placa:placa.placa,servicio:placa.tipo_servicio});
			},
			// Función que manda la información del velocidad promedio, exceso de velocidad y detecciones
			'setSistemasInfo': function(){
				// array vacio de velocidades
				var velocidades =[];
				// variable para exceso de velocidad (contador)
				var exceso_velocidad = 0;
				// si el sistema 1 tiene registros de esa placa
				if(this.historial.sistema_1.result.length > 0){
					// recorremos el array
					for (var i = this.historial.sistema_1.result.length - 1; i >= 0; i--) {
						// si la velocidad del registro es mayor a 81
						if (parseFloat(this.historial.sistema_1.result[i].velocidad) >=81.00) {
							// agregamos un contador a exceso de velocidad
							exceso_velocidad += 1;
						}
						// metemos el registro al array de velocidades
						velocidades.push(parseFloat(this.historial.sistema_1.result[i].velocidad));
					}
				}
				// Si el sistema 0 tiene registros de esa placa 
				if(this.historial.sistema_0.result.length > 0){
					// recorremos el array
					for (var i = this.historial.sistema_0.result.length - 1; i >= 0; i--) {
						// si la velocidad del registro es mayor a 81
						if (parseFloat(this.historial.sistema_0.result[i].velocidad) >= 81.00) {
							// agregamos un contador a exceso de velocidad
							exceso_velocidad +=1;
						}
						// metemos el registro al array de velocidades.
						velocidades.push(parseFloat(this.historial.sistema_0.result[i].velocidad));
					}
				}
				// si el sistema 11 tiene registros de esa placa
				if(this.historial.sistema_11.result.length > 0){
					// recorremos el arreglo
					for (var i = this.historial.sistema_11.result.length - 1; i >= 0; i--) {
						// si la velocidad del registro es mayor a 81
						if (parseFloat(this.historial.sistema_11.result[i].velocidad) >= 81.00) {
							// agregamos un contador al exceso de velocidad
							exceso_velocidad +=1;
						}
						// console.log(this.historial.sistema_11.result[i]);
						// metemos el regitro al array de velocidades.
						velocidades.push(parseFloat(this.historial.sistema_11.result[i].velocidad));
					}
				}
				// si el sistema 13 tiene registros de esa placa
				if(this.historial.sistema_13.result.length > 0){
					// recorremos el arreglo
					for (var i = this.historial.sistema_13.result.length - 1; i >= 0; i--) {
						// si la velocidad del registro es mayor a 81
						if (parseFloat(this.historial.sistema_13.result[i].velocidad) >= 81.00) {
							// agregamos un contador al exceso de velocidad
							exceso_velocidad +=1;
						}
						// console.log(this.historial.sistema_13.result[i]);
						// metemos el registro al array de velocidades.
						velocidades.push(parseFloat(this.historial.sistema_13.result[i].velocidad));
					}
				}
				// si el sistema 14 tiene registros de esa placa
				if(this.historial.sistema_14.result.length > 0){
					// recorremos el arreglo
					for (var i = this.historial.sistema_14.result.length - 1; i >= 0; i--) {
						// si el registro tiene una velocidad mayor de 81
						if (parseFloat(this.historial.sistema_14.result[i].velocidad) >= 81.00) {
							// Agregamos un contador al exceso de velocidad
							exceso_velocidad +=1;
						}
						// console.log(this.historial.sistema_14.result[i]);
						// Metemos el registro al array de velocidades
						velocidades.push(parseFloat(this.historial.sistema_14.result[i].velocidad));
					}
				}
				// Si el sistema 15 tiene registros de esa placa
				if(this.historial.sistema_15.result.length > 0){
					// recorremos el arreglo
					for (var i = this.historial.sistema_15.result.length - 1; i >= 0; i--) {
						// Si el registro tiene una velocidad mayor a 81
						if (parseFloat(this.historial.sistema_15.result[i].velocidad) >= 81.00) {
							// agregamos un contador al exceso de velocidad.
							exceso_velocidad +=1;
						}
						// console.log(this.historial.sistema_15.result[i]);
						// Metemos el registro al array de velocidades
						velocidades.push(parseFloat(this.historial.sistema_15.result[i].velocidad));
					}
				}
				// Si el sistema 16 tiene registros de esa placa
				if(this.historial.sistema_16.result.length > 0){
					// recorremos el arreglo
					for (var i = this.historial.sistema_16.result.length - 1; i >= 0; i--) {
						// Si el registro tiene una velocidad mayor a 81
						if (parseFloat(this.historial.sistema_16.result[i].velocidad) >= 81.00) {
							// agregamos un contador al exceso de velocidad
							exceso_velocidad +=1;
						}
						// console.log(this.historial.sistema_16.result[i]);
						// Metemos el registro al array de velocidades
						velocidades.push(parseFloat(this.historial.sistema_16.result[i].velocidad));
					}
				}
				// Si el sistema 17 tiene registros de esa placa
				if(this.historial.sistema_17.result.length > 0){
					// recorremos el arreglo
					for (var i = this.historial.sistema_17.result.length - 1; i >= 0; i--) {
						// Si el registro tiene una velocidad mayor a 81
						if (parseFloat(this.historial.sistema_17.result[i].velocidad) >= 81.00) {
							// agregamos un contador al exceso de velocidad
							exceso_velocidad +=1;
						}
						// console.log(this.historial.sistema_17.result[i]);
						// Metemos el registro al array de velocidades
						velocidades.push(parseFloat(this.historial.sistema_17.result[i].velocidad));
					}
				}
				// Si el sistema 18 tiene registros de esa placa
				if(this.historial.sistema_18.result.length > 0){
					// recorremos el arreglo
					for (var i = this.historial.sistema_18.result.length - 1; i >= 0; i--) {
						// Si el registro tiene una velocidad mayor a 81
						if (parseFloat(this.historial.sistema_18.result[i].velocidad) >= 81.00) {
							// agregamos un contador al exceso de velocidad
							exceso_velocidad +=1;
						}
						// console.log(this.historial.sistema_18.result[i]);
						// Metemos el registro al array de velocidades
						velocidades.push(parseFloat(this.historial.sistema_18.result[i].velocidad));
					}
				}
				// Si el sistema 19 tiene registros de esa placa
				if(this.historial.sistema_19.result.length > 0){
					// recorremos el arreglo
					for (var i = this.historial.sistema_19.result.length - 1; i >= 0; i--) {
						// si el registro tiene una velocidad mayor a 81
						if (parseFloat(this.historial.sistema_19.result[i].velocidad) >= 81.00) {
							// Agregamos un contador al exceso de velocidad
							exceso_velocidad +=1;
						}
						// console.log(this.historial.sistema_19.result[i]);
						// metemos el registro al array de velocidades
						velocidades.push(parseFloat(this.historial.sistema_19.result[i].velocidad));
					}
				}
				// Si el sistema 21 tiene registros de esa placa
				if(this.historial.sistema_21.result.length > 0){
					// recorremos el arreglo
					for (var i = this.historial.sistema_21.result.length - 1; i >= 0; i--) {
						// Si el registro tiene una velocidad mayor a 81
						if (parseFloat(this.historial.sistema_21.result[i].velocidad) >= 81.00) {
							// Agregamos un contador al exceso de velocidad
							exceso_velocidad +=1;
						}
						// console.log(this.historial.sistema_21.result[i]);
						// metemos el registro al array de velocidades
						velocidades.push(parseFloat(this.historial.sistema_21.result[i].velocidad));
					}
				}
				// Si el sistema 22 tiene registros de esa placa
				if(this.historial.sistema_22.result.length > 0){
					// recorremos el array
					for (var i = this.historial.sistema_22.result.length - 1; i >= 0; i--) {
						// si el registro tiene una velocidad mayor a 81
						if (parseFloat(this.historial.sistema_22.result[i].velocidad) >= 81.00) {
							// agregamos un contador al exceso de velocidad
							exceso_velocidad +=1;
						}
						// console.log(this.historial.sistema_22.result[i]);
						// Metemos el registro al array de velocidades
						velocidades.push(parseFloat(this.historial.sistema_22.result[i].velocidad));
					}
				}
				// Si el sistema 43 tiene registros de esa placa
				if(this.historial.sistema_43.result.length > 0){
					// recorremos el array
					for (var i = this.historial.sistema_43.result.length - 1; i >= 0; i--) {
						// si el registro tiene una velocidad mayor a 81
						if (parseFloat(this.historial.sistema_43.result[i].velocidad) >= 81.00) {
							// agregamos un contador al exceso de velocidad
							exceso_velocidad +=1;
						}
						// console.log(this.historial.sistema_43.result[i]);
						// Metemos el registro al array de velocidades.
						velocidades.push(parseFloat(this.historial.sistema_43.result[i].velocidad));
					}
				}
				// Si el sistema 44 tiene registros de esa placa
				if(this.historial.sistema_44.result.length > 0){
					// recorremos el array
					for (var i = this.historial.sistema_44.result.length - 1; i >= 0; i--) {
						// Si el registro tiene una velocidad mayor a 81
						if (parseFloat(this.historial.sistema_44.result[i].velocidad) >= 81.00) {
							// agregamos un contador al exceso de velocidad
							exceso_velocidad +=1;
						}
						// console.log(this.historial.sistema_44.result[i]);
						// Metemos el registro al array de velocidades.
						velocidades.push(parseFloat(this.historial.sistema_44.result[i].velocidad));
					}
				}
				// variable inicial de promedio de velocidad
				var velocidad_final = 0;
				// contador de detecciones totales
				var detecciones = 0
				// recorremos el array de velocidades
				velocidades.forEach(res=>{
					// le sumamos la velocidad a velocidad promedio
					velocidad_final += res;
				});
				// Dividimos el total de velocidad final entre la longitud del array de velocidades
				velocidad_final = velocidad_final/velocidades.length;
				// contamos la longitud del array de velocidades.
				detecciones = velocidades.length;
				// emitimos el evento a root para que el menucomponent pueda capturarlo
				this.$root.$emit('info-sistemas',velocidad_final,exceso_velocidad, detecciones);
			}
		},
		mounted(){
			// Escucha el evento setTab del MenuComponent
			this.$root.$on('set-tab',(tab)=>{
				// activa la pestaña enviada por el menucomponent
				if (this.tab != tab) {
					this.tab = "";
					var self = this;
					setTimeout(function(){
						self.tab = tab;
					},300);
				}
			});
			// Escucha el evento SetPlacInfo del menucomponent
			this.$root.$on('set-placa-info',(placa)=>{
				// Igualamos la placa del repuve en el menu component a la data placa del componente principal
				this.placa = {'placa':placa.placa,'tipo_servicio':placa.tipo_servicio_id};
				// Cambiamos a la pantalla de velocidad.
				// Para que funcione el zoom.
				this.tab = "velocidad";
			});
			// Escucha el evento SetRepuveInfo del menu componente
			this.$root.$on('set-repuve-info',(res)=>{
				// Si el objeto dado res tiene afirmativo el metodo robado
				if(res.robado){
					// Igualamos la respuesta dada por el evento a la data robo del componente principal
					this.robo = res.robado;
				}
				// De lo contrario
				else{
					// Igualamos el data robo como un objeto vacio.
					this.robo = {};
				}
			});
		}

	} 
</script>
