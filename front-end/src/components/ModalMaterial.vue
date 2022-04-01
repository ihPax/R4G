<template>
  <div class="flex flex-col overflow-auto">
    <button
      v-for="(materiale,index) in materiali"
      :key="index"
      class="flex flex-row my-1 rounded font-black text-white"
      :style="`background-color: ${materiale.color}`"
      @click="chooseMaterial(materiale)"
    >
      <div class="w-full h-full p-3 font-medium">{{ materiale.name }}</div>
    </button>
  </div>
</template>

<script>
import materiali from "../materiali.json";
export default {
  data() {
    return {
      materiali,
      user: [],
      bin: []
    }
  },
  mounted() {},
  methods: {
    async chooseMaterial(materiale) {
      try {
        this.user = JSON.parse(localStorage.getItem("AccessEmail"));
        let userId = this.user.id;
        this.bin = (await this.$axios.post("/r4g/new-bin/" + userId, {name: materiale.name})).data;
        let binId = this.bin.bin.id;

        await this.$axios.post("/r4g/save-bin-user", {user_id: userId, bin_id: binId});

        let calendarBin = (await this.$axios.get("/r4g/material-bin/" + binId)).data;
        localStorage.setItem("Bin", JSON.stringify(calendarBin));

        let userBin = (await this.$axios.get("/r4g/bin/" + userId)).data;
        localStorage.setItem("BinUser", JSON.stringify(userBin));

        this.$emit("exit", true);
      } catch(e) {
        console.log(e.response);
        this.$fire({
          text: "Oops, qualcosa è andato storto!",
          type: "warning",
          timer: 3000,
        }).then(() => {
          this.$emit("exit", true);
        });
      }
    }
  }
}
</script>