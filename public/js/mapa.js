function initMap() {
    //Opciones del mapa
    var OpcionesMapa = {
        center: new google.maps.LatLng(38.3489719, -0.4780289000000266),
        mapTypeId: google.maps.MapTypeId.SATELLITE, //ROADMAP  SATELLITE HYBRID TERRAIN
        zoom: 16
    };

    var miMapa;
    //constructor
    miMapa = new google.maps.Map(document.getElementById('mapa'), OpcionesMapa);

    //Añadimos el marcador
    var Marcador = new google.maps.Marker({
        position: new google.maps.LatLng(38.3489719, -0.4780289000000266),
        map: miMapa,
        title:"Santa Barbara"
    });
}
