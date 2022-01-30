<template>
  <div id="upperbar" class="flex justify-between items-center mx-4">
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
</template>

<script>
import axios from "axios";

export default {
  name: "Navigation",
  data() {
    return {
    };
  },
  computed: {
  },
  methods: {
    async logout(){
      await axios.get("http://localhost:8000/r4g/logout");
      localStorage.removeItem("AccessEmail");
      localStorage.removeItem("Zone");
      this.$router.push({
        name: "login",
      });
    }
  },
};
</script>
<style></style>
