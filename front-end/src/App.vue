<template>
  <div id="app" class="w-screen h-screen bg-white text-black">
    <div class="h-full w-full flex flex-row">
  
      <div class="flex flex-col border-2 border-black w-1/6	">
        <Navigation></Navigation>
      </div>
      <div class="flex-grow">
        <router-view></router-view>
      </div>
    
    </div>
    
  </div>
</template>

<script>
import Navigation from "@/components/Navigation.vue";
export default {
  name: 'App',
  components: {
    Navigation
  }
}
</script>