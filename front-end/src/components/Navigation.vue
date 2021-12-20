<template>
  <div id="navbar" class="col-span-4 lg:col-span-2 h-full">
    <div class="flex flex-col h-full items-center">
      <div class="-m-7">
        <router-link to='/dashboard/home'>
          <img src="../assets/logor4gblack.png" class="w-3/4 cursor-pointer" alt="logo R4G" />
        </router-link>
      </div>
      <div class="flex flex-col h-full items-center">
        <button
          v-for="(link, index) in links"
          :key="link.code"
          class="p-2 sm:p-4 text-lg sm:text-xl rounded-xl sm:rounded-3xl font-bold"
          :class="{
            'bg-green-300 cursor-auto': link.code == currentRouteName,
            'flex-grow': index == 4,
          }"
          :disabled="link.code == currentRouteName"
          @click="goToLink(link)"
        >
          {{ link.label }} 
        </button>
      </div>
    </div>

    <!-- <div class="flex flex-col h-full items-center">
      <div class="-m-7">
        <img src="../assets/logor4gblack.png">
      </div>
      <div class="p-4 rounded-lg font-bold text-xl cursor-pointer">
        Dashboard
      </div>
      <div class="p-4 rounded-lg font-bold text-xl cursor-pointer">
        I miei cestini
      </div>
      <div class="p-4 rounded-lg font-bold text-xl		 bg-green-400 cursor-pointer">
        Calendario
      </div>
      <div class="p-4 rounded-lg font-bold text-xl cursor-pointer">
        Chi siamo
      </div>
    </div>
    <div class="flex flex-col flex-end items-center">
        <div class="p-4 rounded-lg font-bold text-xl cursor-pointer">
        Account
        </div>
        <div class="p-4 rounded-lg font-bold text-xl cursor-pointer">
        FAQ
        </div>
    </div> -->
  </div>
</template>

<script>
export default {
  name: "Navigation",
  data() {
    return {
      links: [
        {
          code: "home",
          label: "Dashboard",
        },
        {
          code: "myBins",
          label: "I miei cestini",
        },
        {
          code: "calendar",
          label: "Calendario",
        },
        {
          code: "presentation",
          label: "Chi siamo",
        },
        {
          code: "",
          label: "",
        },
        {
          code: "account",
          label: "Account",
        },
        {
          code: "faq",
          label: "FAQ",
        },
      ],
    };
  },
  computed: {
    currentRouteName() {
      return this.$route.matched[1].name;
    },
  },
  methods: {
    goToLink(link) {
      if (link.code != this.currentRouteName) {
        this.$router.push({
          name: link.code,
        });
      }
    },
  },
};
</script>
<style></style>
