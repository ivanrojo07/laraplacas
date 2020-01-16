<template>
	<div>
		<map-loader
			:map-config="mapConfig"
			apiKey="AIzaSyD_Ev0haW8nP_ToX5KahzvGPWrqT02PWRI"
		>
			<template v-for="marker in markers">
				<child-marker :position="marker"/>
			</template>		
		</map-loader>
	</div>
</template>
<script>
 	import MapLoader from "./MapLoader.vue";
 	import ChildMarker from "./ChildMarker";
	export	default {
		props:{
			markers:Array
		},
		data(){
			return{
				mapConfig:{
					zoom:5,
					// Mapa México
					center: {lat: 19.4416816, lng: -99.2037946},
					styles:[
			            {
			              featureType: 'administrative',
			              elementType: 'geometry',
			              stylers: [{visibility: "off"},{"weight": 1}]
			            },
			            {
			              featureType: 'administrative',
			              elementType: 'geometry.fill',
			              stylers: [{visibility: "on"}]
			            },
			            {
			              featureType: 'administrative',
			              elementType: 'geometry.stroke',
			              stylers: [{visibility: "off"}]
			            },
			            {
			              featureType: 'administrative',
			              elementType: 'labels',
			              stylers: [{color: '#000000'},{visibility: "off"}]
			            },
			            {
			              featureType: 'administrative.country',
			              elementType: 'geometry',
			              stylers: [{color: '#a6a6a6'},{visibility: "on"},{"weight": 1.5}]
			            },
			            {
			              featureType: 'administrative.country',
			              elementType: 'labels',
			              stylers: [{visibility: "off"}]
			            },
			            {
			              featureType: 'administrative.country',
			              elementType: 'labels.icon',
			              stylers: [{visibility: "off"}]
			            },
			            {
			              featureType: 'administrative.land_parcel',
			              elementType: 'geometry',
			              stylers: [{visibility: "on"}]
			            },
			            {
			              featureType: 'administrative.land_parcel',
			              elementType: 'labels',
			              stylers: [{visibility: "on"}]
			            },
			            {
			              featureType: 'administrative.land_parcel',
			              elementType: 'labels.icon',
			              stylers: [{visibility: "off"}]
			            },
			            {
			              featureType: 'administrative.locality',
			              elementType: 'geometry',
			              stylers: [{visibility: "on"}]
			            },
			            {
			              featureType: 'administrative.locality',
			              elementType: 'labels',
			              stylers: [{color: '#696969'},{visibility: "simplified"}]
			            },
			            {
			              featureType: 'administrative.locality',
			              elementType: 'labels.icon',
			              stylers: [{visibility: "off"}]
			            },
			            {
			              featureType: 'administrative.neighborhood',
			              elementType: 'geometry',
			              stylers: [{visibility: "on"}]
			            },
			            {
			              featureType: 'administrative.neighborhood',
			              elementType: 'labels',
			              stylers: [{color: '#696969'},{visibility: "simplified"}]
			            },
			            {
			              featureType: 'administrative.neighborhood',
			              elementType: 'labels.icon',
			              stylers: [{visibility: "off"}]
			            },
			            {
			              featureType: 'administrative.province',
			              elementType: 'geometry',
			              stylers: [{visibility: "on"},{"weight": 1.5}]
			            },
			            {
			              featureType: 'administrative.province',
			              elementType: 'labels',
			              stylers: [{visibility: "off"}]
			            },
			            {
			              featureType: 'administrative.province',
			              elementType: 'labels.icon',
			              stylers: [{visibility: "off"}]
			            },
			            {
			              featureType: "landscape",
			              stylers: [{color: '#D5D8DC'}]
			            },
			            {
			              featureType: 'landscape',
			              elementType: 'geometry',
			              stylers: [{color: '#D5D8DC'}]
			            },
			            {
			              featureType: 'landscape',
			              elementType: 'labels',
			              stylers: [{visibility: "off"}]
			            },
			            {
			              featureType: 'landscape',
			              elementType: 'labels.icon',
			              stylers: [{visibility: "off"}]
			            },
			            {
			              featureType: 'landscape.man_made',
			              elementType: 'geometry',
			              stylers: [{color: '#526081'},{visibility: "off"}]
			            },
			            {
			              featureType: 'landscape.natural.landcover',
			              elementType: 'geometry',
			              stylers: [{visibility: "off"}]
			            },
			            {
			              featureType: 'landscape.natural.landcover',
			              elementType: 'labels.icon',
			              stylers: [{visibility: "off"}]
			            },
			            {
			              featureType: 'landscape.natural.terrain',
			              elementType: 'geometry',
			              stylers: [{visibility: "off"}]
			            },
			            {
			              featureType: 'landscape.natural.terrain',
			              elementType: 'labels',
			              stylers: [{visibility: "off"}]
			            },
			            {
			              featureType: 'landscape.natural.terrain',
			              elementType: 'labels.icon',
			              stylers: [{visibility: "off"}]
			            },
			            {
			              featureType: 'poi',
			              elementType: 'geometry',
			              stylers: [{visibility: "off"}]
			            },
			            {
			              featureType: 'poi',
			              elementType: 'labels',
			              stylers: [{visibility: "off"}]
			            },
			            {
			              featureType: 'poi',
			              elementType: 'labels.icon',
			              stylers: [{visibility: "off"}]
			            },
			            {
			              featureType: 'road',
			              elementType: 'geometry',
			              stylers: [{visibility: "simplified"}]
			            },
			            {
			              featureType: 'road',
			              elementType: 'labels',
			              stylers: [{visibility: "simplified"}]
			            },
			            {
			              featureType: 'road',
			              elementType: 'labels.icon',
			              stylers: [{visibility: "off"}]
			            },
			            {
			              featureType: 'transit',
			              elementType: 'geometry',
			              stylers: [{visibility: "off"}]
			            },
			            {
			              featureType: 'transit',
			              elementType: 'labels',
			              stylers: [{visibility: "off"}]
			            },
			            {
			              featureType: 'transit',
			              elementType: 'labels.icon',
			              stylers: [{visibility: "off"}]
			            },
			            {
			              featureType: 'water',
			              elementType: 'geometry',
			              stylers: [{color: '#F2F4F4'},{visibility: "on"}]
			            },
			            {
			              featureType: 'water',
			              elementType: 'labels',
			              stylers: [{visibility: "off"}]
			            },
		          	]
				}
			}
		},
		components: {
			MapLoader,
			ChildMarker
		},
		methods:{

		},
		mounted(){
			console.log('MiMapaComponent mounted');
		}
	}
</script>