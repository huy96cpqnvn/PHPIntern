/////Cách 2: Ngắn gọn hơn
import Vue from 'vue';
import VueRouter from 'vue-router';
import ShowView from "./components/ShowView";
Vue.use(VueRouter);

const router = new VueRouter({
    mode  : 'history',
    base  : '/',
    routes: [
        {
            path     : '/',
            component: ShowView
        },
    ]
});
export default router
