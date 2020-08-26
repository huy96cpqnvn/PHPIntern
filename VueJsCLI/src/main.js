import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router'

import routes from './routes';


Vue.use(VueRouter)

const router = new VueRouter({routes});

Vue.config.productionTip = false;

new Vue({
  el: '#app',
  render: h => h(App),
  router
}).$mount('#app');


// Mỗi thành phần trong Web tương ứng mỗi Component -> Tương ứng với 1 file *.vue
