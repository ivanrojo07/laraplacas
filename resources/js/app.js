require('./bootstrap');

window.Vue = require('vue');

/*Vue.component('mapa-vias', require('./components/mapa').default);*/
Vue.component('menu-component',require('./components/MenuComponent').default);
Vue.component('mi-mapa',require('./components/MiMapaComponent').default);
Vue.component('map-loader',require('./components/MapLoader').default);
Vue.component('map-provider',require('./components/MapProvider').default);
Vue.component('tabcontent-component',require('./components/TabContentComponent').default);
Vue.component('historial-component',require('./components/HistorialComponent').default);
Vue.component('exceso-component',require('./components/ExcesoComponent').default);
Vue.component('robo-component',require('./components/RoboComponent').default);
Vue.component('detecciones-component',require('./components/DeteccionesComponent').default);
Vue.component('tablaplacas-component',require('./components/TablaPlacasComponent').default);
Vue.component('reconocimiento-component',require('./components/ReconocimientoComponent').default);
Vue.component('imgvelplaca-component',require('./components/ImgVelPlacaComponent').default);
Vue.component('infoplaca-component',require('./components/InfoPlacaComponent').default);
Vue.component('map-loader-registro-component',require('./components/MapLoaderRegistroComponent').default);
Vue.component('map-provider-registro-component',require('./components/MapProviderRegistroComponent').default);
Vue.component('map-registro-component',require('./components/MapaRegistroComponent').default);


const app = new Vue({
    el: '#app',
});
