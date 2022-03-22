<template>
   <div class="flex flex-col overflow-auto">
    <div class="mb-2 font-semibold text-sm">Clicca per sapere cosa gettare in:</div>
    <button
      v-for="(item, index) in items"
      :key="index"
      class="flex flex-row my-1 rounded font-black text-white"
      :style="`background-color: ${item.color}`"
      @click="isMobile || !isMobile && !isExpanded ? showDescription(item.name) : null"
    >
      <div class="w-full h-full p-3 font-medium">{{ item.name }}</div>
    </button>
  </div>
</template>

<script>
import materialDescriptions from "../materialDescriptions.json";
export default {
  props: {
    isMobile: {
      type: Boolean,
      default: false,
    },
    isExpanded: {
      type: Boolean,
      default: false,
    },
  },
  data() {
    return {
      items: materialDescriptions //tratti da: https://www.amiavr.it/Raccolta-differenziata/Ogni-cosa-al-suo-posto
    }
  },
  mounted() {},
  methods: {
    onClose() {
      this.$emit("exit", true);
    },
    showDescription(materialUpper) {
      let material = materialUpper.toLowerCase();
      this.$router.push({name: "material-description", params: {material}});
    },
  },
};
</script>
