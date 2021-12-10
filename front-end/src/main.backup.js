import Vue from 'vue';
import App from './App.vue';
import VCalendar from 'v-calendar';

import './style.css';

import VueRouter from 'vue-router';
import Home from "./components/Home.vue";
import CalendarDesktop from "./components/CalendarDesktop.vue";
import Landing from "./components/Landing.vue";

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
    path: '/landing',
    name: "Landing",
    component: Landing,
  },
  {
    path: '/home',
    name: 'dashboard',
    component: Home,
  },
  {
    path: '/mybins',
    name: 'myBins',
    component: Home,
  },
  {
    path: '/calendar',
    name: 'calendar',
    component: CalendarDesktop,
  },
  {
    path: '/presentation',
    name: 'presentation',
    component: Home,
  },
  {
    path: '/account',
    name: 'account',
    component: Home,
  },
  {
    path: '/faq',
    name: 'faq',
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
