require('./bootstrap');

window.Vue = require('vue');

Vue.component('mapa-vias', require('./components/mapa').default);
Vue.component('menu-component',require('./components/MenuComponent').default);
Vue.component('mi-mapa',require('./components/MiMapaComponent').default);
Vue.component('map-loader',require('./components/MapLoader').default);
Vue.component('map-provider',require('./components/MapProvider').default);
Vue.component('child-marker',require('./components/ChildMarker').default);
Vue.component('tabcontent-component',require('./components/TabContentComponent').default);
Vue.component('historial-component',require('./components/HistorialComponent').default);
Vue.component('exceso-component',require('./components/ExcesoComponent').default);
Vue.component('robo-component',require('./components/RoboComponent').default);
Vue.component('detecciones-component',require('./components/DeteccionesComponent').default);


const app = new Vue({
    el: '#app',
});
