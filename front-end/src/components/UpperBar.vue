<template>
<div>
  <div v-if="isLoading"
    class="fixed text-red-400 font-bold text-2xl z-10"
    style="top: 50%; left: 50%; transform: translate(-50%, -50%)"
  >
    <Loading></Loading>
  </div>
  <div v-if="!isMobile" id="upperbar" class="flex justify-between items-center mx-4">
    <div class="">
      <router-link to='/dashboard/home'>
        <img
            src="../assets/Logo_R4G_Black.svg"
            class="h-8 xs:h-10 my-5 w-full block"
            alt="logo R4G"
          />
      </router-link>
    </div>
    <button 
      class="p-2 text-lg sm:text-xl rounded sm:rounded-xl font-bold border-gray-300 border-2 hover:bg-black hover:text-white hover:border-black"
      @click="logout()"
    >
      <div class="flex items-center">
        <div class="mr-2">Esci</div>
        <div>
          <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px">
            <g><path d="M0,0h24v24H0V0z" fill="none"/></g>
            <g><path d="M17,8l-1.41,1.41L17.17,11H9v2h8.17l-1.58,1.58L17,16l4-4L17,8z M5,5h7V3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h7v-2H5V5z"/></g>
          </svg>
        </div>
      </div>
    </button>
  </div>

  <!-- VERSIONE MOBILE -->
  <div v-else>
    <div class="h-16 border-t border-black fixed bottom-0 w-full z-10 flex justify-around">
      <button 
        v-for="link in links" :key="link.id" 
        @click="goToLink(link)"
        :disabled="link.code == currentRouteName"
        class="flex-grow bg-blue-50 disabled:bg-blue-300 disabled:cursor-auto border-r border-l disabled:border-blue-400 border-blue-50"
      >
        <div class="flex justify-center items-center">
          <svg class="mx-auto w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="24px" width="24px" fill="#000">
            <path d="M0 0h24v24H0V0z" fill="none"/>
            <path :d="link.d"/>
          </svg>
        </div>
      </button>
    </div>
  </div>

</div>
</template>

<script>
import Loading from '@/components/Loading';
export default {
  name: "UpperBar",
  components: {
    Loading
  },
  props: {
    isMobile: {
      type: Boolean,
      default: false
    },
  },
  data() {
    return {
      isLoading: false,
      links: [
        {
          d: 'M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z', //'M12 5.69l5 4.5V18h-2v-6H9v6H7v-7.81l5-4.5M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3z',
          googleCode: 'home',
          code: 'home'
        },
        {
          d: 'M19,4h-1V2h-2v2H8V2H6v2H5C3.89,4,3.01,4.9,3.01,6L3,20c0,1.1,0.89,2,2,2h14c1.1,0,2-0.9,2-2V6C21,4.9,20.1,4,19,4z M19,20 H5V10h14V20z M9,14H7v-2h2V14z M13,14h-2v-2h2V14z M17,14h-2v-2h2V14z M9,18H7v-2h2V18z M13,18h-2v-2h2V18z M17,18h-2v-2h2V18z', //'M19,4h-1V2h-2v2H8V2H6v2H5C3.89,4,3.01,4.9,3.01,6L3,20c0,1.1,0.89,2,2,2h14c1.1,0,2-0.9,2-2V6C21,4.9,20.1,4,19,4z M19,20 H5V10h14V20z M19,8H5V6h14V8z M9,14H7v-2h2V14z M13,14h-2v-2h2V14z M17,14h-2v-2h2V14z M9,18H7v-2h2V18z M13,18h-2v-2h2V18z M17,18 h-2v-2h2V18z',
          googleCode: 'calendar_month',
          code: 'calendar'
        },
        {
          d: 'M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z', //'M12 6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2m0 10c2.7 0 5.8 1.29 6 2H6c.23-.72 3.31-2 6-2m0-12C9.79 4 8 5.79 8 8s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 10c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z',
          googleCode: 'person',
          code: 'dashboard-account'
        },
      ]
    };
  },
  computed: {
    currentRouteName() {
      return this.$route.matched[1].name;
    },
  },
  methods: {
    goToLink(link) {
      if (link.code != this.currentRouteName) {
        this.$router.push({
          name: link.code,
        });
      }
    },
    async logout() {
      this.isLoading = true;
      try {
        await this.$axios.get("/r4g/logout");
        let keysToRemove = ["AccessEmail", "Zone", "Zones", "Bin", "BinUser", "WithdrawalDate", "MaterialDescription"];
        keysToRemove.forEach(key => localStorage.removeItem(key));
        this.$router.push({
          name: "login",
        });
      } catch(e) {
        this.$emit('catch-error', e);
      } finally {
        this.isLoading = false;
      }
    }
  },
};
</script>