require('./bootstrap');

window.Vue = require('vue');

import App from './App.vue';
import Timer from './components/Timer.vue';
import Settings from './components/Settings.vue';

Vue.component('timer', Timer);
Vue.component('settings', Settings);

const app = new Vue({
    el: '#app',
    template: '<App/>',
    components: { App }
});
