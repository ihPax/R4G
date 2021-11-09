import Vue from 'vue';
import App from './App.vue';

import './style.css';

import VueRouter from 'vue-router';

Vue.use(VueRouter);

const routes = [];

const router = new VueRouter ({
  mode: "history",
  routes
});

Vue.config.productionTip = false

new Vue({
  render: h => h(App),
  router,
}).$mount('#app')
