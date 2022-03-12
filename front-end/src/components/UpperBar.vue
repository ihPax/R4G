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
        <img src="../assets/logor4gblack.png" class="cursor-pointer w-1/2" alt="logo R4G" />
      </router-link>
    </div>
    <button 
      class="p-2 text-lg sm:text-xl rounded sm:rounded-xl font-bold border-gray-300 border-2 hover:bg-black hover:text-white hover:border-black"
      @click="logout()"
    >
      <div class="flex items-center">
        <div class="mr-2">Esci</div>
        <div class="material-icons">logout</div>
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
        class="flex-grow bg-blue-50 disabled:bg-blue-200 disabled:cursor-auto"
      >
        <div>
          <svg class="mx-auto" :class="link.classes" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="24px" width="24px" fill="#000">
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
          d: 'M12 5.69l5 4.5V18h-2v-6H9v6H7v-7.81l5-4.5M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3z',
          classes: 'w-8 h-8',
          code: 'home'
        },
        {
          d: 'M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 18H4V10h16v11zm0-13H4V5h16v3z',
          classes: 'w-7 h-7',
          code: 'calendar'
        },
        {
          d: 'M12 6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2m0 10c2.7 0 5.8 1.29 6 2H6c.23-.72 3.31-2 6-2m0-12C9.79 4 8 5.79 8 8s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 10c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z',
          classes: 'w-8 h-8',
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
        let keysToRemove = ["AccessEmail", "Zone", "Zones", "Bin", "BinUser"];
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