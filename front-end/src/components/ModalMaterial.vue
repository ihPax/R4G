<template>
 <div class="flex flex-col h-64 overflow-auto">
    <div
      v-for="(materiale,index) in materiali"
      :key="index"
      class="flex flex-row cursor-pointer hover:bg-blue-100 rounded"
    >
      <p class="w-full h-full p-3 font-medium" @click="chooseMaterial(materiale)">{{ materiale.name }}</p>
    </div>
  </div>
</template>

<script>
import materiali from "../../materiali.json";
export default {
  data() {
    return {
      materiali: materiali,
      user: [],
      bin: []
    }
  },
  mounted() {
    console.log(materiali)
  },
  methods: {
    async chooseMaterial(materiale) {
      try {
        this.user = JSON.parse(localStorage.getItem("AccessEmail"));
        let id = this.user.id;
        let response = await this.$axios.post("/r4g/new-bin/"+id,{name:materiale.name});

        this.bin = response.data;
        let idBin = this.bin.bin.id;

        await this.$axios.post("/r4g/save-bin-user",{user_id:id,bin_id:idBin});

        let res = await this.$axios.get("/r4g/material-bin/"+idBin);
        let calendaBin = res.data;

        let localBin = JSON.stringify(calendaBin);
        localStorage.setItem("Bin", localBin);

        let bin = await this.$axios.get("/r4g/bin/"+id);
        let userBin = bin.data;

        let BinUser = JSON.stringify(userBin);
        localStorage.setItem("BinUser", BinUser);

        this.$emit("exit", true);
      } catch(e) {
        this.$emit('catch-error', e);
      }
    }
  }
}
</script>