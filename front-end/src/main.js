import './style.css';
import Vue from 'vue';
import App from './App.vue';
import VCalendar from 'v-calendar';
import axios from 'axios';
import router from './router.js'; //importa la classe con le routes dal file router.js
import VueSimpleAlert from "vue-simple-alert";
import VueTailwind from 'vue-tailwind';
import vueTailwindSetting from './vueTailwindSettings.js'; //importo i settings da un altro file perché qui occupavano troppo spazio

Vue.prototype.$axios = axios;
axios.defaults.baseURL = "http://localhost:8000/"
//axios.defaults.baseURL = "http://172.16.21.36:8000/"  // <-- mettere URL su rete locale per testare progetto per es. su smartphone
// php artisan serve --host=172.16.21.36 --port=8000   <-- per far partire il server su host e porta personalizzati

Vue.use(VCalendar, {
  componentPrefix: 'v',  // Use <vc-calendar /> instead of <v-calendar />
});
Vue.use(VueSimpleAlert);
Vue.use(VueTailwind, vueTailwindSetting);

Vue.config.productionTip = false;

new Vue({
  render: h => h(App),
  router,
}).$mount('#app');

axios.interceptors.response.use(
  response => {
    return response;
  }, 
  error => {
    if (error.response.status === 401) {
      router.push({ name: "login" })
    }
    return error;
});
