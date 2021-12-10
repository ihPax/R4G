<template>
  <div
    class="w-screen h-screen bg-white dark:bg-black text-black dark:text-white grid grid-cols-12"
  >
    <Navigation></Navigation>
    <div class="col-span-8 lg:col-span-10">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
import Navigation from "@/components/Navigation.vue";
export default {
  name: "App",
  components: {
    Navigation,
  },
};
</script>
