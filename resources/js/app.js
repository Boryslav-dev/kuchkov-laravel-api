require('./bootstrap');
require('../css/style.css');
require('vue-moment');
require('vue-router');
window.Vue = require('vue');

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('main-component', require('./components/MainComponent.vue').default);
Vue.use(require('vue-moment'));
Vue.use(require('vue-router'))

const app = new Vue({
    el: '#app',
});
