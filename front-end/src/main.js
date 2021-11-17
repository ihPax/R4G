import Vue from 'vue';
import App from './App.vue';
import VCalendar from 'v-calendar';

import './style.css';

import VueRouter from 'vue-router';
import Home from "./components/Home.vue";
import Calendar from "./components/Calendar.vue";

Vue.use(VueRouter);

Vue.use(VCalendar, {
  componentPrefix: 'v',  // Use <vc-calendar /> instead of <v-calendar />
                // ...other defaults
});

const routes = [
  {
    path: '/home',
    name: "Home",
    component: Home,
  },
  {
    path: '/calendar',
    name: "Calendar",
    component: Calendar,
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
