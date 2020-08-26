////Cách 1 theo routes.js
import App from "./components/App";
import Vue from 'vue'
import Vuex from 'vuex'
import VueRouter from 'vue-router'

import routes from "./routes"

Vue.use(Vuex)
Vue.use(VueRouter)
const router = new VueRouter({routes});

require('./bootstrap');

window.Vue = require('vue');

new Vue({
    router,
    el: '#app',
    components: {
        'blog': App ////Tên components ???
    }
})
