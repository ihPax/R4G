<template>
<div>
  <div 
    v-if="user" 
    class="h-screen flex flex-col"
  >
    <UpperBar></UpperBar>
    <div
      class="bg-white dark:bg-black text-black dark:text-white flex-grow flex"
    >
      <Navigation></Navigation>
      <div class="flex-grow">
        <router-view></router-view>
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
  data() {
    return {
      user: {}
    }
  },
  mounted() {
    this.user = JSON.parse(localStorage.getItem("AccessEmail"));
  }
};
</script>
