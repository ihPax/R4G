<template>
  <div
    class="bg-white xs:shadow-orangexl overflow-hidden sm:rounded-lg max-w-xl mx-auto h-full flex flex-col mb-16 xs:mb-2"
  >
    <button
      @click="$router.go(-1)" :disabled="!isMobile"
      class="disabled:cursor-auto w-full p-4 sm:px-6 flex justify-center items-center text-center border-b border-gray-200 bg-blue-50 xs:bg-white"
    >
      <div class="block xs:hidden">
        <svg
          class="transform rotate-90 h-8 w-8 mx-2 hover:cursor-pointer"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 20 20"
          fill="currentColor"
        >
          <path
            fill-rule="evenodd"
            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
            clip-rule="evenodd"
          />
        </svg>
      </div>
      <h3 class="text-xl leading-6 font-medium text-gray-900">
        Dove getto il rifiuto?
      </h3>
    </button>
    <div class="flex justify-center items-center">
      <div
        :style="`background-color: ${item.color}`"
        class="my-4 py-2 px-4 font-semibold text-white rounded"
      >
        {{ item.name }}
      </div>
    </div>
    <div v-for="(line, index) in item.descriptions" :key="index">
      <div class="p-1 flex items-center border-blue-100 border-t" :class="{'border-b' : item.descriptions.length == index + 1}">
        <div
          class="font-semibold"
          :class="line.isYes ? 'text-green-600 px-2' : 'text-red-600 px-1'"
        >
          {{ line.isYes ? "SÌ" : "NO" }}
        </div>
        <div class="mx-2 p-1 flex-grow">
          {{ line.descr }}
        </div>
      </div>
    </div>
    <GoBack :isMobile="isMobile"></GoBack>
  </div>
</template>

<script>
import GoBack from "@/components/GoBack.vue";
export default {
  components: {
    GoBack,
  },
  props: {
    isMobile: {
      type: Boolean,
      default: false,
    },
  },
  data() {
    return {
      items: [],
      item: {},
    };
  },
  mounted() {
    let material = this.$route.params.material;
    this.items = JSON.parse(localStorage.getItem("MaterialDescriptions"));
    this.item = this.items.find(obj => {
      return obj.name == material
    });  
    this.item.descriptions.sort((x, y) => y.isYes - x.isYes); //Ordino la lista in modo che ci siano sempre prima i "Sì"
  },
};
</script>
