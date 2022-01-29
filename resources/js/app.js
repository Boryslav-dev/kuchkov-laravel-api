require('./bootstrap');
require('../css/style.css');

import VueRouter from 'vue-router'

import MainComponent from "./components/MainComponent.vue";
import Temperature from "./components/Cards/Temperature.vue";
import Humidity from "./components/Cards/Humidity.vue";
import FireSafety from "./components/Cards/FireSafety.vue";
import System from "./components/Cards/System.vue";

window.Vue = require('vue');

Vue.use(require('vue-moment'));
Vue.use(VueRouter)

const router = new VueRouter({
    routes: [
        { path: '/home', component: MainComponent},
        { path: '/temperature', component: Temperature},
        { path: '/humidity', component: Humidity},
        { path: '/security', component: FireSafety},
        { path: '/system', component: System},
    ]
})

const app = new Vue({
    el: '#app',
    router
});
