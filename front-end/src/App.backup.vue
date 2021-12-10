<template>
  <div
    id="app"
    class="w-screen h-screen bg-white dark:bg-black text-black dark:text-white grid grid-cols-12"
  >
    <Navigation></Navigation>
    <div class="col-span-8 lg:col-span-10">
      <router-view></router-view>
    </div>
    <!-- <DarkModeToggler></DarkModeToggler> -->
  </div>
</template>

<script>
import Navigation from "@/components/Navigation.vue";
// import DarkModeToggler from "@/components/DarkModeToggler.vue";
export default {
  name: "App",
  components: {
    Navigation,
    // DarkModeToggler,
  },
};
</script>
