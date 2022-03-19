import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from "@/components/Home.vue";
import Calendar from "@/components/Calendar.vue";
import Landing from "@/components/Landing.vue";
import Registration from "@/components/Registration.vue";
import Account from "@/components/Account.vue";
import Login from "@/components/Login.vue";
import Dashboard from "@/components/Dashboard.vue";
import PrivacyPolicy from "@/components/PrivacyPolicy.vue";
import Faqs from "@/components/Faqs.vue";
import DashboardAccount from "@/components/DashboardAccount.vue";
import Notifications from "@/components/Notifications.vue";
import ProjectR4G from "@/components/ProjectR4G.vue";
import ToS from "@/components/ToS.vue";
import Feedback from "@/components/Feedback.vue";
import RecoverAccount from "@/components/RecoverAccount.vue";
import MaterialDescription from "@/components/MaterialDescription.vue";

Vue.use(VueRouter);

const routes = [
    {
      path: '/landing',
      name: "Landing",
      component: Landing,
    },
    {
      path: '/privacy-policy',
      name: "privacy-policy",
      component: PrivacyPolicy,
    },
    {
      path: '/tos',
      name: 'ToS',
      component: ToS,
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
      path: '/recover-account',
      name: "recover-account",
      component: RecoverAccount,
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
          path: 'faqs',
          name: 'faqs',
          component: Faqs,
        },
        {
          path: 'dashboard-account',
          name: 'dashboard-account',
          component: DashboardAccount,
        },
        {
          path: 'notifications',
          name: 'notifications',
          component: Notifications,
        },
        {
          path: 'project-r4g',
          name: 'project-r4g',
          component: ProjectR4G,
        },
        {
          path: 'feedback',
          name: 'feedback',
          component: Feedback,
        },
        {
          path: 'material-description/:material',
          name: 'material-description',
          component: MaterialDescription,
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
    routes,
    scrollBehavior() {
      return {x: 0, y: 0}
    }
});

export default router
