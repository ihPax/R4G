import Vue from 'vue';
import App from './App.vue';

import './style.css';

import VueRouter from 'vue-router';
import Home from "./components/Home.vue"

Vue.use(VueRouter);

const routes = [
  {
    path: '/home',
    name: "Home",
    component: Home,
  },
  {
    path: '',
    name: "default_route",
    redirect: '/home',
  }
];

const router = new VueRouter ({
  mode: "history",
  routes
});

Vue.config.productionTip = false

new Vue({
  render: h => h(App),
  router,
}).$mount('#app')
