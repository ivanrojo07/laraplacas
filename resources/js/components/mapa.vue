<template>

    <div id="map" style="" class="divMapa">

    </div>

</template>
<script>

    export default {
        data() {
          return {
              map:"",
              marker:""
          }
        },
        mounted() {
            console.log('Component mounted.')
            this.map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 19.429999999, lng: -99.1521650728},
                zoom: 13,
            });

        }
    }
</script>
