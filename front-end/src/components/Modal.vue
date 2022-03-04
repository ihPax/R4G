<template>
  <div class="flex flex-col h-64 overflow-auto">
    <div
      v-for="(comune, index) in comuni"
      :key="index"
      class="flex flex-row cursor-pointer hover:bg-blue-100 rounded"
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
    // let response = await this.$axios.get("/r4g/zones");
    // this.comuni = response.data;
  },
  methods: {
    async saveZone(comune) {
      try {
        this.user = JSON.parse(localStorage.getItem("AccessEmail"));

        let idZone = { zone_id: comune.id };

        await this.$axios.post(
          "/r4g/insert-zone/" + this.user.email,
          idZone
        );

        let responseUser = await this.$axios.get(
          "/r4g/currentUser/" + this.user.email
        );
        this.newUser = responseUser.data;

        let parsed = JSON.stringify(this.newUser);
        localStorage.setItem("AccessEmail", parsed);

        let res = await this.$axios.get(
          "/r4g/zone-calendar/" + this.newUser.zone_id
        );
        let zone = res.data;
        let calendar = JSON.stringify(zone);
        localStorage.setItem("Zone", calendar);

        this.$emit("exit", true);
      } catch(e) {
        this.$emit('catch-error', e);
      }
    },
  },
};
</script>
