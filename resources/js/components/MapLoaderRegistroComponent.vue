<template>
    <div>
        <div id="map" class="w-100"></div>
        <template v-if="!!this.google && !!this.map">
            <map-provider-registro-component
                :google="google"
                :map="map"
            >
                <slot/>
            </map-provider-registro-component>
        </template>
    </div>
</template>
<script>
    import GoogleMapsApiLoader from 'google-maps-api-loader';
    import MapProviderRegistroComponent from "./MapProviderRegistroComponent";

    export default{
        props:{
            mapConfig: Object,
            apiKey:String
        },
        components:{
            MapProviderRegistroComponent
        },
        data(){
            return{
                google:null,
                map:null
            }
        },
        mounted(){
            console.log('mapproviderregistro-component mounted');
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

            }
        }
    }
</script>

<style scoped>
    #map{
        min-height: 260px;
        max-height: 100px;
        margin-left: 30px;
    }
</style>
