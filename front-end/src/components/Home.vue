<template lang="html">
  <div
    class="h-screen w-full flex flex-row border-l-2 border-t-2 border-black rounded-tl-2xl"
  >
    <div class="h-full flex flex-col flex-grow p-8">
      <div class="text-4xl font-bold">ciao USER!</div>
      <div class="grid grid-cols-2 gap-8">
        <div
          v-for="index in 4"
          :key="index"
          class="flex flex-col lg:flex-row items-center shadow-inner rounded-lg text-center"
        >
          <div class="flex flex-col mx-1 order-2 lg:order-1 my-4">
            collega il tuo cestino
          </div>
          <div class="flex flex-col mx-1 order-1 lg:order-2 flex-shrink-0 flex-grow">
            <span class="material-icons text-9xl sm:text-11xl"> delete </span>
          </div>
        </div>
      </div>
    </div>

    <div class="hidden lg:flex flex-col flex-grow border-l-2 border-black">
      <div class="flex flex-row border-black border-b-2 pb-12 justify-center">
        <Calendar></Calendar>
      </div>
      <div class="flex flex-row">GRAFICO</div>
    </div>
  </div>
</template>

<script>
import Calendar from "@/components/Calendar.vue";

export default {
  name: "Home",
  components: {
    Calendar,
  },
  props: [],
  mounted() {},
  data() {
    return {
      navLinks: [
        {
          label: "",
          code: "",
        },
        {
          label: "",
          code: "",
        },
        {
          label: "",
          code: "",
        },
      ],
    };
  },
  methods: {},
  computed: {},
};
</script>

<style scoped lang="css"></style>
