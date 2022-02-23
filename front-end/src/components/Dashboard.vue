<template>
<div>
  <div 
    v-if="user" 
    class="h-full xs:h-screen flex flex-col"
  >
    <UpperBar :isMobile="isMobile"></UpperBar>
    <div
      class="bg-white dark:bg-black text-black dark:text-white flex-grow flex flex-col xs:flex-row"
    >
      <Navigation v-if="!isMobile"></Navigation>
      <div class="flex-grow">
        <router-view :isMobile="isMobile"></router-view>
      </div>
    </div>
  </div>
  <div v-else>
    <NotLogged></NotLogged>
  </div>
</div>

</template>

<script>
import Navigation from "@/components/Navigation.vue";
import UpperBar from "@/components/UpperBar.vue";
import NotLogged from '@/components/NotLogged.vue';

export default {
  name: "App",
  components: {
    Navigation,
    UpperBar,
    NotLogged
  },
  props: {
    isMobile: {
      type: Boolean,
      default: false
    },
  },
  data() {
    return {
      user: {},
      comuni: []
    }
  },
  async mounted() {
    this.user = JSON.parse(localStorage.getItem("AccessEmail"));
    this.comuni = (await this.$axios.get("/r4g/zones")).data;
    localStorage.setItem("Zones", JSON.stringify(this.comuni));
  }
};
</script>
