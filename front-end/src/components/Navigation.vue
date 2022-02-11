<template>
  <div id="navbar" class="h-full flex">
    <div class="flex flex-col">

      <!-- <div v-if="isMobile" class="flex flex-row-reverse m-5 z-20" @click="burgerToggle()">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="w-8 h-8"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16"
          />
        </svg>
      </div> -->

      <!-- <div class="xs:flex flex-col items-start xs:h-full absolute z-10 bg-gray-100 xs:bg-white" v-if="!isMobile || isClicked"> -->
      <div class="flex flex-col items-start xs:h-full bg-white">
        <button
          v-for="(link, index) in links"
          :key="link.code"
          class="p-2 sm:p-3 my-1 sm:my-2 mx-2 text-lg sm:text-xl rounded sm:rounded-xl font-bold"
          :class="{
            'bg-green-300 cursor-auto ': link.code == currentRouteName,
            'flex-grow cursor-auto': index == 4,
            'hover:bg-black hover:text-white hover:border-black': index != 4 && link.code != currentRouteName
          }"
          :disabled="link.code == currentRouteName"
          @click="goToLink(link)"
        >
          {{ link.label }}
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Navigation",
  data() {
    return {
      // isClicked: false,
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
          label: "FAQ - Domande frequenti",
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
    // burgerToggle() {
    //   this.isClicked = !this.isClicked;
    // }
  },
};
</script>
