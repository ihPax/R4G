<template>
  <div class="flex flex-col h-64 overflow-auto">
    <div
      v-for="(comune, index) in comuni"
      :key="index"
      class="flex flex-row cursor-pointer hover:bg-gray-200 p-3 rounded"
    >
      <p class="" @click="saveZone(comune)">{{ comune.name }}</p>
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
      user: {},
      access: "",
    };
  },
  async mounted() {
    let response = await axios.get("http://localhost:8000/r4g/zones");
    this.comuni = response.data;
  },
  methods: {
    async saveZone(comune) {
      this.user = JSON.parse(localStorage.getItem("AccessEmail"));

      let idZone = { zone_id: comune.id };

      await axios.post(
        "http://localhost:8000/r4g/insert-zone/" + this.user.email,
        idZone
      );

      let responseUser = await axios.get(
        "http://localhost:8000/r4g/currentUser/" + this.user.email
      );
      this.newUser = responseUser.data;

      let parsed = JSON.stringify(this.newUser);
      localStorage.setItem("AccessEmail", parsed);

      this.$router.push({
        name: "calendar",
      });
      this.$emit("exit", true);
    },
  },
};
</script>
