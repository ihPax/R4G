<template>
  <div id="navbar" class="min-w-6 xs:min-w-9 sm:min-w-12">
    <div class="flex flex-col h-full">
      <div class="flex flex-col items-start h-full">
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
