<template>
  <div id="app" class="w-screen h-screen bg-white text-black">
    <div class="h-full w-full flex flex-row">
  
      <Navigation class="border-r-2 border-black"></Navigation>
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