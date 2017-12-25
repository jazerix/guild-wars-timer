require('./bootstrap');

window.Vue = require('vue');

import App from './App.vue';
import Timer from './components/Timer.vue';

Vue.component('timer', Timer);

const app = new Vue({
    el: '#app',
    template: '<App/>',
    components: { App }
});
