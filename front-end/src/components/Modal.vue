<template>
  <div class="flex flex-col overflow-auto">
    <div
      v-for="(comune, index) in comuni"
      :key="index"
      class="flex flex-row cursor-pointer bg-blue-50 hover:bg-blue-100 my-1 rounded"
    >
      <p class="w-full h-full p-3 font-medium" @click="saveZone(comune)">{{ comune.name }}</p>
    </div>
  </div>
</template>

<script>
export default {
  name: "Modal",
  data() {
    return {
      comuni: [],
      user: {},
      access: "",
      newUser: {},
    };
  },
  async mounted() {
    this.comuni = JSON.parse(localStorage.getItem("Zones"));
  },
  methods: {
    async saveZone(comune) {
      try {
        this.user = JSON.parse(localStorage.getItem("AccessEmail"));
        this.user.zone_id = comune.id;
        let idZone = { zone_id: comune.id };

        await this.$axios.post("/r4g/insert-zone/" + this.user.email, idZone);
        localStorage.setItem("AccessEmail", JSON.stringify(this.user));

        let zone = ( await this.$axios.get("/r4g/zone-calendar/" + this.user.zone_id) ).data;
        localStorage.setItem("Zone", JSON.stringify(zone));

        this.$emit("exit", true);
      } catch(e) {
        this.$emit('catch-error', e);
      }
    },
  },
};
</script>
