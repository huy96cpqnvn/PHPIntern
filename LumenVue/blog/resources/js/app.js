import Vue from 'vue';
import VueRouter from 'vue-router';
import App from "./App";
import '../css/bootstrap.min.css';
import '../css/simple-sidebar.css';
import routes from "./routes";

Vue.use(VueRouter);

const router = new VueRouter({routes});

new Vue({
    el: "#app",
    render: h => h(App),
    router,
    components: {
        'blog': App
    }
});
//
// $("#menu-toggle").click(function(e) {
//     e.preventDefault();
//     $("#wrapper").toggleClass("toggled");
// });
