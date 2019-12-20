require('./bootstrap');

window.Vue = require('vue');

Vue.component('mapa-vias', require('./components/mapa').default);
const app = new Vue({
    el: '#app',
});
