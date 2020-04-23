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
			markers:Array,
		},
		components:{
			MapProvider
		},
		data(){
			return{
				google:null,
				map:null,
				google_puntos:[],
				infoWindow:null,
				bounds: null
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
				this.bounds = null;
				this.bounds = new google.maps.LatLngBounds();
				this.google_puntos.forEach(punto=>{
					punto.setMap(null);
				})
				this.google_puntos = [];
				res.forEach(point=>{
					this.createGooglePoint(point);
				});
				this.map.fitBounds(this.bounds)

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
				this.bounds.extend({lat:parseFloat(point.camaras.lat),lng:parseFloat(point.camaras.lng)});
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
				marker.infowindow = new google.maps.InfoWindow({content:`
						<div style="padding: 12px !important;">
							Multas: ${point.multas}<br>Detecciones: ${point.detecciones}<br>  Ubicación: ${point.camaras.ubicacion} <br>
						</div>`});
				var self = this;
				this.google.maps.event.addListener(marker,'click',function(){
					for (var i = self.google_puntos.length - 1; i >= 0; i--) {
						self.google_puntos[i].infowindow.close();
					}
				  	marker.infowindow.open(map, marker);
					
				});

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
	
</style>