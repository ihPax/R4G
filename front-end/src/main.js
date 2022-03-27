import './style.css';
import Vue from 'vue';
import App from './App.vue';
import VCalendar from 'v-calendar';
import axios from 'axios';
import router from './router.js'; //importa la classe con le routes dal file router.js
import VueSimpleAlert from "vue-simple-alert";
import VueTailwind from 'vue-tailwind';
import vueTailwindSettings from './vueTailwindSettings.js'; //importo i settings da un altro file perché qui occupavano troppo spazio

Vue.prototype.$axios = axios;
axios.defaults.baseURL = "http://192.168.0.5:8000" //IN LOCALE: "http://localhost:8000/"   //ONLINE: "https://r4g.herokuapp.com"
//axios.defaults.baseURL = "http://172.16.21.36:8000/"  // <-- mettere URL su rete locale per testare progetto per es. su smartphone
// php artisan serve --host=192.168.0.5 --port=8000   <-- per far partire il server su host e porta personalizzati

Vue.use(VCalendar, {
  componentPrefix: 'v',  // For example, write 'vc' if you want to use <vc-calendar /> instead of <v-calendar />
});
Vue.use(VueSimpleAlert);
Vue.use(VueTailwind, vueTailwindSettings);

Vue.config.productionTip = false;

new Vue({
  render: h => h(App),
  router,
}).$mount('#app');


/*
  Non funziona perché non si riesce a registrarsi. In teoria dovrebbe intercettare le richieste Axios e,
  nel caso in cui l'errore sia "Non autorizzato" (tranne che nella route "login"), riporta l'utente al login.
*/
// axios.interceptors.response.use(
//   response => {
//     return response;
//   }, 
//   error => {
//     if (error.response.status === 401) {
//       router.push({ name: "login" })
//     }
//     return error;
// });
