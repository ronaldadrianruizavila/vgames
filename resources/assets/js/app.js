require('./bootstrap');

window.Vue = require('vue');

Vue.component('sesions-sala', require('./components/SesionsComponent.vue').default);

const app = new Vue({
    el: '#app'
});
