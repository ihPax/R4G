<template>
  <div class="flex flex-col h-64 overflow-auto">
    <div
      v-for="(comune, index) in comuni"
      :key="index"
      class="flex flex-row cursor-pointer hover:bg-gray-200 p-3 rounded"
    >
      <div class="">{{ comune.name }}</div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "Modal",
  data() {
    return {
      comuni: [],
    };
  },
  async mounted() {
    let response = await axios.get("http://localhost:3000/comuni");
    this.comuni = response.data;
    console.log(this.comuni);
  },
};
</script>