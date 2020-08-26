//////Cách 2 theo router.js
import App from "./components/App";
import Vue from 'vue'
import Vuex from 'vuex'


import router from "./router"

Vue.use(Vuex)

require('./bootstrap');

window.Vue = require('vue');

new Vue({
    router,
    el: '#app',
    components: {
        'blogtest': App ////Tên components ???
    }
})
