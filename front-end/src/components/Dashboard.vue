<template>
<div class="h-screen flex flex-col">
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
</template>

<script>
import Navigation from "@/components/Navigation.vue";
import UpperBar from "@/components/UpperBar.vue";

export default {
  name: "App",
  components: {
    Navigation,
    UpperBar
  },
};
</script>
