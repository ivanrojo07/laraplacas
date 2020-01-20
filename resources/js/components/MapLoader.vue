<template>
	<div>
		<div id="map" class="w-100"></div>
		<template v-if="!!this.google && !!this.map">
			<map-provider
				:google="google"
				:map="map"
			>
				<slot/>
			</map-provider>
		</template>
	</div>
</template>
<script>
	import GoogleMapsApiLoader from 'google-maps-api-loader';
	import MapProvider from './MapProvider';

	export default{
		props:{
			mapConfig: Object,
			apiKey:String,
			markers:Array
		},
		components:{
			MapProvider
		},
		data(){
			return{
				google:null,
				map:null,
				google_puntos:[],
			}
		},
		mounted(){
			console.log('MapLoader mounted');
			GoogleMapsApiLoader({
				apiKey:this.apiKey
			}).then((google)=>{
				this.google = google;
				this.initializeMap();
			});
		},
		methods:{
			initializeMap(){
				const mapContainer = this.$el.querySelector("#map");
				const {Map} = this.google.maps;
				this.map = new Map(mapContainer, this.mapConfig);
				

			},
			setGooglePuntos(res){
				this.google_puntos.forEach(punto=>{
					punto.setMap(null);
				})
				this.google_puntos = [];
				console.log('result ',res);
				res.forEach(point=>{
					this.createGooglePoint(point);
				});

			},
			pinSymbol(color,punto){
				var ruta = "";
			  	if (punto) {
			    	ruta = 'M 0,0 C -2,-20 -10,-22 -10,-30 A 10,10 0 1,1 10,-30 C 10,-22 2,-20 0,0 z M -2,-30 a 2,2 0 1,1 4,0 2,2 0 1,1 -4,0';
			  	}
			  	else{
					ruta = 'M 0,0 C -2,-20 -10,-22 -10,-30 A 10,10 0 1,1 10,-30 C 10,-22 2,-20 0,0 z'

			  	}
			    return {
			        path: ruta,
			        fillColor: color,
			        fillOpacity: 1,
			        strokeColor: '#000',
			        strokeWeight: 3,
			        scale: 1.5,
			   	};
			},
			createGooglePoint(point){
				const {Marker} = this.google.maps;
				var marker = new Marker({
					position: {lat:parseFloat(point.camaras.lat),lng:parseFloat(point.camaras.lng)},
					title: point.camaras.referencia
				});
				marker.setMap(this.map);
				var punto = false;
				if (point.multas >0) {
					punto = true
				}

				if (point.detecciones < 5) {
					marker.setIcon(this.pinSymbol('rgb(255,255,0)',punto));
				}
				else if(point.detecciones < 10){
					marker.setIcon(this.pinSymbol('rgb(255,153,0)',punto));
				}
				else{
					marker.setIcon(this.pinSymbol('rgb(255,0,0)',punto));
				}
				this.map.setZoom(12);
				this.map.setCenter(marker.position);
				this.google.maps.event.addListener(marker,'click',function(){
					var infoWindow = new google.maps.InfoWindow();
					// infoWindow.setContent(" Multas: " + fines + "<br>  Detecciones: " +detecciones + "<br>  Ubicación: " + addr);
					infoWindow.setContent(`Multas: ${point.multas}<br>Detecciones: ${point.detecciones}<br>  Ubicación: ${point.camaras.ubicacion} <br>`);
    				infoWindow.open(map,marker);
				})
				this.google_puntos.push(marker);
			}
		},
		watch:{
			'markers':function(newVal,oldVal){
				this.setGooglePuntos(newVal);
			}
		}
	}
</script>

<style scoped>
	#map{
		min-height: 80vh; 
		max-height: 80vh;
	}
</style>