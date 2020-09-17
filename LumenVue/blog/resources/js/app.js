import Vue from 'vue';
import VueRouter from 'vue-router';
import App from "./App";
import '../css/bootstrap.min.css';
import '../css/simple-sidebar.css';
import store from "./store/store";
import routes from "./routes";
import Vuex from 'vuex';
import swal from 'vue-swal';

Vue.use(VueRouter);
Vue.use(Vuex)
Vue.use(swal)

const router = new VueRouter({routes});

new Vue({
    el: "#app",
    render: h => h(App),
    router,
    store,
    components: {
        'blog': App
    }
});
//
// $("#menu-toggle").click(function(e) {
//     e.preventDefault();
//     $("#wrapper").toggleClass("toggled");
// });
