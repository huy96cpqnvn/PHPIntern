import Vue from 'vue';
import VueRouter from 'vue-router';
import App from "./App";
import '../css/bootstrap.min.css';
import '../css/simple-sidebar.css';
import store from "./store/store";
import routes from "./routes";
import Vuex from 'vuex';
import swal from 'vue-swal';
import axios from 'axios'

Vue.config.productionTip = false

Vue.use(VueRouter);
Vue.use(Vuex)
Vue.use(swal)

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
});

router.beforeEach(((to, from, next) => {
    const loggedIn = localStorage.getItem('user')

    if (to.matched.some(record => record.meta.auth) && !loggedIn) {
        next('/login')
        return
    }
    next()
}))

new Vue({
    el: "#app",

    router,
    store,
    components: {
        'blog': App
    },
    created() {
        const userInfo = localStorage.getItem('user')
        if (userInfo) {
            const userData = JSON.parse(userInfo)
            this.$store.commit('setUserData', userData)
        }
        axios.interceptors.response.use(
            response =>response,
            error => {
                if (error.response.status === 401) {
                    this.$store.dispatch('logout')
                }
                return Promise.reject(error)
            }
        )
    },
    render: h => h(App)
});

