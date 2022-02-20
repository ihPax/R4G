<template>
<div>
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
    <div class="h-16 border-t border-black fixed bottom-0 w-full z-10 flex justify-around bg-blue-50">
      <button 
        v-for="link in links" :key="link.id" 
        @click="goToLink(link)"
        :disabled="link.code == currentRouteName"
        class="flex-grow"
      >
        <span class="material-icons">
          {{ link.googleCode }}
        </span>
      </button>
    </div>
  </div>

</div>
</template>

<script>
export default {
  name: "UpperBar",
  props: {
    isMobile: {
      type: Boolean,
      default: false
    },
  },
  data() {
    return {
      links: [
        {
          googleCode: 'home',
          code: 'home'
        },
        {
          googleCode: 'calendar_today',
          code: 'calendar'
        },
        {
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
    async logout(){
      await this.$axios.get("/r4g/logout");
      localStorage.removeItem("AccessEmail");
      localStorage.removeItem("Zone");
      localStorage.removeItem("Zones");
      this.$router.push({
        name: "login",
      });
    }
  },
};
</script>