import './style.css';
import Vue from 'vue';
import App from './App.vue';
import VCalendar from 'v-calendar';
import axios from 'axios';
import VueRouter from 'vue-router';
import Home from "@/components/Home.vue";
import Calendar from "@/components/Calendar.vue";
import Landing from "@/components/Landing.vue";
import Registration from "@/components/Registration.vue";
import Account from "@/components/Account.vue";
import Login from "@/components/Login.vue";
import Dashboard from "@/components/Dashboard.vue";
import EditAccount from "@/components/EditAccount.vue";
import PrivacyPolicy from "@/components/PrivacyPolicy.vue";
import VueTailwind from 'vue-tailwind'
import {
  //TInput,
  // TTextarea,
  // TSelect,
  // TRadio,
  // TCheckbox,
  TButton,
  // TInputGroup,
  // TCard,
  // TAlert,
  TModal,
  // TDropdown,
  // TRichSelect,
  // TPagination,
  // TTag,
  // TRadioGroup,
  // TCheckboxGroup,
  // TTable,
  // TDatepicker,
  // TToggle,
  // TDialog,
} from 'vue-tailwind/dist/components';

Vue.prototype.$axios = axios;
axios.defaults.baseURL = "http://localhost:8000"
// php artisan serve --host=192.168.0.2 --port=8000  <-- es. per far partire il server su questa porta
Vue.use(VueRouter);
Vue.use(VCalendar, {
  componentPrefix: 'v',  // Use <vc-calendar /> instead of <v-calendar />
  // ...other defaults
});

const settings = {
  // Use the following syntax
  // {component-name}: {
  //   component: {importedComponentObject},
  //   props: {
  //     {propToOverride}: {newDefaultValue}
  //     {propToOverride2}: {newDefaultValue2}
  //   }
  't-button': {
    component: TButton,
    props: {
      classes: 'button button--moema px-3 py-2 hover:bg-yellow-600 hover:text-white text-yellow-600 relative border-yellow-500 block focus:outline-none border-2 border-solid rounded-lg text-sm text-center font-semibold tracking-widest',
    }
  },
  't-button2': {
    component: TButton,
    props: {
      classes: 'button button--moema px-3 py-2 bg-yellow-600 text-white relative hover:border-yellow-500 block focus:outline-none border-2 border-solid rounded-lg text-sm text-center font-semibold tracking-widest',
    }
  },
't-modal': {
  component: TModal,
    props: {
    fixedClasses: {
      overlay: 'z-40  overflow-auto scrolling-touch left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-opacity-50',
        wrapper: 'relative mx-auto z-50 max-w-lg px-3 py-12',
          modal: 'overflow-visible relative  rounded',
            body: 'p-3',
              header: 'border-b p-3 rounded-t font-bold',
                footer: ' p-3 rounded-b',
                  close: 'flex items-center justify-center rounded-full absolute right-0 top-0 -m-3 h-8 w-8 transition duration-100 ease-in-out focus:ring-2 focus:ring-blue-500 focus:outline-none focus:ring-opacity-50'
    },
    classes: {
      overlay: 'bg-black',
        wrapper: ' ',
          modal: 'bg-white ',
            body: 'p-3',
              header: 'border-gray-100',
                footer: 'bg-gray-100',
                  close: 'bg-gray-100 text-gray-600 hover:bg-gray-200',
                    closeIcon: 'fill-current h-4 w-4',
                      overlayEnterClass: 'opacity-0',
                        overlayEnterActiveClass: 'transition ease-out duration-100',
                          overlayEnterToClass: 'opacity-100',
                            overlayLeaveClass: 'opacity-100',
                              overlayLeaveActiveClass: 'transition ease-in duration-75',
                                overlayLeaveToClass: 'opacity-0',
                                  enterClass: '',
                                    enterActiveClass: '',
                                      enterToClass: '',
                                        leaveClass: '',
                                          leaveActiveClass: '',
                                            leaveToClass: ''
    },
    variants: {
      danger: {
        overlay: 'bg-red-100',
          header: 'border-red-50 text-red-700',
            // close: 'bg-red-50 text-red-700 hover:bg-red-200 border-red-100 border',
            modal: 'bg-white border border-red-100 shadow-lg',
              footer: 'bg-red-50'
      }
    }
  }
}
  
}

const routes = [
  {
    path: '/landing',
    name: "Landing",
    component: Landing,
  },
  {
    path: '/privacy-policy',
    name: "PrivacyPolicy",
    component: PrivacyPolicy,
  },
  {
    path: '/registration',
    name: "registration",
    component: Registration,
  },
  {
    path: '/login',
    name: "login",
    component: Login,
  },
  {
    path: '/dashboard',
    component: Dashboard,
    children: [
      {
        path: 'home', //  è come se ci fosse scritto '/dashboard/home'
        name: "home",
        component: Home,
      },
      {
        path: 'mybins',
        name: 'myBins',
        component: Home,
      },
      {
        path: 'calendar',
        name: 'calendar',
        component: Calendar,
      },
      {
        path: 'presentation',
        name: 'presentation',
        component: Home,
      },
      {
        path: 'account',
        name: 'account',
        component: Account,
      },
      {
        path: 'faq',
        name: 'faq',
        component: Home,
      },
      {
        path: 'account/edit',
        name: 'editAccount',
        component: EditAccount,
      },
      {
        path: '*',  // qualsiasi cosa scritta dopo '/dashboard/' reindirizza alla dashboard
        name: "default_dashboard",
        redirect: '/dashboard/home',
      }
    ]
  },
  {
    path: '*',  // qualsiasi percorso in cui non sia scritto '/dashboard/' porta alla landing
    name: "default_route",
    redirect: '/landing',
  }
];

const router = new VueRouter({
  mode: "history",
  routes
});

Vue.config.productionTip = false
Vue.use(VueTailwind, settings)

import VueSimpleAlert from "vue-simple-alert";
Vue.use(VueSimpleAlert);

new Vue({
  render: h => h(App),
  router,
}).$mount('#app')
